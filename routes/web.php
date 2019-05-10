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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', function () {
    return view('inicio');
});

/**
 * Rutas para Controlador de proyectos (resourse)
 */
Route::resource('/projects', 'ProjectController');
Route::get('/projects/create-project-user/{project}', 'ProjectController@createProjectUser')->name('projects.createProjectUser');
Route::post('/projects/store-project-user', 'ProjectController@storeProjectUser')->name('projects.storeProjectUser');
Route::get('/projects/edit-user-role/{project}/{user}', 'ProjectController@editUserRole')->name('projects.editUserRole');
Route::post('/projects/update-user-role', 'ProjectController@updateUserRole')->name('projects.updateUserRole');

/**
 * Rutas de Usuarios
 */
Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');