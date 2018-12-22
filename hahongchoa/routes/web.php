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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/zone', function () {
    return view('zone');
});

//
//Route::get('/register', function () {
//    return view('manager-register');
//});
//
Route::get('/logout','LoginController@logout');
Route::resource('/register', 'RegisterController');
Route::resource('/loginend', 'LoginController');
Route::resource('/managerroom', 'ManagerprofileController');
Route::resource('/adroom','AdroomdController');


Route::get('/home', 'HomeController@index')->name('home');
