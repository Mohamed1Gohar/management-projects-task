<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AccountController;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\JobController;
use \App\Http\Controllers\TaskController;

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
    return view('welcome');
});

//accounts
//projects
//jobs
//tasks

Route::resource('accounts', AccountController::class);
Route::resource('projects', ProjectController::class);
Route::resource('jobs', JobController::class);
Route::resource('tasks', TaskController::class);

Route::get('get-records', [AccountController::class, 'getAllRecords']);

Route::get('get-tasks', [AccountController::class, 'getTasks']);






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
