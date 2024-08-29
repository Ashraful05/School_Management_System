<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageOthersCost;
use Illuminate\Http\Request;

class OthersCostController extends Controller
{
    public function index()
    {
        $allData = ManageOthersCost::orderby('id','desc')->get();
        return view('others_cost.index',compact('allData'));
    }

    public function create()
    {

    }

}
