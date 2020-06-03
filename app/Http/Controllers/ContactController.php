<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    //
    public function index(){
        return view('home.contact');
    }

    public function store(Request $request){
        $data=$request->except('_token');
        $data['created_at']=$data['updated_at']=Carbon::now();
        if (Contact::insert($data)
        ) {
            return back()->with(['flash-message'=>'Success ! Thông tin liên hệ đã được lưu thành công!','flash-level'=>'success']); 
        }else{
            return back()->with(['flash-message'=>'Error ! Có lỗi xảy ra, mời bạn thử lại sau !!!','flash-level'=>'danger']); 
        }

    }
}
