<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Auth::user()->employee->tasks()->get();

        return view('employee.tasks', compact('tasks'));
    }
}
