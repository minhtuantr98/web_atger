<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestEmailUser;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Hash;
class LoginController extends Controller
{
    //
    public function getLogin(){

        return view('auth.login');
    }

    public function postLogin(Request $request){
        if ($request->remember ='Remember') {
            $remember=true;
        }else{
            $remember=false;
        }

        $credentials=$request->only('email','password');
        $user['user_email']=$credentials['email'];
        $user['password']=$credentials['password'];
        if (Auth::guard('web')->attempt($user,$remember)) {
            return redirect()->route('home')->with(['flash-message'=>'Success ! Đăng nhập thành công !','flash-level'=>'success']);
        }else  {
            return back()->withInput()->with(['flash-message'=>'Lỗi! Tài khoản hoặc mật khẩu không chính xác!!!','flash-level'=>'danger']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('home')->with(['flash-message'=>'Success ! Tài khoản đã đăng xuất thành công !','flash-level'=>'success']);
    }

    public function getForgotPassword(){
        return view('auth.forgotpassword');
        
    }
    public function postForgotPassword(RequestEmailUser $request){
        $email=$request->email;
        $user=users::where('user_email',$email)->first();
       
        $string=substr(md5(time()), 0, 8);
        $user->password=bcrypt($string);
        $user->save();
        
        $data['name']=$user->user_name;
        $data['email']=$email;
        $data['newpass']=$string;

        Mail::send('auth.forgotpass-email',$data,function($message) use ($email){
            $message->from('nguyentheanh.25049x@gmail.com','Nguyen The Anh');
            $message->to($email,$email);
           // $message->cc('nguyentheanh.25049x@gmail.com','Anh nguyen');
            $message->subject('Mật khẩu mới tại Tger-shop');
        });

        return back()->with(['flash-message'=>'Success ! Mật khẩu mới của bạn đã được gửi đến địa chỉ email của bạn thành công !','flash-level'=>'success']);
        
    }

    public function getChangePassword(){
        return view('auth.change-password');
    }
    public function postChangePassword(Request $request){
        $oldPassword    = $request->old_password;
        $hashedPassword = Auth::user()->password;

        if (Hash::check($oldPassword, $hashedPassword)) 
        {
            if($request->new_password==$request->re_password){
                $id=Auth::guard()->user()->user_id;
                $user=users::find($id)->update(
                    ['password'=> Hash::make($request->new_password)]
                );
                return back()->with(['flash-message'=>'Success ! Thay đổi mật khẩu thành công !','flash-level'=>'success']);
            }
        }else{
            return back()->with(['flash-message'=>'Error ! Thay đổi thất bại mời bạn thao tác lại !','flash-level'=>'danger']);
        }
    }
}
