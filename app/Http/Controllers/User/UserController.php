<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

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
    public function editUser($id)
    {
        $editUser = User::findOrFail($id);
        return view('user.edit_user',compact('editUser'));
    }

    public function updateUser(Request $request,$id)
    {
//        User::findorFail($id)->update([
//            'email'=>$request->email,
//            'name'=>$request->name,
//            'password'=>Hash::make($request->password),
//            'user_type'=>$request->user_type
//        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->password = Hash::make($request->password);
        $user->update();
        $notification = [
            'alert-type'=>'info',
            'message'=>'User Info Updated!!'
        ];
        return redirect()->route('user_view')->with($notification);
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'User Info Deleted!!'
        ];
        return redirect()->back()->with($notification);
    }
    public function viewProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.profile.view_profile',compact('user'));
    }

}
