<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUser;
use Illuminate\Http\Request;
use App\Models\users;
class RegisterController extends Controller
{
    //
    public function getRegister(){

        return view('auth.register');
    }

    public function postRegister(RequestUser $request){
        $user=new users();
        $user->user_name=$request->name;
        $user->user_email=$request->email;
        $user->user_password=bcrypt($request->password);
        $user->user_phone=$request->phone;
        $user->user_address=$request->address;
        $user->status=1;

        $user->save();
        if($user->user_id){
            return redirect()->route('get.login')->with(['flash-message'=>'Success ! Đăng ký tài khoản thành công !','flash-level'=>'success']);
        }
        return back();

    }
}
