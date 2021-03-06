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

Route::group(['prefix' => '/'], function () {
    Voyager::routes();

    Route::group(['as' => 'voyager.'], function () {
        Route::get('login', ['uses' => 'App\Http\Controllers\AuthController@login', 'as' => 'login']);
    });
});

Route::group(['middleware' => 'admin.user'], function () {
    Route::get('painel', ['uses' => 'App\Http\Controllers\PainelController@index', 'as' => 'index']);

    Route::get('atividade/descricao/recuperar', ['uses' => 'App\Http\Controllers\AtividadeController@atividade_recuperar_descricao', 'as' => 'atividade_recuperar_descricao']);
    Route::post('atividade/descricao/salvar', ['uses' => 'App\Http\Controllers\AtividadeController@atividade_salvar_descricao', 'as' => 'atividade_salvar_descricao']);
    Route::resource('atividade/{atividade_id}/avaliacao', 'App\Http\Controllers\AvaliacaoAtividadeController', ['parameters' => ['avaliacao' => 'id' , 'atividade_id' => 'av_id']]);
    Route::resource('roteiro/{roteiro_id}/roteiro-atividade', 'App\Http\Controllers\RoteiroAtividadeController', ['parameters' => ['roteiro-atividade' => 'id' , 'roteiro_id' => 'roteiro_id']]);
});

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', ['uses' => 'App\Http\Controllers\AuthController@loginWithGoogle', 'as' => 'login' ]);
    Route::any('callback', ['uses' => 'App\Http\Controllers\AuthController@callbackFromGoogle']);
});