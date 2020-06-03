<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
class AdminTransactionController extends Controller
{
  
    public function index()
    {
        $data['transactions']=Transaction::where('isDelete',0)->orderBy('trans_id','DESC')->paginate(10);
        return view('admin::transaction.index',$data);
    }

    public function view(Request $request,$id)
    {
        if($request->ajax()){
            $orders=Order::with('product:pro_id,pro_name,pro_img,pro_slug')->where('trans_id',$id)->get();
            $html=view('admin::components.order', compact('orders'))->render();
            return response(['html'=>$html]);
        }
    }

    public function activeTransaction($id){
        $trans=Transaction::find($id);
        $orders=Order::where('trans_id',$id)->get();
        if ($orders) {
            foreach($orders as $order){
                $product=product::find($order->pro_id);
                if ($trans->trans_status==0) {
                    $product->pro_sold=$product->pro_sold+$order->or_qty; //tăng số lượng đã bán

                }else{
                    $product->pro_sold=$product->pro_sold-$order->or_qty; //tăng số lượng đã bán
                }

                $product->save();
            }
        }
        //update trạng thái
        if ($trans->trans_status==0) {
            $trans->trans_status=1;
        } else{
            $trans->trans_status=0;
            
        }
        $trans->save();

        return back()->with(['flash-message'=>'Success ! Xử lý đơn hàng thành công !','flash-level'=>'success']);
    }

    public function delete($id){
        $trans=Transaction::find($id);
        $trans->isDelete=1;

        $trans->save();
        return back()->with(['flash-message'=>'Success ! Xóa đơn hàng thành công !','flash-level'=>'success']);

    }

}
