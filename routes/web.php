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



# Routes for testing the style
Route::get('/aanmelden', ['as' => 'aanmelden', 'uses' => 'StaticSiteController@aanmelden']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'StaticSiteController@contact']);
Route::get('/home', ['as' => 'home', 'uses' => 'StaticSiteController@home']);
Route::get('/inloggen', ['as' => 'inloggen', 'uses' => 'StaticSiteController@inloggen']);
Route::get('/', ['as' => 'home', 'uses' => 'StaticSiteController@home']);


Route::get('/app', ['as' => 'landing', 'uses' => 'AppController@landing']);
?>
