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

    phpinfo();
//    return view('welcome');
});


Route::post('/project', function (){
    App\Project::create(request(['title', 'description']));
});

Route::get('/project', function (){
    $projects = App\Project::all();

    return view('projects.index', compact('projects'));
});
