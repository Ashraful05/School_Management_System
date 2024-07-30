<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = EmployeeAttendance::select('date')->groupby('date')->orderby('id','desc')->get();
//        return $attendances;
        return view('employee_attendance.index',compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EmployeeAttendance $employeeAttendance)
    {
        $employees = User::where('user_type','employee')->get();
        return view('employee_attendance.form',compact('employeeAttendance','employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'date'=>'required'
        ]);
        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $countEmployee = count($request->employee_id);
        for($i=0; $i<$countEmployee; $i++){

            $attendanceStatus = 'attendance_status'.$i;
//            return $attendanceStatus;
//            $attendance = new EmployeeAttendance();
//            $attendance->date = date('Y-m-d',strtotime($request->date));
//            $attendance->employee_id = $request->employee_id[$i];
//            $attendance->attendance_status = $request->$attendanceStatus;
////            return $attendance_status;
//
//            $attendance->save();

            EmployeeAttendance::create([
                'date' => date('Y-m-d',strtotime($request->date)),
                'employee_id' => $request->employee_id[$i],
                'attendance_status'=>$request->$attendanceStatus
            ]);

        }

        $notification = [
            'alert-type'=>'success',
            'message'=>'Data Saved!!'
        ];
        return redirect()->route('employeeAttendance.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $details = EmployeeAttendance::where('date',$date)->get();
        return view('employee_attendance.details',compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $attendanceDate = EmployeeAttendance::where('date',$date)->get();
        $employees = User::where('user_type','employee')->get();
        return view('employee_attendance.edit',compact('attendanceDate','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeAttendance $employeeAttendance)
    {
//        $request->validate([
//            'date'=>'required'
//        ]);
//
//        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
//        $countEmployee = count($request->employee_id);
//        for($i=0; $i<$countEmployee; $i++){
//
//            $attendanceStatus = 'attendance_status'.$i;
////            return $attendanceStatus;
////            $attendance = new EmployeeAttendance();
////            $attendance->date = date('Y-m-d',strtotime($request->date));
////            $attendance->employee_id = $request->employee_id[$i];
////            $attendance->attendance_status = $request->$attendanceStatus;
//////            return $attendance_status;
////
////            $attendance->save();
//
//            EmployeeAttendance::create([
//                'date' => date('Y-m-d',strtotime($request->date)),
//                'employee_id' => $request->employee_id[$i],
//                'attendance_status'=>$request->$attendanceStatus
//            ]);
//
//        }
//
//        $notification = [
//            'alert-type'=>'info',
//            'message'=>'Data Updated!!'
//        ];
//        return redirect()->route('employeeAttendance.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeAttendance $employeeAttendance)
    {
        //
    }
}
