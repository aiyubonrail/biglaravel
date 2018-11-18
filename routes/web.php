<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('addmenu', 'MenuController@store')->name('addmenu');
Route::post('addsubmenu', 'MenuController@storesubMenu')->name('addsubmenu');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('addsuperuser', 'DashboardController@index')->name('addsuperuser');
Route::get('admin', 'DashboardController@index')->name('admin');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Auth::routes(['verify' => true]);
Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::get('/menus', function(){

		$menu = \App\Menu::orderBy('menu_id', 'Desc')->with('submenu')->get();

    return $menu;
});
Route::resource('menuz','MenuzController');

Route::resource('submenu','SubmenuController');
Route::get('delsubmenu/{id}','SubmenuController@destroy');
Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'MenuController@update'));


