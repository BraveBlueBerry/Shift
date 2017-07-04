<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* USERS */
Route::get('/user/{id}', ['as' => 'get_user', 'uses' => 'UserController@read']);
Route::put('/user/{id}', ['as' => 'put_user', 'uses' => 'UserController@update']);
Route::post('/user', ['as' => 'post_user', 'uses' => 'UserController@create']);
Route::delete('/user/{id}', ['as' => 'delete_user', 'uses' => 'UserController@delete']);

/*  DOCUMENTS */
Route::get('/document/{id}', ['as' => 'get_document', 'uses' => 'DocumentController@read']);
Route::put('/document/{id}', ['as' => 'put_document', 'uses' => 'DocumentController@update']);
Route::post('/document', ['as' => 'post_document', 'uses' => 'DocumentController@create']);
Route::delete('/document/{id}', ['as' => 'delete_document', 'uses' => 'DocumentController@delete']);

/* TOKEN */
Route::post('/token', ['as' => 'post_token', 'uses' => 'TokenController@create']);
Route::get('/token/{id}', ['as' => 'get_token', 'uses' => 'TokenController@read']);
Route::delete('/token', ['as' => 'delete_token', 'uses' => 'TokenController@delete']);

/* TEAMS */
Route::get('/team/{id}', ['as' => 'get_team', 'uses' => 'TeamController@read']);
Route::get('/team', ['as' => 'get_teams', 'uses' => 'TeamController@readAll']);
Route::put('/team/{id}', ['as' => 'put_team', 'uses' => 'TeamController@update']);
Route::post('/team', ['as' => 'post_team', 'uses' => 'TeamController@create']);
Route::delete('/team/{id}', ['as' => 'delete_team', 'uses' => 'TeamController@delete']);

/* MEMBERS */
Route::get('/team/{team_id}/member', ['as' => 'get_members', 'uses' => 'MemberController@readAll']);
Route::delete('/team/{team_id}/member/{user_id}', ['as' => 'delete_member', 'uses' => 'MemberController@delete']);

/* INVITATIONS */
Route::post('/invitation', ['as' => 'post_invitation', 'uses' => 'InvitationController@create']);
Route::get('/invitation', ['as' => 'get_invitation', 'uses' => 'InvitationController@readAll']);
Route::delete('/invitation/{id}', ['as' => 'delete_invitation', 'uses' => 'InvitationController@delete']);

/* CATEGORIES */
Route::get('/category/{id}', ['as' => 'get_category', 'uses' => 'CategoryController@read']);
Route::get('/category', ['as' => 'get_categories', 'uses' => 'CategoryController@readAll']);
Route::put('/category/{id}', ['as' => 'put_category', 'uses' => 'CategoryController@update']);
Route::post('/category', ['as' => 'post_category', 'uses' => 'CategoryController@create']);
Route::delete('/category/{id}', ['as' => 'delete_category', 'uses' => 'CategoryController@delete']);
Route::get('/team/{team_id}/category', ['as' => 'get_categories_for_team', 'uses' => 'CategoryController@readAllTeam']);
Route::post('/team/{team_id}/category', ['as' => 'post_categories_for_team', 'uses' => 'CategoryController@createForTeam']);

/* REGISTRATIONS */
Route::get('/registration/{id}', ['as' => 'get_registration', 'uses' => 'RegistrationController@read']);
Route::get('/registration', ['as' => 'get_registrations', 'uses' => 'RegistrationController@readAll']);
Route::get('/team/{team_id}/registration', ['as' => 'get_team_registrations', 'uses' => 'RegistrationController@readAllTeam']);
Route::put('/registration/{id}', ['as' => 'put_registration', 'uses' => 'RegistrationController@update']);
Route::post('/registration', ['as' => 'post_registration', 'uses' => 'RegistrationController@create']);
Route::delete('/registration/{id}', ['as' => 'delete_registration', 'uses' => 'RegistrationController@delete']);

/* STATUSES */

Route::get('/status/{id}', ['as' => 'get_status', 'uses' => 'StatusController@read']);
Route::get('/status', ['as' => 'get_statuses', 'uses' => 'StatusController@readAll']);
