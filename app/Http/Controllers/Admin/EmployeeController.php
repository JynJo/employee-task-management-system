<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Models\User;

class EmployeeController extends Controller
{
    public function __construct() {
        Gate::authorize('manage-employee', Auth::user() );
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $employees = Employee::with('user') 
            ->when($search, function ($query, $search) {
                return $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        })
        ->get();

        return view('admin.users.index', compact('employees'));
    }

    public function create() 
    {
        return view('admin.users.create');

    }

    public function store(StoreEmployeeRequest $request)
    {
        $full_name = $request->given_name . $request->middle_name . $request->surname;

        $user = User::create([
            'name' => $full_name,
            'email' => $request->email,
        ]);

        $user->roles()->attach(1);

        Employee::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'age' => $request->age,
            'birthdate' => $request->birthdate,
            'hired_date' => $request->hired_date,
            'department' => $request->department,
            'job_title' => $request->job_title,
        ]);

        return redirect()->route('employee.index')->with('success', 'New employee added successfully.');

    }

}
