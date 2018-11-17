<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;
use DB;

class DashboardController extends Controller
{
    //
     public function __construct()
    {
        
        $this->middleware(['auth']);

    }
   	 

   	 public function index()
   	 {   

      $data['menu'] = Menu::join('submenus', 'submenus.kode_menu', '=', 'menus.kode_menu')
        ->get();
     // Menu::join('submenus', 'submenus.kode_menu', '=', 'menu.kode_menu')->get();
      $data['submenu'] = SubMenu::orderBy('id', 'desc')->get();

        return view('home', ['data' => $data]);


   	 }



}
