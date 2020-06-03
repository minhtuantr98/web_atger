<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class users extends Authenticatable
{
    use Notifiable;
    //
    protected $table='tbl_users';
    protected $primaryKey = 'user_id';
    protected $guarded= ['']; 

    protected $guard = 'user'; //xac thực ng dùng

    protected $fillable = [
        'email', 'password',
    ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
