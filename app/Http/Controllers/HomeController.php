<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware(['auth']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['menu'] = Menu::orderBy('menu_id', 'Desc')->get();
        $data['submenu'] = DB::table('sub_menus')
        ->join('menus','menus.menu_id','=','sub_menus.menu_id')->get();;
        return view('home', ['data' => $data]);

    }
}
