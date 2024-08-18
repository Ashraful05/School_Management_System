<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignStudentSubject;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentMarksEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $examTypes = ExamType::all();
        return view('student_marks_entry.index',compact('years',
            'classes','examTypes'));
//        return view('student_marks_entry.index');
    }

    public function getSubject(Request $request)
    {
        $class_id = $request->class_id;
        $subjectName = AssignStudentSubject::with('subjectName')->where('class_id',$class_id)->get();
        return response()->json($subjectName);
    }

    public function getStudentMarks(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $allData = AssignStudent::with('student')->where(['year_id'=>$year_id,'class_id'=>$class_id])->get();
        return response()->json($allData);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentMarks $studentMarks)
    {
//        $years = StudentYear::all();
//        $classes = StudentClass::all();
//        $examTypes = ExamType::all();
//        return view('student_marks_entry.form',compact('studentMarks','years','classes','examTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentCount = $request->student_id;
        if ($studentCount){
            for ($i=0;$i<count($studentCount);$i++){
                StudentMarks::create([
                   'year_id'=>$request->year_id,
                    'class_id'=>$request->class_id,
                    'assign_subject_id'=>$request->assign_subject_id,
                    'exam_type_id'=>$request->exam_type_id,
                    'student_id'=>$request->student_id[$i],
                    'id_number'=>$request->id_number[$i],
                    'marks'=>$request->marks[$i],
                ]);
            }
        }
        $notification = [
            'alert-type'=>'success',
            'message'=>'Marks Entry is Successful!!'
        ];
        return redirect()->back()->with($notification);
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
    public function editStudentMarks()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $examTypes = ExamType::all();
        return view('student_marks_entry.form',compact('years','classes','examTypes'));
    }
    public function editMarksByAjax(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;

        $getStudentMarks = StudentMarks::with('student')->where(['year_id'=>$year_id,'class_id'=>$class_id,
            'assign_subject_id'=>$assign_subject_id,'exam_type_id'=>$exam_type_id])->get();

        return response()->json($getStudentMarks);
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
