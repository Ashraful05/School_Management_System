<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;
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
        $user = User::find($id);
        $salaryLog = EmployeeSalaryLog::where('employee_id',$user->id)->get();
        return view('employee_salary.salary_details_pdf',compact('salaryLog','user'));
    }

    public function updateSalaryIncrement(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $previousSalary = $user->salary;
        $presentSalary = (float)($previousSalary)+(float)($request->increment_salary);
        $user->salary = $presentSalary;
        $user->save();

        EmployeeSalaryLog::create([
           'employee_id'=>$id,
            'previous_salary'=>$previousSalary,
            'increment_salary'=>$request->increment_salary,
            'present_salary'=>$presentSalary,
            'effected_salary'=>date('Y-m-d',strtotime($request->effected_salary))
        ]);

        $notification = [
            'message'=>'Salary Incremented Successfully!',
            'alert-type'=>'info',
        ];
        return redirect()->route('employeeSalary.index')->with($notification);

    }


}
