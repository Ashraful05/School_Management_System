<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = StudentGroup::get();
        return view('student_group.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentGroup $group)
    {
        return view('student_group.form',compact('group'));
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
           'group_name'=>'required|unique:student_groups,group_name'
        ]);
        StudentGroup::create([
           'group_name'=>$request->group_name
        ]);
        $notification = [
            'alert-type'=>'success',
            'message'=>'Data Saved!!!'
        ];
        return redirect()->route('group.index')->with($notification);
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
    public function edit(StudentGroup $group)
    {
        return view('student_group.form',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentGroup $group)
    {
        $request->validate([
            'group_name'=>'required|unique:student_groups,group_name,'.$group->id
        ]);
       $group->update([
            'group_name'=>$request->group_name
        ]);
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Updated!!!'
        ];
        return redirect()->route('group.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentGroup $group)
    {
        $group->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Data Deleted!!!'
        ];
        return redirect()->route('group.index')->with($notification);
    }
}
