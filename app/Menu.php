<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table='menus';
    protected $fillable = [
        'kode_menu', 'menu',
    ];
	
	public function submenu()
    {
        return $this->hasOne('App\Submenu');
    }
}
