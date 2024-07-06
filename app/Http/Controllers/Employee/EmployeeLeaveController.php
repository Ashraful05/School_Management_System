<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function leaveIndex()
    {
        $data = EmployeeLeave::orderby('id','desc')->get();
        return view('employee_leave.index',compact('data'));

    }
}
