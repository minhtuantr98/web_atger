<?php

namespace Modules\Admin\Http\Controllers;

use App\HelperClass\Date;
use App\Models\Contact;
use App\Models\product;
use App\Models\users;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        //list contact
        $data['total_contacts']=count(Contact::all());
        $data['new_contacts']=count(Contact::whereDay('created_at',date('d'))
                                    ->orWhere('c_status',0)->get());
                               
        //đơn hàng
        $data['total_trans']=count(Transaction::where('isDelete',0)->get());
        $data['new_trans']=count(Transaction::where('isDelete',0)
                                    ->whereDay('created_at',date('d'))
                                    ->get());
        //thông kê sp
        $data['total_products']=count(product::all());
     
        //thống kê thành viên KH
        $data['total_users']=count(users::all());

        //doanh thu theo ngày
        $moneyDay=Transaction::whereMonth('updated_at',date('m'))
                    ->where('trans_status',1)
                    ->where('isDelete',0)
                    ->select(\DB::raw('sum(trans_total) as totalMoney'), \DB::raw('DATE(updated_at) day'))
                    ->groupBy('day')
                    ->get()->toArray();
        $listday=Date::getListDayInMonth();
        $arrRevenTransactionMonth=[];
        foreach($listday as $day){
            foreach ($moneyDay as $key => $value) {
                $total=0;
                if ($value['day']==$day) {
                    $total=(int)$value['totalMoney'];
                    break;
                }
            }
            $arrRevenTransactionMonth[]=$total;
        }

        $data['listday']=json_encode(Date::getListDayInMonth());
        $data['arrRevenTransactionMonth']=json_encode($arrRevenTransactionMonth);

        //doan thu theo tháng
        $moneyMonth=Transaction::whereYear('updated_at',date('Y'))
            ->where('trans_status',1)
            ->select(\DB::raw('sum(trans_total) as totalMoney'), \DB::raw('Month(updated_at) month'))
            ->groupBy('month')
            ->get()->toArray();

        $arrRevenTransactionYear=[];
        $listMonth=[1,2,3,4,5,6,7,8,9,10,11,12];
        foreach($listMonth as $month){
            foreach ($moneyMonth as $key => $value) {
                $total=0;
                if ($value['month']==$month) {
                    $total=(int)$value['totalMoney'];
                    break;
                }
            }
            $arrRevenTransactionYear[]=$total;
        }


        $data['listmonth']=json_encode($listMonth);
        $data['arrRevenTransactionYear']=json_encode($arrRevenTransactionYear);

        return view('admin::index',$data);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

 
}
