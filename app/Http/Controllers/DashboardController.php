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
 
   // $results=DB::table('sub_menus')
   //  ->join('menus','menus.menu_id','=','sub_menus.menu_id')->get();
   //  return $results;
    $data['menu'] = Menu::orderBy('menu_id', 'Desc')->get();
    $data['submenu'] = SubMenu::orderBy('id','desc')
    ->join('menus','menus.menu_id','=','sub_menus.menu_id')->paginate(10);;
        return view('admin.index', ['data' => $data]);


   	 }



}
