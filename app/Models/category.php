<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table='tbl_categories';

    protected $primaryKey='cate_id';
    protected $guarded=[];

}
