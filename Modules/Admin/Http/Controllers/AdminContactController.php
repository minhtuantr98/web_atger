<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
   
    public function index()
    {
        $contacts= Contact::orderBy('id','DESC')->paginate(10);
        
        return view('admin::contact.index',compact('contacts'));
    }
    public function active($id)
    {
        $contacts= Contact::find($id);
        if ($contacts->c_status==1) {
            $contacts->c_status=0;
        }else{
            $contacts->c_status=1;
        }
        $contacts->save();
        return back()->with(['flash-message'=>'Success ! Thao tác thành công !','flash-level'=>'success']);
    }
    public function delete($id)
    {
        Contact::destroy($id);
        return back()->with(['flash-message'=>'Success ! Xóa thành công !','flash-level'=>'success']);
    }

    
}
