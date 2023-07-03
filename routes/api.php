<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
    Route::group(['namespace'=>'App\Http\Controllers\API\Admin','prefix'=>'/admin','middleware'=>['auth:api','role:Admin']],function (){
         Route::group(['prefix'=>'/heading'],function (){
            Route::get('/','HeadingController@index');
            Route::get('/{id}','HeadingController@show');
            Route::post('/','HeadingController@store');
            Route::put('/{id}','HeadingController@update');
            Route::delete('/{id}','HeadingController@destroy');
         });
        Route::group(['prefix'=>'/author'],function (){
            Route::get('/','AuthorController@index');
            Route::post('/','AuthorController@store');
            Route::put('/{id}','AuthorController@update');
            Route::delete('/{id}','AuthorController@destroy');
        });
        Route::group(['prefix'=>'/news'],function (){
            Route::get('/','NewsController@index');
            Route::get('/{id}','NewsController@show');
            Route::put('/{news}/approve','NewsController@approve');
            Route::delete('/{id}','NewsController@destroy');
        });
    });

        Route::group(['namespace'=>'App\Http\Controllers\API','prefix'=>'/news','middleware'=>'auth:api'],function (){
                    Route::get('/','NewsController@index');
                    Route::get('/{id}','NewsController@show');
                    Route::post('/','NewsController@store');
                    Route::put('/{id}','NewsController@update');
                    Route::delete('/{id}','NewsController@destroy');
                    Route::get('/heading/{id}','NewsController@getByHeading');
                    Route::get('/author/{id}','NewsController@getByAuthor');
                });



