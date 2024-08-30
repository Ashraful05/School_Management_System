<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageOthersCost;
use Illuminate\Http\Request;
use function GuzzleHttp\normalize_header_keys;

class OthersCostController extends Controller
{
    public function index()
    {
        $allData = ManageOthersCost::orderby('id','desc')->get();
        return view('others_cost.index',compact('allData'));
    }

    public function create()
    {
        return view('others_cost.form');
    }

    public function store(Request $request)
    {
        if($request->file('image')){
            $file = $request->file('image');
            $imageName = date('YmHi').$file->getClientOriginalName();
            $file->move(public_path('images/other_cost_images/.'),$imageName);
        }
        ManageOthersCost::create([
           'date'=>date('Y-m-d',strtotime($request->date)),
            'amount'=>$request->amount,
            'description'=>$request->description,
            'image'=>$imageName
        ]);
        $notification = [
          'alert-type'=>'success',
          'message'=>'Date Inserted!!'
        ];
        return redirect()->route('manageOthersCost.index')->with($notification);
    }

    public function edit($id)
    {
        $data = ManageOthersCost::findOrFail($id);
//        return $data;
        return view('others_cost.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ManageOthersCost::findOrFail($id);

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('images/other_cost_images/'.$data->image));
            $imageName = date('YmHi').'.'.$file->getClientOriginalName();
            $file->move(public_path('images/other_cost_images/'),$imageName);
        }

        $data->update([
            'date'=>date('Y-m-d',strtotime($request->date)),
            'amount'=>$request->amount,
            'description'=>$request->description,
            'image'=>$imageName
        ]);
        $notification = [
            'alert-type'=>'success',
            'message'=>'Date Inserted!!'
        ];
        return redirect()->route('manageOthersCost.index')->with($notification);
    }

}
