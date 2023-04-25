<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\HolidayInjectionMail;
use App\Mail\WelcomeMail;
use App\Models\BalanceRecord;
use App\Models\Department;
use App\Models\Gender;
use App\Models\IdentityDocument;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\MaritalStatus;
use App\Models\Profile;
use App\Models\Project;
use App\Models\RecrutmentPlatforme;
use App\Models\SourcingType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $terminationReasons = ['Misconduct', 'Resignation', 'End of contract period', 'End of internship', 'others'];
        return view('users.index', compact('terminationReasons', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $genders = Gender::all();
        $languages = Language::all();
        $sourcings = SourcingType::all();
        $languageLevels = LanguageLevel::all();
        $maritalStatuses = MaritalStatus::all();
        $identityDocuments = IdentityDocument::all();
        $recrutmentPlatformes = RecrutmentPlatforme::all();
        return view('users.create', compact('user', 'genders', 'identityDocuments', 'sourcings', 'recrutmentPlatformes', 'languages', 'languageLevels', 'maritalStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if ($request->hasFile('image')) {
            $imageName = $request->first_name . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('employees_image'), $imageName);
            $image = ImageManagerStatic::make(public_path("employees_image/{$imageName}"))->fit(1200, 1200);
            $image->save();

            $user = User::create(array_merge(
                $request->validated(),
                [
                    'image' => $imageName
                ]
            ));
        } else {
            $user = User::create($request->validated());
        }


        DB::table('user_preferences')->insert([
            'user_id' => $user->id
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));
        return to_route('users.index')->with('success', __('Employee added successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $managersProfileIds = Profile::where('name_en', 'like', '%Manager%')->get()->pluck('id');
        $departments = Department::all();
        $profiles = Profile::all();
        $projects = Project::all();
        $managers = User::whereIn('profile_id', $managersProfileIds)->get();
        return view('users.show', compact('user', 'departments', 'profiles', 'projects', 'managers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $genders = Gender::all();
        $languages = Language::all();
        $sourcings = SourcingType::all();
        $languageLevels = LanguageLevel::all();
        $maritalStatuses = MaritalStatus::all();
        $identityDocuments = IdentityDocument::all();
        $recrutmentPlatformes = RecrutmentPlatforme::all();
        return view('users.edit', compact('user', 'genders', 'identityDocuments', 'sourcings', 'recrutmentPlatformes', 'languages', 'languageLevels', 'maritalStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->hasFile('image')) {
            $imageName = $request->first_name . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('employees_image'), $imageName);
            $image = ImageManagerStatic::make(public_path("employees_image/{$imageName}"))->fit(1200, 1200);
            $image->save();
            $user->update(array_merge(
                $request->validated(),
                ['image' => $imageName]
            ));
        } else {
            $user->update($request->validated());
        }

        return to_route('users.index')->with('success', __('Employee updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Request $request)
    {
        $validatedData = $request->validate([
            'termination_reason' => 'required|max:30|string',
            'termination_comment' => 'max:30|string',
        ]);
        $user->update($validatedData);
        $user->delete();
        return to_route('users.index')->with('success', __('Employee deleted successfully'));
    }

    /**
     * Show deleted resources from storage
     */
    public function deleted()
    {
        $users = user::onlyTrashed()->get();
        return view('users.index', compact('users'));
    }

    /**
     * restore the deleted resource from storage
     */
    public function restore($id)
    {
        $user = User::where('id', $id)->onlyTrashed();
        $user->restore();
        return to_route('users.show', $id)->with('success', __('Employee restored successfully'));
    }

    /**
     * force delete the resource from storage
     */
    public function forceDelete($id)
    {
        DB::table('user_preferences')->where('user_id', $id)->delete();
        $user = User::where('id', $id)->onlyTrashed();
        $user->forceDelete();
        return to_route('users.index')->with('success', __('Employee deleted permanently'));
    }

    /**
     * Assign a department to the specified resource from storage.
     */

    public function assignDepartment(Request $request, User $user)
    {
        $departmentValidatedData = $request->validate(['department_id' => 'required|numeric']);
        $user->update($departmentValidatedData);
        return to_route('users.show', $user)->with('success', __('Department Assigned Successfully'));
    }

    /**
     * Assign a profile to the specified resource from storage.
     */

    public function assignProfile(Request $request, User $user)
    {
        $profileValidatedData = $request->validate(['profile_id' => 'required|numeric']);
        $user->update($profileValidatedData);
        return to_route('users.show', $user)->with('success', __('profile Assigned Successfully'));
    }

    /**
     * Assign a project to the specified resource from storage.
     */

    public function assignProject(Request $request, User $user)
    {
        $projectValidatedData = $request->validate(['project_id' => 'required|numeric']);
        $user->update($projectValidatedData);
        return to_route('users.show', $user)->with('success', __('project Assigned Successfully'));
    }

    /**
     * Assign a manager to the specified resource from storage.
     */

    public function assignManager(Request $request, User $user)
    {
        $managerValidatedData = $request->validate(['manager_id' => 'required|numeric']);
        $user->update($managerValidatedData);
        return to_route('users.show', $user)->with('success', __('manager Assigned Successfully'));
    }

    public function getUsers()
    {
        $model = User::query();
        return datatables()->eloquent($model)->with('projects')->with('departments')->with('profiles')->toJson();
    }

    public function userManagement()
    {
        $users = User::with('roles')->get();
        $roles = Role::with('permissions')->get();
        return view('users.userManagement', compact('users', 'roles'));
    }

    public function assignRole(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|numeric',
            'name' => 'required|string',
        ]);

        $user = User::where('id', $validatedData['user_id'])->first();
        $role = Role::where('name', $validatedData['name'])->first();

        $user->assignRole($role);

        return back()->with('success', 'Role assigned successfully');
    }

    public function holidaysInjectionPage()
    {
        return view('users.inject-holidays');
    }

    public function injectHolidays(Request $request)
    {
        // Get the uploaded file
        $file = $request->file('excel-file');
        // Use PHPSpreadsheet to read the file and convert it into a PHP array
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        $users = [];
        // Loop through the array and update the database
        foreach ($rows as $row) {
            $user = User::where('id', $row[0])->first();
            $user->update([
                'holidays_balance' => $user->holidays_balance + 1
            ]);

            BalanceRecord::create([
                'user_id' => $user->id,
                'action_by' => auth()->user()->id,
                'leave_request_id' => null,
                'comment' => $request->holiday_name . ' (' . date('d/m/Y', strtotime($request->holiday_date)) . ')',
                'paid_leaves_balance' => $user->paid_leaves_balance,
                'holidays_balance' => $user->holidays_balance,
                'added_holidays' => 1
            ]);
            array_push($users, $user->email);
        }

        Mail::to($users)->send(new HolidayInjectionMail($request->holiday_name, $request->holiday_date));

        // Redirect to a success page
        return to_route('home')->with('success', __('The injection is successfull'));
    }

    public function importEmployees()
    {
        return view('users.import-employees');
    }

    public function importEmployeesStore(Request $request)
    {
        // Get the uploaded file
        $file = $request->file('excel-file');

        // Use PHPSpreadsheet to read the file and convert it into a PHP array
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Get the header row and remove it from the array
        $header = array_shift($rows);

        // Loop through the array and update the database
        foreach ($rows as $row) {
            $data = array_combine($header, $row);
            if (array_key_exists('gender', $data) && !empty($data['gender'])) {
                $gender = Gender::where('name_en', $data['gender'])->orWhere('name_fr', $data['gender'])->first()->id;
            }
            if (array_key_exists('marital_status', $data) && !empty($data['marital_status'])) {
                $maritalStatuse = MaritalStatus::where('name_en', $data['marital_status'])->orWhere('name_fr', $data['marital_status'])->first()->id;
            }

            if (array_key_exists('language', $data) && !empty($data['language'])) {
                $language = Language::where('name_en', $data['language'])->orWhere('name_fr', $data['language'])->first()->id;
            }

            if (array_key_exists('language_level', $data) && !empty($data['language_level'])) {
                $languageLevel = LanguageLevel::where('name', $data['language_level'])->first()->id;
            }

            if (array_key_exists('identity_document', $data) && !empty($data['identity_document'])) {
                $identityDocument = IdentityDocument::where('name_en', $data['identity_document'])->orwhere('name_en', $data['identity_document'])->first()->id;
            }

            if (array_key_exists('sourcing_type', $data) && !empty($data['sourcing_type'])) {
                $sourcingType = SourcingType::where('name_en', $data['sourcing_type'])->orwhere('name_en', $data['sourcing_type'])->first()->id;
            }

            if (array_key_exists('platforme', $data) && !empty($data['platforme'])) {
                $network = RecrutmentPlatforme::where('name', $data['platforme'])->first()->id;
            }

            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'date_of_birth' => array_key_exists('date_of_birth', $data) ? date("Y-m-d", strtotime($data['date_of_birth'])) : null,
                'phone' => array_key_exists('phone', $data) ? $data['phone'] : null,
                'email' => $data['email'],
                'address' => array_key_exists('address', $data) ? $data['address'] : null,
                'number_of_kids' => array_key_exists('number_of_kids', $data) ? $data['number_of_kids'] : null,
                'integration_date' => array_key_exists('integration_date', $data) ? date("Y-m-d", strtotime($data['integration_date'])) : null,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'recrutment_platforme_id' => $network ?? null,
                'sourcing_type_id' => $sourcingType ?? null,
                'gender_id' => $gender ?? null,
                'identity_document_id' => $identityDocument ?? null,
                'identity_document_number' => array_key_exists('document_number', $data) ? $data['document_number'] : null,
                'social_security_number' => array_key_exists('social_security_number', $data) ? $data['social_security_number'] : null,
                'language_id' => $language ?? null,
                'language_level_id' => $languageLevel ?? null,
                'marital_status_id' => $maritalStatuse ?? null
            ]);

            DB::table('user_preferences')->insert(['user_id' => $user->id, 'theme' => 'light']);
        }

        // Redirect to a success page
        return to_route('home')->with('success', __('The import of employees was successfull'));
    }
}
