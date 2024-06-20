<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeRegistrationController extends Controller
{
    public function Index()
    {
        $employees = User::where('user_type','employee')->get();
        return view('employee_management.index',compact('employees'));
    }
}
