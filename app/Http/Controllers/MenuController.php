<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;

use DB;
use Illuminate\Support\Facades\Redirect;


class MenuController extends Controller {
    
    public function storeMenu(Request $request) {
        $data = new Menu ();
        $data->kode_menu = $request->kode_menu;
        $data->menu = $request->menu;
        $data->save ();

    return back()->with('status', 'Menu baru berhasil ditambah');
    }
    
    public function storesubMenu(Request $request) {
        $data = new SubMenu ();
        $data->kode_menu = $request->kode_menu;
        $data->submenu = $request->submenu;
        $data->save ();

    return back()->with('status', 'Sub Menu baru berhasil ditambah');
    }

    public function viewmenu() {
        $data = Menu::all ();
        return $data;
    }
    public function deleteMenu(Request $request) {
        $data = Menu::find ( $request->id )->delete ();
    }
    public function editMenu(Request $request, $id){
        $data =Menu::where('id', $id)->first();
        $data->kode_menu = $request->get('kode_menu');
        $data->menu = $request->get('menu');
        $data->save();
        return $data;
    }

}
