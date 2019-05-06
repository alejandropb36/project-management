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

use App\Project;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'ProjectController@index')->name('home');


Route::resource('/projects', 'ProjectController');
Route::resource('/homeworks', 'HomeworkController');

/*Route::get('/prueba', function () {
    $projects = Project::all();
    foreach($projects as $project)
    {
        echo $project->name;
        echo $project->description;
        
        echo '<br><strong>Nombre de Tareas</strong><br>'; 
        foreach($project->homeworks as $homework)
        {
            echo $homework->name.'<br>';
        }
    }
    die();
});*/