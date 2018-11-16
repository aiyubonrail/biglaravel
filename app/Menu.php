<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table='menus';
    protected $primary = 'kode_menu';

	
	public function submenu()
    {
        return $this->hasOne('App\Submenu','kode_menu');
    }
}
