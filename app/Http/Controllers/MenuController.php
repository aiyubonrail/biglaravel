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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Menu::orderBy('menu_id', 'desc')->get();
       
        
        return view('menu.index', ['posts' => $posts]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Menu::findOrFail($id);
        return view('menu.show', ['post' => $post]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Menu::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }
    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function storesubMenu(Request $request)
    {
         

            $post = new SubMenu();
            $post->submenu = $request->submenu;
            $post->menu_id = $request->kode_menu;

            $post->save();
            return back()->with('status', 'Sub Menu baru berhasil ditambah');
        
    }
}
