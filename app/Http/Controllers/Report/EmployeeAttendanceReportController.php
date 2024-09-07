<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendanceReportController extends Controller
{
    public function index()
    {
        $employees = User::where('user_type','employee')->get();
        return view('employee_attendance_report.index',compact('employees'));
    }
    public function employeeAttendanceReport(Request $request)
    {

    }
}
