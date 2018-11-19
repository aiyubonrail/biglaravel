<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use View;
use DB;
use App\Menu;
use App\SubMenu;

class MenuController extends Controller {
    


     protected $rules =
    [
        'menu' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
    ];
    
    public function index()
    {
        $posts = Menu::orderBy('menu_id', 'desc')->get();
       
        
        return view('menu.index', ['posts' => $posts]);
        
    }
   
    public function create()
    {
        //
    }
   
    public function store(Request $request)
    {
         
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            $post = new Menu();
            $post->menu = $request->menu;
            $post->id = $request->content;

            $post->save();
            return back()->with('status', 'Menu baru berhasil ditambah');
        }
    }
   
    public function show($id)
    {
        $post = Menu::findOrFail($id);
        return view('menu.show', ['post' => $post]);
    }
    
    public function edit($id)
    {
        //
    }
   
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $post = Menu::findOrFail($id);
            $post->menu = $request->menu;
            $post->save();
            return response()->json($post);
        }
    }
    
   
    public function destroy($id)
    {
        $post = Menu::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }
   
    
    public function storesubMenu(Request $request)
    {
         

            $post = new SubMenu();
            $post->submenu = $request->submenu;
            $post->menu_id = $request->kode_menu;

            $post->save();
            return back()->with('status', 'Sub Menu baru berhasil ditambah');
        
    }
}
