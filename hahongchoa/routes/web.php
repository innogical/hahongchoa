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

Route::get('/logout','LoginController@logout');
Route::get('/', 'RoomController@listroom');

Route::resource('/room', 'RoomController');
Route::get('/room/query/{txtquery}', 'RoomController@querySeach');
//Route::get('/{lat,lng}', 'RoomController@nearRoom');

Route::resource('/register', 'RegisterController');
Route::resource('/loginend', 'LoginController');
Route::resource('/managerroom', 'ManagerprofileController');
Route::resource('/adroom','AdroomdController');
Route::resource('/roomnearskytrian','SearchController');


Route::get('/home', 'HomeController@index')->name('home');
