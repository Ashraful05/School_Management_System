<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userView()
    {
        $users = User::get();
//        return $users;
        return view('user.user_view',compact('users'));
    }
    public function userAdd()
    {
        return view('user.user_add');
    }
    public function userSave(Request $request)
    {
        $request->validate([
           'email'=>'required|unique:users',
           'user_type'=>'required',
           'name'=>'required',
        ]);
        User::create([
           'email'=>$request->email,
           'name'=>$request->name,
           'password'=>Hash::make($request->password),
            'user_type'=>$request->user_type
        ]);
        $notification = [
          'alert-type'=>'success',
          'message'=>'User Info Saved!!'
        ];
        return redirect()->route('user_view')->with($notification);
    }
}
