<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Menuz;
use App\SubMenu;

use View;
use DB;
class MenuzController extends Controller
{
    public function __construct()
        {
            $this->middleware('guest:super');
        }

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
        $posts = Menuz::orderBy('menu_id', 'desc')->get();
       
          $submenu = SubMenu::orderBy('sub_menus.menu_id','desc')
          ->join('menuz','menuz.menu_id','=','sub_menus.menu_id')
          ->get();
        
        
        return view('menuz.index', ['posts' => $posts ,'submenu' => $submenu]);
    	
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

            $post = new Menuz();
            $post->menu = $request->menu;
            $post->id = $request->menu_id;
            $post->menu_id = $request->menu_id;

            $post->save();
            return response()->json($post);
        }
    }
   
    public function show($id)
    {
        $post = Menuz::findOrFail($id);
        return view('menuz.show', ['post' => $post]);
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
            $post = Menuz::findOrFail($id);
            $post->menu = $request->menu;
            $post->save();
            return response()->json($post);
        }
    }
   
    public function destroy($id)
    {
        $post = Menuz::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }
    
   
}