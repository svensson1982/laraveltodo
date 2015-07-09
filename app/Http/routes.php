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

Route::get('/', 'IndexController@index');

Route::get('home', 'HomeController@index');
Route::get('login','LoginController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
//provide controller methods with object instead of id
Route::model('tasks','Task');
Route::model('projects','Project');

//use slug rather than Ids in urls
Route::bind('tasks', function($value, $route){
    return App\Task::whereSlug($value)->first();
});

Route::bind('projects', function($value, $route){
    return App\Project::whereSlug($value)->first();
});

Route::resource('projects','ProjectsController');
Route::resource('projects.tasks','TasksController');
