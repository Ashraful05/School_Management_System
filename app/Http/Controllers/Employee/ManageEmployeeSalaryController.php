<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\ManageEmployeeSalary;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class ManageEmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = ManageEmployeeSalary::get();
        return view('manage_employee_salary.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = StudentYear::get();
        $classes = StudentClass::get();
        $feeCategories = StudentFeeCategory::get();
        return view('manage_employee_salary.form',compact('years','classes','feeCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */

    public function employeeSalaryGet(Request $request)
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
        $html['thsource'] .= '<th>ID Number</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Select</th>';


        foreach ($data as $key => $attendance) {

            $manageSalary = ManageEmployeeSalary::where(['employee_id'=>$attendance->employee_id,'date'=>$date])->first();

            if($manageSalary != null){
                $checked = 'checked';
            }else{
                $checked = '';
            }


            $totalAttendance = EmployeeAttendance::with('user')->where($where)
                ->where('employee_id',$attendance->employee_id)->get();

            $absentCount = count($totalAttendance->where('attendance_status','Absent'));

            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attendance['user']['id_number'].'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attendance['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attendance['user']['salary'].'</td>';


            $salary = (float)$attendance['user']['salary'];
            $salaryPerDay = (float)$salary/30;
            $totalSalaryMinus = (float)$absentCount * (float)$salaryPerDay;
            $totalSalary = (float)$salary - (float)$totalSalaryMinus;

            $html[$key]['tdsource'] .='<td>'.$totalSalary.'<input type="hidden" name="amount[]" value="'.$totalSalary.'">'.'</td>';
            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attendance->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';

        }
        return response()->json(@$html);
    }

    public function store(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));

        ManageEmployeeSalary::where(['date'=>$request->date])->delete();

        $checkData = $request->checkmanage;

        if($checkData != null){
            for ($i=0;$i<count($checkData);$i++){
                $data = ManageEmployeeSalary::create([
                    'date'=>$date,
                    'employee_id'=>$request->employee_id[$checkData[$i]],
                    'amount'=>$request->amount[$checkData[$i]],
                ]);
            }
        }
        if (!empty(@$data) || empty($checkData)){
            $notification = [
                'alert-type'=>'info',
                'message'=>'Data Updated!!!'
            ];
            return redirect()->route('manageEmployeeSalary.index')->with($notification);
        }else{
            $notification = [
                'alert-type'=>'error',
                'message'=>'Data Not Saved!!!'
            ];
            return redirect()->back()->with($notification);
        }
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
