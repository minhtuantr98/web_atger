<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table='tbl_orders';

    protected $primaryKey='id';
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(product::class,'pro_id');
    }
}
