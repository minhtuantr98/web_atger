<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
class HomeController extends Controller
{
    //
    public function index(){
        $category=category::orderBy('cate_id','desc')->take(4)->get();

        
        foreach($category as $item)
        {
            $cateID=intval($item['cate_id']);
            $ProductHome=product::where('cate_id',$cateID)->take(6)->get();
            $data['products'][$item['cate_name']]=$ProductHome;
        }

       return view('home.index',$data);
    }


    public function detail($id){
        $data['product'] = Product::find($id);
        
        return view('home.detail',$data);
    }

    public function getCategory($id){
        $data['cateName']=category::find($id);
        $data['items']=product::where('cate_id',$id)->orderBy('pro_id','desc')->paginate(3);
        return view('home.category',$data);
    }

    public function getSearch(Request $request){
        $result=$request->result;
        $data['keyword']=$result;
        $result=str_replace(' ','%',$result);
        $data['items']=product::where('pro_name','like','%'.$result.'%')->paginate(9);
        
        return view('home.search',$data);
    }

    public function getAutoSearch(Request $request){
        $term=$request->get('term');
        $products=product::where('pro_name','like','%'.$term.'%')->take(10)->get();
        $names=array();
        foreach($products as $product){
            array_push($names,$product['pro_name']);
        }
        echo json_encode($names);
    }
}
