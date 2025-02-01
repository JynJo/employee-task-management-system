<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index() 
    {
        $attendances = Auth::user()->employee->attendances()->get();
        $current_date = Carbon::now()->format('Y-m-d');

        $already_checked_in = Auth::user()->employee->attendances()->where('day', $current_date)->exists();

        $attendance = Auth::user()->employee->attendances()
                ->where('day', $current_date)
                ->first();


        return view('employee.attendances', compact('attendances', 'already_checked_in', 'attendance'));
    }

    public function store(Request $request)
    {
        $today = Carbon::today();
        $current_date = Carbon::now()->format('Y-m-d');
        $current_time = Carbon::now()->format('H:i:s');

        // $already_checked_in = Auth::user()->employee()
        //     ->whereHas('attendances', function($query) use ($current_date) {
        //     return $query->whereDate('day', $current_date);
        // })->exists();
        $already_checked_in = Auth::user()->employee->attendances()->where('day', $current_date)->exists();

        if ($already_checked_in) {
            $attendance = Auth::user()->employee->attendances()->where('day', $current_date);

            $attendance->update([
                'check_out' => $current_time
            ]);

            return redirect()->back()->with('success', 'Checked out successfully.');
        }




        Attendance::create([
            'employee_id' => Auth::user()->employee->id,
            'day' => $current_date,
            'check_in' => $current_time
        ]);

        return redirect()->back()->with('success', 'Checked in successfully.');

    }
}
