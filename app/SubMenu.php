<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    //
            protected $fillable = ['kode_menu', 'submenu'];

public function menu()
{
    return $this->belongsTo('App\Menu', 'kode_menu');
}
}


