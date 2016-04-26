<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

/* Users crud route */
Route::resource('users', 'UserController');

/* Projects crud route */
Route::resource('projects', 'ProjectController');

/* Phases crud route */
Route::post('phases/add-activity', 'PhaseController@addActivity');
Route::post('phases/get-project-phases', 'PhaseController@getProjectPhases');
Route::resource('phases', 'PhaseController');

/* Projects crud route */
Route::resource('boards', 'BoardController');
Route::post('boards/changestatus', 'BoardController@changestatus');

/* Tasks Status crud rout */
Route::resource('tasks-status', 'TaskStatusController');