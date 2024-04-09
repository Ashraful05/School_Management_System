<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function registrationIndex()
    {
        $assignedStudents = AssignStudent::get();
        return view('student_registration.index',compact('assignedStudents'));
    }
    public function registrationCreate()
    {
        $years = StudentYear::get();
        $shifts = StudentShift::get();
        $groups = StudentGroup::get();
        $classes = StudentClass::get();
        return view('student_registration.form',compact('classes','years','shifts','groups'));
    }
    public function saveRegistration(Request $request)
    {
        return $request->all();
    }
}
