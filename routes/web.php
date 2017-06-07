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

Route::get('/', ['as' => 'Home', 'uses' => 'HomeController@index']);

# Routes for testing the style
Route::get('/styletest', ['as' => 'Test', 'uses' => 'StyleController@index']);
Route::get('/aanmelden', ['as' => 'aanmelden', 'uses' => 'StyleController@aanmelden']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'StyleController@contact']);
Route::get('/home', ['as' => 'home', 'uses' => 'StyleController@home']);
Route::get('/inloggen', ['as' => 'inloggen', 'uses' => 'StyleController@inloggen']);
Route::get('/landing', ['as' => 'landing', 'uses' => 'StyleController@landing']);

?>
