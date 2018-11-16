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

Route::post('addmenu', 'MenuController@storeMenu')->name('addmenu');
Route::post('addsubmenu', 'MenuController@storesubMenu')->name('addsubmenu');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('addsuperuser', 'DashboardController@index')->name('addsuperuser');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Auth::routes(['verify' => true]);
Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');
