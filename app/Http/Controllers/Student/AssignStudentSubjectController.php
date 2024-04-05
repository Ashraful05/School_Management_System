<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudentSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignStudentSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignSubjects = AssignStudentSubject::select('class_id')->groupby('class_id')->get();
        return view('assign_subject.index',compact('assignSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AssignStudentSubject $assignStudentSubject)
    {
        $studentClasses = StudentClass::get();
        $schoolSubjects = SchoolSubject::get();
        return view('assign_subject.form',compact('assignStudentSubject','schoolSubjects','studentClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id'=>'required',
            'subject_id'=>'required'
        ],[
            'class_id.required'=>'Class Name is required',
            'subject_id.required'=>'Subject Name is required'
        ]);
//        $countClass = count($request->class_id);
        $countSubject = count($request->subject_id);
//        return $countSubject;
        if( $countSubject != null){
            for($i=0; $i < $countSubject; $i++){
                AssignStudentSubject::create([
                    'class_id' => $request->class_id,
                    'subject_id' => $request->subject_id[$i],
                    'full_mark' => $request->full_mark[$i],
                    'pass_mark' => $request->pass_mark[$i],
                    'subjective_mark' => $request->subjective_mark[$i],
                ]);
            }
        }
        $notification=[
            'alert-type'=>'success',
            'message'=>'Data Saved!!'
        ];
        return redirect()->route('assignStudentSubject.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $detailsData = AssignStudentSubject::where('class_id',$class_id)
            ->orderby('subject_id','asc')
            ->get();
        return view('assign_subject.details_data',compact('detailsData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignStudentSubject $assignStudentSubject,$class_id)
    {
        $assignStudentSubject->class_id = $class_id;
        $studentClasses = StudentClass::get();
        $schoolSubjects = SchoolSubject::get();
        $editSubjectWise = AssignStudentSubject::where('class_id',$class_id)
            ->orderby('subject_id','asc')
            ->get();
//        return $editSubjectWise;
        return view('assign_subject.form',compact('assignStudentSubject','studentClasses','schoolSubjects','editSubjectWise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {
        if($request->subject_id == null){
            $notification = [
                'alert-type'=>'error',
                'message'=>'You must have to add at least one subject!'
            ];
            return redirect()->back()->with($notification);
        }else{
            $countSubject = count($request->subject_id);
            AssignStudentSubject::where('class_id',$class_id)->delete();
            for($i=0;$i<$countSubject;$i++){
                AssignStudentSubject::create([
                   'class_id'=>$request->class_id,
                   'subject_id'=>$request->subject_id[$i],
                   'full_mark'=>$request->full_mark[$i],
                   'pass_mark'=>$request->pass_mark[$i],
                   'subjective_mark'=>$request->subjective_mark[$i],
                ]);
            }
            $notification = [
                'alert-type'=>'info',
                'message'=>'Your data is Updated!'
            ];
            return redirect()->route('assignStudentSubject.index')->with($notification);

        }
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
