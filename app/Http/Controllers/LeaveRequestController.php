<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Http\Requests\StoreLeaveRequestRequest;
use App\Http\Requests\UpdateLeaveRequestRequest;
use App\Mail\LeaveRequestMail;
use App\Models\LeaveType;
use App\Models\Scenario;
use App\Models\User;
use App\Models\WorkflowStage;
use App\Models\WorkflowStageApproval;
use Illuminate\Support\Facades\Mail;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Get the authenticated user and their team ID(s)
        $user = User::with('teams', 'profile')->where('id', auth()->user()->id)->first();
        $teamIds = $user->teams->pluck('id');
        // Return the pending leave requests that the given user has not yet approved
        if ($user->profile->name_en === 'Human Resources Officer' || $user->profile->name_en == 'Human Resources Manager') {
            $leaveRequests = LeaveRequest::where('status', 'pending')
                ->whereHas('workflowStageapprovals.workflowStage', function ($query) use ($user) {
                    $query->where('approver_profile_id', $user->profile_id)
                        ->whereHas('workflowStageApproval', function ($q) {
                            $q->where('status', 'pending')
                                ->whereColumn('leave_request_id', 'leave_requests.id');
                        });
                })->get();
        } else {
            $leaveRequests = LeaveRequest::where('status', 'pending')
                ->whereHas('workflowStageapprovals.workflowStage', function ($query) use ($user) {
                    $query->where('approver_profile_id', $user->profile_id)
                        ->whereHas('workflowStageApproval', function ($q) {
                            $q->where('status', 'pending')
                                ->whereColumn('leave_request_id', 'leave_requests.id');
                        });
                })
                ->whereHas('user', function ($q) use ($teamIds) {
                    $q->whereIn('team_id', $teamIds);
                })
                ->get();
        }


        return view('leave-requests.index', compact('leaveRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaveRequest = new LeaveRequest();
        $leaveTypes  = LeaveType::all();
        return view('leave-requests.create', compact('leaveRequest', 'leaveTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequestRequest $request)
    {
        $authenticatedUser = User::where('id', auth()->user()->id)->first();

        if (Scenario::where('profile_id', $authenticatedUser->profile_id)->get()->count() == 0) {
            return back()->with('error', __('There is no scenario to treat your request, please informe your manager'));
        }

        if ($authenticatedUser->teams->count() == 0) {
            return back()->with('error', __('You do not have a team, please informe your manager'));
        }

        $date1 = $request->start_date;
        $date2 = $request->end_date;

        if (strtotime($date2) < strtotime($date1)) {
            // Second date is before the first date
            return back()->with('error', __('The end date should be later than the start date'));
        }

        // Create the leave Request
        $validatedLeaveRequestData = $request->validated();
        $leaveType = LeaveType::where('id', $validatedLeaveRequestData['leave_type_id'])->first();
        $userPaidLeavesBalance = $authenticatedUser->paid_leaves_balance;
        $userHolidaysBalance = $authenticatedUser->holidays_balance;
        $userLeavesBalance =  $userPaidLeavesBalance + $userHolidaysBalance;

        if ($leaveType->deductable && $userLeavesBalance < $validatedLeaveRequestData['number_of_days']) {
            return back()->with('error', 'You do not have enough days in your balance');
        }

        // Create the leave request
        $leaveRequest = leaveRequest::create(array_merge(
            $validatedLeaveRequestData,
            [
                'user_id' => $authenticatedUser->id,
                'team_id' => $authenticatedUser->teams->first()->id,
                'status' => 'pending',
            ]
        ));

        // Subtract requested days of the leave request from the user balance if it is deductable
        if ($leaveType->deductable) {
            if ($validatedLeaveRequestData['number_of_days'] <= $userHolidaysBalance) {
                $userHolidaysBalance -= $validatedLeaveRequestData['number_of_days'];
                $authenticatedUser->update([
                    'holidays_balance' => $userHolidaysBalance
                ]);
                $leaveRequest->update([
                    'deducted_holidays_amount' => $validatedLeaveRequestData['number_of_days'],
                    'deducted_paid_leaves_amount' => 0
                ]);
            } else {
                $deductionAmount = $validatedLeaveRequestData['number_of_days'] - $userHolidaysBalance;
                $userHolidaysBalance = 0;
                $userPaidLeavesBalance -= $deductionAmount;
                $authenticatedUser->update([
                    'holidays_balance' => $userHolidaysBalance,
                    'paid_leaves_balance' => $userPaidLeavesBalance,
                ]);
                $leaveRequest->update([
                    'deducted_holidays_amount' => $validatedLeaveRequestData['number_of_days'] - $deductionAmount,
                    'deducted_paid_leaves_amount' => $deductionAmount
                ]);
            }
        }


        // Create the leave request workflow stages
        $nextWorkflowStageApproval = $this->createLeaveRequestWorkflowStages($leaveRequest);
        
        $nextApprover = $this->getNextApprover($leaveRequest, $nextWorkflowStageApproval->workflowStage);

        Mail::to($nextApprover->email)->send(new LeaveRequestMail($leaveRequest));

        return to_route('leave-requests.my-leave-requests')->with('success', __('Your leave request was submitted successfully'));
    }

    public function approveLeaveRequest($leaveRequestId)
    {
        $leaveRequest = LeaveRequest::with('user.profile.scenarios', 'workflowStageApprovals')->findOrFail($leaveRequestId);

        foreach ($leaveRequest->user->profile->scenarios as $scenario) {
            $workflowStageApprovals = WorkflowStageApproval::with('workflowStage')
                ->where('leave_request_id', $leaveRequestId)
                ->where('status', 'pending')
                ->whereHas('workflowStage', function ($query) use ($scenario) {
                    $query->where('scenario_id', $scenario->id);
                })->get();

            foreach ($workflowStageApprovals as $workflowStageApproval) {

                if ($workflowStageApproval->workflowStage->approver_profile_id == auth()->user()->profile_id) {
                    if ($workflowStageApproval->approved_at == null && $workflowStageApproval->leave_request_id == $leaveRequestId) {

                        if ($workflowStageApproval->workflowStage->approver_profile_id === auth()->user()->profile_id) {
                            $workflowStageApproval->update([
                                'treated_by' => auth()->user()->id,
                                'treated_at' => now(),
                                'status' => 'Approved'
                            ]);
                        }

                        $this->createLeaveRequestWorkflowStages($leaveRequest);

                        $unapprovedApprovalsCount = WorkflowStageApproval::where('leave_request_id', $workflowStageApproval->leave_request_id)->whereNull('treated_at')->count();

                        if ($unapprovedApprovalsCount === 0) {
                            $leaveRequest->update(['status' => 'Approved']);
                            Mail::to($leaveRequest->user->email)->send(new LeaveRequestMail($leaveRequest));
                        } else {
                            $nextWorkflowApproval = WorkflowStageApproval::with('workflowStage')
                                ->where('leave_request_id', $workflowStageApproval->leave_request_id)->whereNull('treated_at')->first();

                            if ($nextWorkflowApproval) {
                                $nextApprovers = $this->getNextApprover($leaveRequest, $nextWorkflowApproval->workflowStage)->toArray();
                                $emails = array_filter(array_map(function ($nextApprover) {
                                    if (is_array($nextApprover) && isset($nextApprover['email'])) {
                                        return $nextApprover['email'];
                                    }
                                }, $nextApprovers));
                                Mail::to($emails[0])->cc($emails)->send(new LeaveRequestMail($leaveRequest));
                            }
                        }
                    }
                }
            }
        }

        return to_route('leave-requests.index')->with('success', __('The leave request was approved successfully'));
    }

    public function rejectLeaveRequest($leaveRequestId)
    {
        $leaveRequest = LeaveRequest::with('workflowStageApprovals')->where('id', $leaveRequestId)->first();
        $currentWorkflow = $leaveRequest->workflowStageApprovals->where('status', 'pending')->first();

        $currentWorkflow->update([
            'status' => 'Rejected',
            'treated_by' => auth()->user()->id,
            'treated_at' => now()
        ]);

        $leaveRequest->update(['status' => 'Rejected']);

        if ($leaveRequest->leaveType->deductable) {
            $leaveRequest->user->update([
                'paid_leaves_balance' => $leaveRequest->user->paid_leaves_balance + $leaveRequest->deducted_paid_leaves_amount,
                'holidays_balance' => $leaveRequest->user->holidays_balance + $leaveRequest->deducted_holidays_amount,
            ]);
        }

        Mail::to($leaveRequest->user->email)->send(new LeaveRequestMail($leaveRequest)); 

        return to_route('leave-requests.index')->with('success', __('Leave request rejected successfully'));
    }

    /**
     * Get the specified resource from storage for the authenticated user.
     */
    public function myLeaveRequests()
    {
        $leaveRequests = LeaveRequest::where('user_id', auth()->user()->id)->get();
        return view('leave-requests.my-leave-requests', compact('leaveRequests'));
    }

    private function createLeaveRequestWorkflowStages(LeaveRequest $leaveRequest)
    {
        // Eager load user profile and scenario stages
        $leaveRequest->load('user.profile.scenarios.workflowStages');

        $nextWorkflowStageApproval = null;
        // Create the workflow Stage approvals
        foreach ($leaveRequest->user->profile->scenarios as $scenario) {
            foreach ($scenario->workflowStages as $workflowStage) {
                if (in_array($workflowStage->id, $leaveRequest->workflowStageApprovals->pluck('workflow_stage_id')->toArray())) {
                    continue;
                }
                $nextWorkflowStageApproval = WorkflowStageApproval::create([
                    'workflow_stage_id' => $workflowStage->id,
                    'leave_request_id' => $leaveRequest->id,
                ]);
                break;
            }
        }

        return $nextWorkflowStageApproval;
    }

    private function getNextApprover(LeaveRequest $leaveRequest, WorkflowStage $workflowStage)
    {
        // $hrProfileId = Profile::where('name_en', 'like', '%Human%')->first()->id;

        // if ($workflowStage->approver_profile_id == $hrProfileId) {
        //     $users = User::where('profile_id', $workflowStage->approver_profile_id)->get();
        //     $nextApprover = $users->pluck('email');
        // } else {

        //     // Get the team of the user who request the leave
        //     $concernedTeam = $leaveRequest->team;
        //     $nextApprover = $concernedTeam->users->where('profile_id', $workflowStage->approver_profile_id)->first();
        // }

        if ($workflowStage->approvedBy->name_en == 'Human Resources Officer') {
            $users = User::where('profile_id', $workflowStage->approver_profile_id)->get();
            $nextApprover = $users;
        } else {
            if ($leaveRequest->team) {
                // Get the team of the user who request the leave
                $concernedTeam = $leaveRequest->team;
                $nextApprover = $concernedTeam->users->where('profile_id', $workflowStage->approver_profile_id)->first();
            } else {
                $users = User::where('profile_id', $workflowStage->approver_profile_id)->get();
                $nextApprover = $users;
            }
        }
        return $nextApprover;
    }

    public function history()
    {
        $leaveRequests = LeaveRequest::whereHas('workflowStageApprovals', function ($query) {
            $query->where('treated_by', auth()->user()->id);
        })->get();
        return view('leave-requests.history', compact('leaveRequests'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        if ($leaveRequest->start_date <= now()) {
            return back()->with('error', __('The leave request cannot be canceled as the start date is today'));
        }

        if ($leaveRequest->leaveType->deductable) {
            $leaveRequest->user->update([
                'paid_leaves_balance' => $leaveRequest->user->paid_leaves_balance + $leaveRequest->deducted_paid_leaves_amount,
                'holidays_balance' => $leaveRequest->user->holidays_balance + $leaveRequest->deducted_holidays_amount,
            ]);
        }

        $leaveRequest->update([
            'status' => 'Canceled',
        ]);

        return to_route('leave-requests.my-leave-requests')->with('success', __('Leave Request Canceled'));
    }
}
