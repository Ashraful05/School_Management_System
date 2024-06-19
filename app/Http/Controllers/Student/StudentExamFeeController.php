<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentExamFeeController extends Controller
{
    public function Index()
    {
        $years = StudentYear::get();
        $classes = StudentClass::get();
        $examTypes = ExamType::get();
        return view('student_exam_fee.index',compact('years','classes','examTypes'));
    }
    public function classWiseExamFee(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type = $request->exam_type;

        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
//         dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Exam Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';

//        return response()->json($allStudent);

        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','3')
                ->where('class_id',$v->class_id)
                ->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_number'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.exam.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type='.$request->exam_type.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
        return response()->json(@$html);
    }
    public function examFeePaySlip()
    {

    }

}
