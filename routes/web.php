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
Route::post('addsuperuser', 'SuperUserController@store')->name('addsuperuser');
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
  Route::prefix('super')->group(function () {
  Route::get('/', 'SuperUserController@index')->name('super.dashboard');
  Route::get('register', 'SuperUserController@create')->name('super.register');
  Route::post('register', 'SuperUserController@store')->name('super.register.store');
  Route::post('login', 'Auth\LoginSuperUserController@login')->name('super.auth.loginSuper');
  Route::get('logout', 'Auth\LoginSuperUserController@logout')->name('super.auth.logout');
});

// Route::get('superuser/login', 'Auth\SuperUserLoginController@login')->name('super.auth.login');
// Route::get('superuser/login', 'Auth\LoginSuperUserController@loginSuper')->name('super.login.submit');
Route::post('superuser/login', 'SuperUserController@loginSuper')->name('super.login.submit');
Route::get('superuser/logout', 'SuperUserController@logout')->name('super.logout');
