<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = ['kode_menu', 'menu'];

	public function submenu()
{
    return $this->belongsTo('App\SubMenu', 'kode_menu');
}
	
}
