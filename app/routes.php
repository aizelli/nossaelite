<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Rotas publicas
Route::get('/', 'HomeController@index');
Route::get('/event-detail', 'HomeController@eventoDetalhes');

//Rotas autenticadas
Route::get('/painel', 'AdminController@painel');
Route::get('/painel/cadastro/eventos', 'AdminController@createEventos');
Route::post('/painel/cadastro/eventos', 'AdminController@storeEventos');
Route::get('/painel/cadastro/noticias', 'AdminController@createNoticias');
Route::post('/painel/cadastro/noticias', 'AdminController@storeNoticias');
Route::get('/painel/relatorio/eventos', 'AdminController@showEventos');
Route::get('/painel/criar/album/{id_evento}', 'AdminController@createAlbum');
Route::post('/painel/criar/album/{id_evento}', 'AdminController@storeAlbum');