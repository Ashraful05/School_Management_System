<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examTypes = ExamType::get();
        return view('exam_type.index',compact('examTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExamType $examType)
    {
        return view('exam_type.form',compact('examType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|unique:exam_types'
        ]);
        ExamType::create($data);
        $notification = [
            'alert-type'=>'success',
            'message'=>'Data Saved!!'
        ];
        return redirect()->route('examType.index')->with($notification);
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
    public function edit(ExamType $examType)
    {
        return view('exam_type.form',compact('examType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamType $examType)
    {
        $request->validate([
            'name'=>'required|unique:exam_types'
        ]);
        $examType->update([
           'name'=>$request->name,
        ]);
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Updated!!'
        ];
        return redirect()->route('examType.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamType $examType)
    {
        $examType->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Data Deleted!!'
        ];
        return redirect()->route('examType.index')->with($notification);
    }
}
