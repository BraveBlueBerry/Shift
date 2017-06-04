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
Route::get('/aanmelden', ['as' => 'Aanmelden', 'uses' => 'StyleController@aanmelden']);
Route::get('/contact', ['as' => 'Contact', 'uses' => 'StyleController@contact']);
Route::get('/home', ['as' => 'Home', 'uses' => 'StyleController@home']);
Route::get('/inloggen', ['as' => 'Inloggen', 'uses' => 'StyleController@inloggen']);

?>
