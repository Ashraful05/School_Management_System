<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        $employeeSalaries = User::where('user_type', 'employee')->get();
        return view('employee_salary.index', compact('employeeSalaries'));
    }

    public function increment($id)
    {
        $data = User::find($id);
        return view('employee_salary.salary_increment', compact('data'));
    }

    public function details($id)
    {

    }

    public function updateSalaryIncrement(Request $request, $id)
    {

    }


}
