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

Route::group(['prefix' => 'language'], function () {
    Route::get('/', 'ProgrammingLanguageController@index');
    Route::get('/{id}', 'ProgrammingLanguageController@findById');
    Route::post('/', 'ProgrammingLanguageController@create');
    Route::put('/{id}', 'ProgrammingLanguageController@update');
    Route::delete('/{id}', 'ProgrammingLanguageController@delete');
});

Route::group(['prefix' => 'framework'], function () {
    Route::get('/', 'FrameworkController@index');
    Route::get('/{id}', 'FrameworkController@findById');
    Route::post('/', 'FrameworkController@create');
    Route::put('/{id}', 'FrameworkController@update');
    Route::delete('/{id}', 'FrameworkController@delete');
});