<style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4caf50;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .add-row-button {
        background-color: #4caf50;
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 16px 0;
        cursor: pointer;
    }
</style>


<h3>Hi,</h3>
@if ($leaveRequest->status == 'pending')
    <p>A new leave request was submitted, you will find details below:</p>
@elseif ($leaveRequest->status == 'Rejected')
    <p>Your leave request was rejected, you will find details below:</p>
@else
    <p>Your leave request was approved, you will find details below:</p>
@endif


<div style="display: flex;">
    <div style="margin-right: 150px">
        <span style="font-weight: bold">Fullname:</span>
        <p>{{ $leaveRequest->user->fullname() }}</p>
    </div>
    <div>
        <span style="font-weight: bold">Leave Type:</span>
        <p>{{ $leaveRequest->leaveType->name_en }}</p>
    </div>
</div>


<div style="display: flex;">
    <div style="margin-right: 150px">
        <span style="font-weight: bold">Leave Period:</span>
        <p>{{ date('d/m/Y', strtotime($leaveRequest->start_date)) . ' => ' . date('d/m/Y', strtotime($leaveRequest->end_date)) }}
        </p>
    </div>
    <div>
        <span style="font-weight: bold">Number of days:</span>
        <p>{{ $leaveRequest->number_of_days }}</p>
    </div>
</div>

<p>For more information, check your intranet account by clicking on the link below.</p>
<a href="{{ url('/') }}">Click me</a>


<div style="margin-top: 20px">
    2, Rue Abou Assalt Andaloussi
    Angle Bd Brahim Roudani, Maârif
    20 330 Casablanca

    <p>Tél. : + 212 (0) 522 64 66 46</p>
    <p>Fax : + 212 (0) 522 94 02 27</p>
    <p>E-Mail : recrutement@cbiscom.com</p>
    <p>Web : www.cbiscom.com<p>
</div>
{{-- <table>
    <thead>
        <tr>
            <th>Approver Profile</th>
            <th>Status</th>
            <th>Approver Name</th>
            <th>Treated At</th>
        </tr>
    </thead>
    <tbody>
        <!-- Table rows go here -->
        @foreach ($leaveRequest->workflowStageApprovals as $workflowStageApproval)
        <tr>
            <td>{{ $workflowStageApproval->workflowStage->approvedBy->name_en }}</td>
            <td>{{ $workflowStageApproval->status }}</td>
            <td>{{ $workflowStageApproval->user ? $workflowStageApproval->user->fullname() : 'pending'  }}</td>
            <td>{{ $workflowStageApproval->treated_at ?? 'pending'  }}</td>
        </tr>
        @endforeach
    </tbody>
</table> --}}
