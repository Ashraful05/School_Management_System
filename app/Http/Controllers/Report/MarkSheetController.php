<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
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

    }
}
