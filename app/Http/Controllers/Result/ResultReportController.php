<?php

namespace App\Http\Controllers\Result;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;

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
}
