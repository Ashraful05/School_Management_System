<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class StudentMonthlyFeeController extends Controller
{
    public function Index()
    {
        $years = StudentYear::get();
        $classes = StudentClass::get();
        return view('student_monthly_fee.index',compact('years','classes'));
    }
    public function classWiseMonthlyFee(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $month_id = $request->month_id;

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
        $html['thsource'] .= '<th>Monthly Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';

//        return response()->json($allStudent);

        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','2')
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
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month_id='.$request->month_id.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
        return response()->json(@$html);
    }
    public function monthlyFeePaySlip(Request $request)
    {
//        return $request->all();
        $detailsData = AssignStudent::with(['student','discount'])
            ->where(['class_id'=>$request->class_id,'student_id'=>$request->student_id])
            ->first();
        $monthName = $request->month_id;
        $pdf = Pdf::loadView('student_monthly_fee.monthly_fee_pdf',compact('detailsData','monthName'));
        $pdf->SetProtection(['copy','print'], '', 'pass');
        return $pdf->stream('document.pdf');
//        return view('student_registration_fee.index',compact('studentDetails'));
    }
}
