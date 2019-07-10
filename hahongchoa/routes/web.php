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

Route::get('/logout', 'LoginController@logout');
Route::get('/', 'RoomController@listroom');
Route::resource('/room', 'RoomController');
Route::resource('/register', 'RegisterController');
Route::resource('/loginend', 'LoginController');
Route::resource('/roomnearskytrian', 'SearchController');


//----------------API---------------

Route::get('/room/query/{txtquery}', 'RoomController@querySeach');
Route::get('/room/loadcontacRoom/{idroom}', 'RoomController@loadcontacRoom');

Route::post('/roomnearskytrian/sortresult', 'SearchController@sorTval');
Route::get('/roomnearskytrian/compare/{idroom1}/{idroom2}', 'RoomController@compareRoom');

//----------------API---------------

//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/managerroom', 'ManagerprofileController')->middleware('auth');
Route::resource('/adroom', 'AdroomdController')->middleware('auth');


// test move animate//

Route::get('animate_test', function () {
    return view('component.animate_trian');
});

// login social
Route::get('login/{provider}', 'LoginController@loginsocial');
Route::get('login/{provider}/callback', 'LoginController@Callback');

// login social


