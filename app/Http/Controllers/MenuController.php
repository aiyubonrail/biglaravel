<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use DB;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
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

      public function index()
    {

        $menus = Menu::orderBy('id', 'desc')->get();
        return view('home', ['menus' => $menus]);
    }


    public function store(Request $request)
    {
      
            $menu = new Menu();
            $menu->kode_menu = $request->kode_menu;
            $menu->menu = $request->menu;
            $menu->save();
         return $request->all();

    }



    
    public function show($id)
    {
        $menus = Menu::findOrFail($id);
        return view('menu.show', ['menus' => $menus]);
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
            $menus = Menu::findOrFail($id);
            $menu->kode_menu = $request->kode_menu;
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
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return response()->json($menu);
    }


}
