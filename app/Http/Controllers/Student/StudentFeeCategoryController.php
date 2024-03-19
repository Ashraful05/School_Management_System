<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentFeeCategory;
use Illuminate\Http\Request;

class StudentFeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = StudentFeeCategory::get();
        return view('student_fee_category.index',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentFeeCategory $feeCategory)
    {
        return view('student_fee_category.form',compact('feeCategory'));
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
            'fee_category_name'=>'required|unique:student_fee_categories'
        ]);
        StudentFeeCategory::create([
            'fee_category_name'=>$request->fee_category_name
        ]);
        $notification = [
            'alert-type'=>'success',
            'message'=>'Data Saved!!!'
        ];
        return redirect()->route('feeCategory.index')->with($notification);
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
    public function edit(StudentFeeCategory $feeCategory)
    {
        return view('student_fee_category.form',compact('feeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentFeeCategory $feeCategory)
    {
        $request->validate([
            'fee_category_name'=>'required|unique:student_fee_categories,fee_category_name,'.$feeCategory->id
        ]);
        $feeCategory->update([
            'fee_category_name'=>$request->fee_category_name
        ]);
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Updated!!!'
        ];
        return redirect()->route('feeCategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentFeeCategory $feeCategory)
    {
        $feeCategory->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Data Deleted!!!'
        ];
        return redirect()->route('feeCategory.index')->with($notification);
    }
}
