<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::login');
    }

    public function post(Request $request)
    {
        $arr=['email'=>$request->email,'password'=>$request->password];
        if ($request->remember ='Remember Me') {
            $remember=true;
        }else{
            $remember=false;
        }

        if (Auth::guard('admin')->attempt($arr,$remember)) {
            return redirect()->route('admin.home')->with(['flash-message'=>'Success ! Đăng nhập thành công !','flash-level'=>'success']);
        }else  {
            return back()->withInput()->with(['flash-message'=>'Lỗi! Tài khoản hoặc mật khẩu không chính xác!!!','flash-level'=>'danger']);
        }

    }

   
}
