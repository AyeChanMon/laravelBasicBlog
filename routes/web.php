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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("form","formController@create")->name('form.create');
Route::post("form","formController@store")->name('form.store');
Route::get("form-delete/{id}","FormController@destroy")->name("form.destroy");
Route::get("form-edit/{id}","FormController@edit")->name('form.edit');
Route::post("form-update/{id}","FormController@update")->name('form.update');
Route::view("/denied","denied")->name("denied");
