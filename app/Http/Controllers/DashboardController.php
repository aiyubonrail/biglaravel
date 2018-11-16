<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
     public function __construct()
    {
        
        $this->middleware(['auth', 'verified']);

    }
   	 

   	 public function index()
   	 {
   	 	

   	 		return view('dashboard')

   	 }

   	 	public function createMenu(){

        $menu = new Menu([
        'kode_menu' => $request->get('kode_menu'),
        'menu'=> $request->get('menu'),
      ]);
      $menu->save();
      return redirect('/home')->with('success', 'Menu has been added');
      }


}
