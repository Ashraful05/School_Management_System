<?php

namespace App\Http\Controllers\Result;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class ResultReportController extends Controller
{
    public function index()
    {
//        $employees = User::where('user_type','employee')->get();
        $years = StudentYear::get();
        $classes = StudentClass::get();
        $examTypes = ExamType::get();
        return view('result_report.index',compact('years','classes','examTypes'));
    }

    public function resultReport(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;
        $examTypeId = $request->exam_type_id;

        $singleResult = StudentMarks::where(['year_id'=>$yearId,'class_id'=>$classId,'exam_type_id'=>$examTypeId])->first();

        if($singleResult == true){
            $allData = StudentMarks::select('year_id','class_id','exam_type_id','student_id')
                ->where(['year_id'=>$yearId,'class_id'=>$classId,'exam_type_id'=>$examTypeId])
                ->groupBy(['year_id','class_id','exam_type_id','student_id'])
                ->get();
//            return $allData;
            $pdf = PDF::loadView('result_report.result_report_pdf',compact('allData'));
            $pdf->setProtection(['copy','print'],'','pass');
            return $pdf->stream('document.pdf');
        }else{
            $notification = [
                'alert-type'=>'error',
                'message'=>'Data Not Found!!'
            ];
            return redirect()->back()->with($notification);
        }

    }
}
