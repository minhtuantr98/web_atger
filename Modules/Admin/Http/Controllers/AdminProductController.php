<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Http\Requests\RequestProduct;
use App\Models\category;
use App\Models\product;
use DB;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['productlist']=DB::table('tbl_products')->join('tbl_categories','tbl_products.cate_id','=','tbl_categories.cate_id')->orderBy('pro_id','desc')->paginate(5);

        return view('admin::product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['catelist']=category::all();
        return view('admin::product.add',$data);

    }
    
    public function store(RequestProduct $request)
    {

        $product=new Product;
        $product->pro_name=$request->name;
        $product->pro_slug=str_slug($request->name);
        $product->pro_price=$request->price;
        $product->pro_discount=$request->discount;
        $product->pro_description=$request->description;
        $product->pro_content=$request->content;
        $product->pro_featured=$request->featured;
        $product->cate_id=$request->cate;

        //dd($request->all());
        if ($request->hasFile("img")) {
            $file=upload_image("img");
            if (isset($file['name'])) {
                $product->pro_img=$file['name'];
            }
        }
        $product->save();
        
        return redirect()->route('admin.get.list.product')->with(['flash-message'=>'Success ! Thêm mới thành công !','flash-level'=>'success']);

    }
  
    public function edit($id)
    {
        $data['product']=Product::find($id);
        $data['listcate']=Category::all();
        return view('admin::product.edit',$data);
    }

    public function update(RequestProduct $request, $id)
    {
        //
        $product=Product::find($id);
        $product->pro_name=$request->name;
        $product->pro_slug=str_slug($request->name);
        $product->pro_price=$request->price;
        $product->pro_discount=$request->discount;
        $product->pro_description=$request->description;
        $product->pro_content=$request->content;
        $product->pro_featured=$request->featured;
        $product->cate_id=$request->cate;

        //dd($request->all());
        if ($request->hasFile("img")) {
            $file=upload_image("img");
            if (isset($file['name'])) {
                $product->pro_img=$file['name'];
            }
        }
        $product->save();
        
        return redirect()->route('admin.get.list.product')->with(['flash-message'=>'Success ! Chỉnh sửa thành công !','flash-level'=>'success']);
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back()->with(['flash-message'=>'Success ! Xóa thành công !','flash-level'=>'success']);
    }
}
