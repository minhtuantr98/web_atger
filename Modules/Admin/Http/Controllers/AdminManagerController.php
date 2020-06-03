<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminManagerController extends Controller
{
   
    public function index()
    {
        $data['admins']=admin::orderBy('id','DESC')->paginate(10);
        return view('admin::manager.index',$data);
    }

    public function create()
    {
        return view('admin::manager.add');
    }

  
    public function store(Request $request)
    {
        $data=$request->all();
        $admin=new admin;
        $admin->name=$data['name'];
        $admin->email=$data['email'];
        $admin->password=bcrypt($data['password']);
        $admin->address=$data['address'];
        $admin->phone=$data['phone'];
        $admin->level=$data['level'];
        $admin->status=1;

        $admin->save();
        if($admin->id){
            return redirect()->route('admin.get.list.manager')->with(['flash-message'=>'Success ! Thêm mới thành công !','flash-level'=>'success']);
        }

    }

    public function active($id)
    {
        $admin=admin::find($id);
        if ($admin->level==2) {
            $admin->level=1;
        }else{
            $admin->level=2;
        }

        $admin->save();
        return back()->with(['flash-message'=>'Success ! Thao tác thành công !','flash-level'=>'success']);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function delete($id)
    {
        admin::destroy($id);
        return back()->with(['flash-message'=>'Success ! Xóa thành công !','flash-level'=>'success']);
    }
}
