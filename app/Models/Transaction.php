<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table='tbl_transactions';

    protected $primaryKey='trans_id';
    protected $guarded=[];
}
