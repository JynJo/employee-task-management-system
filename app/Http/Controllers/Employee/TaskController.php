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

    public function fetchTask(string $id) {
        $task = Task::find($id);

        return response()->json($task);
    }

    public function updateTaskStatus(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status for task ' . $task->name . ' has updated successfully.');

    }

}
