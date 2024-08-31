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

        $totalCost = $otherCost + $employeeSalary;
        $profit = $studentFee - $totalCost;

        $html['thsource']  = '<th>Student Fee</th>';
        $html['thsource']  .= '<th>Other Cost</th>';
        $html['thsource'] .= '<th>Employee Salary</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';

        $color = 'info';
        $html['tdsource'] = '<td>' .$studentFee. '</td>';
        $html['tdsource'] .= '<td>' .$otherCost. '</td>';
        $html['tdsource'] .= '<td>' .$employeeSalary. '</td>';
        $html['tdsource'] .= '<td>' .$totalCost. '</td>';
        $html['tdsource'] .= '<td>' .$profit. '</td>';
        $html['tdsource'] .= '<td>';
        $html['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PDF" target="_blanks" href="'.route("profit_report_pdf"). '?start_date='.$sdate.'&end_date='.$edate.'">Report</a>';
        $html['tdsource'] .='</td>';

        return response()->json(@$html);
    }

    public function profitReportPDF(Request $request)
    {

    }
}
