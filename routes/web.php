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
//Lista de usuarios
Route::get('/', 'UserController@lista');

//Formulario
Route::get('/form', 'UserController@userform');

//Guardar usuarios
Route::post('/save', 'UserController@save')-> name('save');

//Eiminar usuarios
Route::delete('/delete/{id}', 'UserController@delete')->name('delete');

//Formulario para editar usuarios
Route::get('/editform/{id}','UserController@editform')->name('editform');

//Edición de usuarios
Route::patch('/edit/{id}','UserController@edit')->name('edit');
