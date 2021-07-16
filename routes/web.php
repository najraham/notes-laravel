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

Route::group(['middleware'=> ['auth']], function () {
    Route::get('/', 'CardsController@index')->name('card_index');

    Route::get('/card/{card}', 'CardsController@show')->name('show_card');
    Route::get('/cards/add', 'CardsController@add')->name('add_card');
    Route::post('/cards/store', 'CardsController@store')->name('store_card');
    Route::get('/cards/{card}/edit', 'CardsController@edit')->name('edit_card');
    Route::patch('cards/{card}', 'CardsController@update')->name('update_card');
    Route::post('/cards/{card}/delete', 'CardsController@delete')->name('delete_card');

    Route::post('/cards/{card}/notes', 'NotesController@store')->name('add_note');
    Route::get('/notes/{note}/edit', 'NotesController@edit')->name('edit_note');
    Route::patch('notes/{note}', 'NotesController@update')->name('update_note');
    Route::post('/notes/{note}/delete', 'NotesController@delete')->name('delete_note');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
