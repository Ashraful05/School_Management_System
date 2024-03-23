<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use Illuminate\Http\Request;

class StudentFeeCategoryAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $amounts = FeeCategoryAmount::with('feeCategory','class')->get();
        $amounts = FeeCategoryAmount::select('fee_category_id')
                                    ->groupBy('fee_category_id')
                                    ->get();
        return view('student_fee_category_amount.index',compact('amounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FeeCategoryAmount $feeCategoryAmount)
    {
        $feeCategories = StudentFeeCategory::get();
        $classes = StudentClass::get();
        return view('student_fee_category_amount.form',compact('feeCategoryAmount','feeCategories','classes'));
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
            'fee_category_id'=>'required'
        ],[
            'fee_category_id.required'=>'Fee Category Name is required'
        ]);
        $countClass = count($request->class_id);
        if($countClass != ''){
            for($i=0;$i<$countClass;$i++){
                FeeCategoryAmount::create([
                    'fee_category_id'=>$request->fee_category_id,
                    'class_id'=>$request->class_id[$i],
                    'amount'=>$request->amount[$i]
                ]);
            }
        }
        $notification = [
            'alert-type'=>'success',
            'message'=>'Data Saved!!!'
        ];
        return redirect()->route('feeCategoryAmount.index')->with($notification);
//        return redirect()->back()->with($notification);
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
    public function edit(FeeCategoryAmount $feeCategoryAmount,$fee_category_id)
    {
//        return $feeCategoryAmount;
//        return $fee_category_id;
//        return $feeCategoryAmount;
        $feeCategoryAmount->fee_category_id = $fee_category_id;
//        return $feeCategoryAmount;
        $feeCategories = StudentFeeCategory::get();
        $classes = StudentClass::get();
//        $feeCategoryAmount->toArray();
//        FeeCategoryAmount $feeCategoryAmount;
//          $feeCategoryAmount->where($feeCategoryAmount->fee_category_id)
//            ->orderby('class_id','asc')->get()->dd();
          $editClassWiseCategory = FeeCategoryAmount::where('fee_category_id',$fee_category_id)
              ->orderby('class_id','asc')->get();
//          return $classWiseCategory;
//        return view('student_fee_category_amount.form',compact('feeCategoryAmount','feeCategories','classes'));
        return view('student_fee_category_amount.form',compact('feeCategoryAmount',
            'editClassWiseCategory','feeCategories','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$fee_category_id)
    {
//        return $request->all();
        if($request->class_id == null){
            $notification = [
              'alert-type'=>'error',
              'message'=>'You must have to add at least one class!'
            ];
            return redirect()->back()->with($notification);
        }else{
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
            for($i=0; $i<$countClass; $i++){
              $data = new FeeCategoryAmount();
              $data->fee_category_id = $request->fee_category_id;
              $data->class_id = $request->class_id[$i];
              $data->amount = $request->amount[$i];
              $data->save();
            }
            $notification = [
                'alert-type'=>'info',
                'message'=>'You data is Updated!'
            ];
            return redirect()->route('feeCategoryAmount.index')->with($notification);
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
