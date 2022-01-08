<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mod1', [App\Http\Controllers\HomeController::class, 'mod1'])->name('mod1');
Route::post('/sub1', [App\Http\Controllers\HomeController::class, 'sub1'])->name('sub1');

// Route::get('download','App\Http\Controllers\HomeController@download');


Route::group(['middleware' => ['web', 'custom_one']], function() {

Route::get('/mod2', [App\Http\Controllers\HomeController::class, 'mod2'])->name('mod2');
Route::post('/sub2', [App\Http\Controllers\HomeController::class, 'sub2'])->name('sub2');

 });

Route::group(['middleware' => ['web', 'custom_three']], function() {
    Route::get('/mod3', [App\Http\Controllers\HomeController::class, 'mod3'])->name('mod3');
Route::post('/sub3', [App\Http\Controllers\HomeController::class, 'sub3'])->name('sub3');

 });
Route::group(['middleware' => ['web', 'custom_two']], function() { 
    Route::get('/mod4', [App\Http\Controllers\HomeController::class, 'mod4'])->name('mod4');
Route::post('/sub4', [App\Http\Controllers\HomeController::class, 'sub4'])->name('sub4');

});