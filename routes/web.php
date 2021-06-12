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


Route::get('/','PrincipalController@principal')->name('site.index');

Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('teste');

Route::fallback(function(){
	echo 'O caminho acessado não exite. <a href="'.route('site.index').'">clique aqui</a>';
});





