<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuz;
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
        
        $data['menu'] = Menuz::orderBy('menu_id', 'Desc')->get();
        $data['submenu'] = DB::table('sub_menus')
        ->join('menuz','menuz.menu_id','=','sub_menus.menu_id')->paginate(10);;
        return view('home', ['data' => $data]);

    }
}
