<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentFee;
use App\Models\StudentFeeCategory;
use App\Models\StudentYear;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use function GuzzleHttp\normalize_header_keys;

class StudentFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData= StudentFee::get();
        return view('student_fee.index',compact('allData'));
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
        return view('student_fee.form',compact('years','classes','feeCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function studentFeeGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m',strtotime($request->date));

        $data = AssignStudent::with(['discount'])->where('year_id',$year_id)
            ->where('class_id',$class_id)
            ->get();

        $html['thsource']  = '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee </th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (This Student)</th>';
        $html['thsource'] .= '<th>Select</th>';

        foreach ($data as $key => $std) {
            $registrationfee = FeeCategoryAmount::where(['fee_category_id'=>$fee_category_id,
                'class_id'=>$std->class_id])->first();


            $accountstudentfees = StudentFee::where(['student_id'=>$std->student_id,'year_id'=>$std->year_id,
                'class_id'=>$std->class_id,'fee_category_id'=>$fee_category_id,'date'=>$date])->first();


            if($accountstudentfees !=null) {
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.$std['student']['id_number']. '<input type="hidden" name="fee_category_id" value= " '.$fee_category_id.' " >'.'</td>';

            $html[$key]['tdsource']  .= '<td>'.$std['student']['name']. '<input type="hidden" name="year_id" value= " '.$std->year_id.' " >'.'</td>';

            $html[$key]['tdsource']  .= '<td>'.$std['student']['fathers_name']. '<input type="hidden" name="class_id" value= " '.$std->class_id.' " >'.'</td>';

            $html[$key]['tdsource']  .= '<td>'.$registrationfee->amount.'$'.'<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';

            $html[$key]['tdsource'] .= '<td>'.$std['discount']['discount'].'%'.'</td>';

            $orginalfee = $registrationfee->amount;
            $discount = $std['discount']['discount'];
            $discountablefee = $discount/100*$orginalfee;
            $finalfee = (int)$orginalfee-(int)$discountablefee;

            $html[$key]['tdsource'] .='<td>'. '<input type="text" name="amount[]" value="'.$finalfee.' " class="form-control" readonly'.'</td>';

            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';

        }
        return response()->json(@$html);

    }


    public function store(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));
        StudentFee::where(['year_id'=>$request->year_id,'class_id'=>$request->class_id,
            'fee_category_id'=>$request->fee_category_id,'date'=>$request->date])->delete();

        $checkData = $request->checkmanage;

        if($checkData != null){
            for ($i=0;$i<count($checkData);$i++){
                $data = StudentFee::create([
                    'year_id'=>$request->year_id,
                    'class_id'=>$request->class_id,
                    'date'=>$date,
                    'fee_category_id'=>$request->fee_category_id,
                    'student_id'=>$request->student_id[$checkData[$i]],
                    'amount'=>$request->amount[$checkData[$i]],
                ]);
            }
        }
        if (!empty(@$data) || empty($checkData)){
            $notification = [
              'alert-type'=>'info',
              'message'=>'Data Updated!!!'
            ];
            return redirect()->route('studentFee.index')->with($notification);
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
