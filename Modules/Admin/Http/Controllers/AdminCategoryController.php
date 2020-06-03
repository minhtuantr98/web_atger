<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\category;
class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['catelist']=category::all();
        return view('admin::category.index',$data);
    }

   
    public function store(RequestCategory $request)
    {
        $category=new Category;
        $category->cate_name=$request->cate_name;
        $category->cate_slug= str_slug($request->cate_name); 
        $category->save();
        return back()->with(['flash-message'=>'Success ! Thêm mới thành công !','flash-level'=>'success']);
        
    }

    public function edit($id)
    {
        $data['cate']=category::find($id); 
        return view('admin::category.edit',$data);
    }

    public function update(RequestCategory $request, $id)
    {
        $category=category::find($id);
        $category->cate_name=$request->cate_name;
        $category->cate_slug= str_slug($request->cate_name); 
        $category->save();
        return redirect()->intended('admin/category')->with(['flash-message'=>'Success ! Chỉnh sửa thành công !','flash-level'=>'success']);

    }

    public function delete($id){
        category::destroy($id);
        return back()->with(['flash-message'=>'Success ! Xóa thành công !','flash-level'=>'success']);
    }
}
