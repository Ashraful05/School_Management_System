<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class EmployeeAttendanceReportController extends Controller
{
    public function index()
    {
        $employees = User::where('user_type','employee')->get();
        return view('employee_attendance_report.index',compact('employees'));
    }
    public function employeeAttendanceReport(Request $request)
    {
        $employeeId = $request->employee_id;
        if(!empty($employeeId)){
            $where[] = ['employee_id',$employeeId];
        }
        $date = date('Y-m',strtotime($request->date));
        if(!empty($date)){
            $where[] = ['date','like',$date.'%'];
        }
        $singleAttendance = EmployeeAttendance::with('user')->where($where)->get();
        if(!empty($singleAttendance)){
            $allData = EmployeeAttendance::with('user')->where($where)->get();
//            return $allData;
            $absentData = EmployeeAttendance::with('user')->where($where)
                ->where('attendance_status','Absent')->get()->count();
            $leaveData = EmployeeAttendance::with('user')->where($where)
                ->where('attendance_status','Leave')->get()->count();

            $monthData = date('m-Y',strtotime($request->date));

            $pdf = PDF::loadView('employee_attendance_report_pdf',compact('allData',
                'absentData','leaveData','monthData'));
            $pdf->setProtection(['copy','print'],'','pass');
            return $pdf->stream('document.pdf');

        }else{
            $notification = [
                'alert-type'=>'error',
                'message'=>'Sorry these credentials does not match!!'
            ];
            return redirect()->back()->with($notification);
        }

    }
}
