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
class SubMenuController extends Controller
{
    /**
    * @var array
    */
    protected $rules =
    [
        'submenu' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
          $submenu = SubMenu::orderBy('sub_menus.menu_id','desc')
          ->join('menuz','menuz.menu_id','=','sub_menus.menu_id')
          ->get();
        
        return view('submenu.index', ['submenu' => $submenu]);
        
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

            $post = new SubMenu();
            $post->submenu = $request->submenu;
            $post->menu_id = $request->menu;

            $post->save();
            return response()->json($post);
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
        $post = SubMenu::findOrFail($id);
        return view('submenu.show', ['post' => $post]);
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
            $post = SubMenu::findOrFail($id);
            $post->menu_id = $request->menu;
            $post->submenu = $request->submenu;

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
        $post = SubMenu::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }
    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
   
}