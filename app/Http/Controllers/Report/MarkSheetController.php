<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarkSheetController extends Controller
{
    public function index()
    {
        $years = StudentYear::get();
        $classes = StudentClass::get();
        $examTypes = ExamType::get();
        return view('marksheet.index',compact('years','classes','examTypes'));
    }
    public function markSheetReport(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_number;
        $countFail = StudentMarks::where(['year_id'=>$year_id,'class_id'=>$class_id,'exam_type_id'=>$exam_type_id,'id_number'=>$id_no])
            ->where('marks','<','33')->get()->count();
        $singleStudent = StudentMarks::where(['year_id'=>$year_id,'class_id'=>$class_id,'exam_type_id'=>$exam_type_id,'id_number'=>$id_no])->first();


    }
}
