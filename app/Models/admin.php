<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;

    protected $table='tbl_admin';
    protected $primaryKey = 'id';
    protected $guarded= ['']; 
    
    protected $guard = 'admin';
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
