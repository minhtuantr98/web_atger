<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //
    public function index($id){
        $user=users::find($id);
        return view("page-user.index",compact('user'));
    }

    public function post(Request $request,$id){
        $user=users::find($id);
        $user->user_name=$request->name;
        $user->user_address=$request->address;
        $user->user_phone=$request->phone;

        $user->save();
        
        return back()->with(['flash-message'=>'Success ! Thông tin cá nhân đã được thay đổi !','flash-level'=>'success']);
    }
}
