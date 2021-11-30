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

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', ['uses' => 'App\Http\Controllers\AuthController@loginWithGoogle', 'as' => 'login' ]);
    Route::any('callback', ['uses' => 'App\Http\Controllers\AuthController@callbackFromGoogle']);
});


Route::get('painel', ['uses' => 'App\Http\Controllers\PainelController@index', 'as' => 'index']);