<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class EmployeeMonthlySalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee_monthly_salary.index');
    }

    public function employeeMonthWiseSalary(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
//        if ($class_id !='') {
//            $where[] = ['class_id','like',$class_id.'%'];
//        }
        $data = EmployeeAttendance::select('employee_id')->groupby("employee_id")->with(['user'])->where($where)->get();
//        return response()->json($data);
        // dd($allStudent);
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

//            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
//            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
//            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

//            $originalfee = $registrationfee->amount;
//            $discount = $v['discount']['discount'];
//            $discounttablefee = $discount/100*$originalfee;
//            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$totalSalary.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$attendance->employee_id).'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
        return response()->json(@$html);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
