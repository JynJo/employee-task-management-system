<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $employees = User::has('employee')->get();
        return view('admin.tasks.create', compact('employees'));
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');

    }

}
