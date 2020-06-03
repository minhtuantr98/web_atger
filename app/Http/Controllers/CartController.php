<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Transaction;
use Carbon\Carbon;
use Cart;
use Mail;
use Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    private $vnp_TmnCode = "7YW17O2R"; //Mã website tại VNPAY 
   // private $vnp_TmnCode = "XDI57G04"; //Mã website tại VNPAY  banhkempucake.vn
    private $vnp_HashSecret = "DFFOILNRRYKEEIJEKVIYOBXNPSJNGFDO"; //Chuỗi bí mật
    //private $vnp_HashSecret = "DHITEUIZALXYJDWXOQEEUTSFUWMTGUWV"; //Chuỗi bí mật
    private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    private $vnp_Returnurl = "http://thegioibanhkem.vn/cart/pay";
    public function add($id){  
        $product=product::find($id);
        Cart::add([
            'id' => $id, 
            'name' => $product->pro_name, 
            'qty' => 1, 
            'price' => $product->pro_price - $product->pro_price*$product->pro_discount/100,
            'weight' => 1, 
            'options' => [
                'img' =>$product->pro_img ,
                'slug'=>$product->pro_slug,
                'sale'=>$product->pro_discount
                ]
        ]);

        return redirect('cart/show')->with(['flash-message'=>'Success ! Đã thêm sản phẩm giỏ hàng!','flash-level'=>'success']);

    }

    public function show(){
        $data['total']=Cart::total();
        $data['items']=Cart::content();
        return view('home.cart',$data);
    }

    
    public function delete($id){
        if($id=="all"){
            Cart::destroy();
        }else{
            Cart::remove($id);
 
        }
        return back()->with(['flash-message'=>'Success ! Xóa thành công !','flash-level'=>'success']);
    }

    public function update(Request $request){
        Cart::update($request->rowId,$request->qty);
    }

    public function postComplete(Request $request){
        $data['info']=$request->all();
        $data['cart']=Cart::content();
        $data['total']=Cart::total();
        $email=$request->email;
        $total=str_replace(',','',Cart::subtotal(0,3));
       

        if (Auth::check()) {
            $user_id=Auth::guard()->user()->user_id;
        }else{
            $user_id=0;
        }

        $transactionId=Transaction::insertGetId([
            'user_id'=>$user_id,
            'trans_total'=> (int)$total,
            'trans_content'=>$request->content,
            'trans_address'=>$request->add,
            'trans_phone'=>$request->phone,
            'trans_email'=> $email,
            'trans_PTTT'=>0,
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            

        ]);
        if($transactionId){
            //gửi mail
            Mail::send('home.email',$data,function($message) use ($email){
                $message->from('nguyentheanh.25049x@gmail.com','Nguyen The Anh');
                $message->to($email,$email);
                $message->cc('nguyentheanh.25049x@gmail.com','Anh nguyen');
                $message->subject('Xác nhận hóa đơn mua hàng Tger-shop');
            });

            // lưu vào chi tiết đơn hàng

            foreach($data['cart'] as $product){
                Order::insert([
                    'trans_id'=>$transactionId,
                    'pro_id'=>$product->id,
                    'or_qty'=>$product->qty,
                    'or_price'=>$product->price,
                    'or_sale'=>$product->options->sale,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ]);
            }
        }
        // lưu thông tin giỏ hàng


        Cart::destroy();
        return redirect('complete');
    }

    public function complete(){
        return view('home.complete');
    }

    // thanh toán online
    public function getPay(Request $request){
        if($request->vnp_ResponseCode=='00'){
            $transactionId=$request->vnp_TxnRef;
            $transaction=Transaction::find($transactionId);
            if ($transaction) {

                $data['info']=Session::get('info_customer');
                $data['cart']=Cart::content();
                $data['total']=Cart::total();
                $email=$data['info']['email'];

                //gửi mail
                Mail::send('home.email',$data,function($message) use ($email){
                    $message->from('nguyentheanh.25049x@gmail.com','Nguyen The Anh');
                    $message->to($email,$email);
                    $message->cc('nguyentheanh.25049x@gmail.com','Anh nguyen');
                    $message->subject('Xác nhận hóa đơn mua hàng thanh toán online tại Tger-shop');
                });

                $request->session()->forget('info_customer');
                Cart::destroy();
                $transaction->trans_PTTT=1;

                $transaction->save();
                return redirect()->intended('complete')->with(['flash-message'=>'Success ! Xác nhận giao dịch thành công !','flash-level'=>'success']);
            }
            return redirect()->to('/')->with(['flash-message'=>'Warning ! Mã giao dịch không tồn tại !','flash-level'=>'danger']);

        }else{
            $transactionId=$request->vnp_TxnRef;
            $transaction=Transaction::find($transactionId);
            if ($transaction) {
                Transaction::destroy($transaction);
                DB::table('tbl_orders')->where('trans_id', $transaction)->delete();

                return redirect()->to('/')->with(['flash-message'=>'Error ! Có lỗi xảy ra, giao dịch không thành công. Mời bạn thao tác lại sau !','flash-level'=>'danger']);
            }
        }

        $products=Cart::content();
        return view('home.paycart',compact('products'));
    }

    public function postPay(Request $request){
        $data['info']=$request->all();
        $data['cart']=Cart::content();
        $data['total']=Cart::total();
        $email=$request->email;
        $total=str_replace(',','',Cart::subtotal(0,3));


        if (Auth::check()) {
            $user_id=Auth::guard()->user()->user_id;
        }else{
            $user_id=0;
        }

        $transactionId=Transaction::insertGetId([
            'user_id'=>$user_id,
            'trans_total'=> (int)$total,
            'trans_content'=>$request->content,
            'trans_address'=>$request->add,
            'trans_phone'=>$request->phone,
            'trans_email'=> $email,
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            

        ]);

        if($transactionId){
            session(['info_customer' => $request->all()]); // lưu tt KH để gửi mail
            // lưu vào giỏ hàng
            $products=Cart::content();
            foreach($products as $product){
                Order::insert([
                    'trans_id'=>$transactionId,
                    'pro_id'=>$product->id,
                    'or_qty'=>$product->qty,
                    'or_price'=>$product->price,
                    'or_sale'=>$product->options->sale,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ]);
            }

        }

        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        
        $vnp_OrderInfo = $request->content;
        $vnp_OrderType = $request->order_type;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];


        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_Amount" => $total * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $this->vnp_Returnurl,
            "vnp_TxnRef" => $transactionId,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $this->vnp_Url . "?" . $query;
        if (isset($this->vnp_HashSecret)) {
        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            
        //echo json_encode($returnData);
        return redirect()->to($returnData['data']);
    }
}

// thẻ ok
// Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456

//thẻ k đủ số dư
// Ngân hàng: NCB
// Số thẻ: 9704195798459170488
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15