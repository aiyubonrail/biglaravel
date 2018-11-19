<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperUser extends Authenticatable
{
    use Notifiable;
// The authentication guard for admin
    protected $guard = 'super';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'name', 'username', 'password','id_admin'
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