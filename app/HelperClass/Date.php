<?php 
namespace App\HelperClass;

class Date{
    public static function getListDayInMonth(){
        $arr=[];
        $month=date('m');
        $year=date('Y');
        //lấy các ngày trong tháng

        for ($day=1; $day<=31 ; $day++) { 
            $item=mktime(12,0,0,$month,$day,$year);
            if (date('m',$item)==$month) {
                $arr[]=date('Y-m-d',$item);
            }
        }
        return $arr;
    }

}

