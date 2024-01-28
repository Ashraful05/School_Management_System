<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
