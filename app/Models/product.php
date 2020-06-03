<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table='tbl_products';

    protected $primaryKey='pro_id';
    protected $guarded=[];
}
