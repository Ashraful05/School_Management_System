<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\ManageEmployeeSalary;
use App\Models\ManageOthersCost;
use App\Models\StudentFee;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function monthlyProfitIndex()
    {
        return view('profit.monthly_profit');
    }

    public function dateWiseProfitReportGet(Request $request)
    {
        $start_date = date('Y-m',strtotime($request->start_date));
        $end_date = date('Y-m',strtotime($request->end_date));

        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));

        $studentFee = StudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $otherCost = ManageOthersCost::whereBetween('date',[$sdate,$edate])->sum('amount');
        $employeeSalary = ManageEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($data as $key => $attendance) {
            $totalAttendance = EmployeeAttendance::with('user')->where($where)
                ->where('employee_id',$attendance->employee_id)->get();

            $absentCount = count($totalAttendance->where('attendance_status','Absent'));

            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attendance['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attendance['user']['salary'].'</td>';


            $salary = (float)$attendance['user']['salary'];
            $salaryPerDay = (float)$salary/30;
            $totalSalaryMinus = (float)$absentCount * (float)$salaryPerDay;
            $totalSalary = (float)$salary - (float)$totalSalaryMinus;


            $html[$key]['tdsource'] .='<td>'.$totalSalary.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$attendance->employee_id).'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
        return response()->json(@$html);
    }
}
