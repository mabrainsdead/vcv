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


Route::view('/', 'upload')->name('upload');

Route::post('/answer', 'UpLoadFile@answer')->name('answer');

Route::view('/download', 'download')->name('download');

Route::get('/debug', 'HealthController@hello')->name('debug');

Route::get( '/answer', function () {return "Submeta um arquivo válido!!"; });
