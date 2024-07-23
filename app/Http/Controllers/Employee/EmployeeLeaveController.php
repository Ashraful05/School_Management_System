<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function leaveIndex()
    {
        $employees = EmployeeLeave::with('leavePurpose','user')->orderby('id','desc')->get();
//        return $employees;
        return view('employee_leave.index',compact('employees'));
    }
    public function leaveCreate()
    {
        $employees = User::where('user_type','employee')->get();
//        return $employees;
        $leavePurposes = LeavePurpose::all();
        return view('employee_leave.form',compact('employees','leavePurposes'));
    }
    public function leaveSave(Request $request)
    {
        $request->validate([
           'employee_id'=>'required',
           'leave_purpose_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',

        ],[
            'employee_id.required'=>'Employee Name is required!',
            'leave_purpose_id.required'=>'Leave Purpose is required!',
        ]);

        if($request->leave_purpose_id == '0'){
            $leavePurpose= new LeavePurpose();
            $leavePurpose->name = $request->name;
            $leavePurpose->save();
            $leavePurposeId= $request->leave_purpose_id;
        }else{
            $leavePurposeId = $request->leave_purpose_id;
        }
        EmployeeLeave::create([
            'employee_id'=>$request->employee_id,
            'leave_purpose_id'=>$leavePurposeId,
            'start_date'=>date('Y-m-d',strtotime($request->start_date)),
            'end_date'=>date('Y-m-d',strtotime($request->end_date)),
        ]);

        $notification = [
          'alert-type'=>'success',
          'message'=>'Leave Info Saved Successfully!!'
        ];
        return redirect()->route('employeeLeave.index')->with($notification);
    }

    public function leaveEdit($id)
    {
        $editData = EmployeeLeave::findOrFail($id);
        $employees = User::where('user_type','employee')->get();
        $leavePurposes = LeavePurpose::all();
        return view('employee_leave.edit',compact('editData','employees','leavePurposes'));
    }

    public function leaveUpdate(Request $request,$id)
    {
        $request->validate([
            'employee_id'=>'required',
            'leave_purpose_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',

        ],[
            'employee_id.required'=>'Employee Name is required!',
            'leave_purpose_id.required'=>'Leave Purpose is required!',
        ]);

        if($request->leave_purpose_id == '0'){
            $leavePurpose= new LeavePurpose();
            $leavePurpose->name = $request->name;
            $leavePurpose->save();
            $leavePurposeId = $request->leave_purpose_id;
        }else{
            $leavePurposeId = $request->leave_purpose_id;
        }
        EmployeeLeave::findOrFail($id)->update([
            'employee_id'=>$request->employee_id,
            'leave_purpose_id'=>$leavePurposeId,
            'start_date'=>date('Y-m-d',strtotime($request->start_date)),
            'end_date'=>date('Y-m-d',strtotime($request->end_date)),
        ]);

        $notification = [
            'alert-type'=>'info',
            'message'=>'Leave Info Updated Successfully!!'
        ];
        return redirect()->route('employeeLeave.index')->with($notification);
    }
    public function leaveDelete($id)
    {
        EmployeeLeave::findOrFail($id)->delete();
        $notification = [
          'alert-type'=>'error',
          'message'=>'Leave Info deleted!!'
        ];
        return redirect()->route('employeeLeave.index')->with($notification);

    }


}
