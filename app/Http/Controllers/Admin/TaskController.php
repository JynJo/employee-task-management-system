<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Employee;

class TaskController extends Controller
{
    public function __construct() {
        Gate::authorize('manage-employee', Auth::user() );
    }

    public function index()
    {
        $tasks = Task::with('employee.user')->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $employees = User::has('employee')->get();
        return view('admin.tasks.create', compact('employees'));
    }

    public function store(StoreTaskRequest $request)
    {
        $employee = Employee::where('user_id', $request->user_id)->first();
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'employee_id' => $employee->id
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');

    }

}
