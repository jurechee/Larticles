<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//list all articles
Route::get('articles', 'ArticleController@index');

//lit a single article
Route::get('article/{id}', 'ArticleController@show');

//create a new article
Route::post('article', 'ArticleController@store');

//update artticle
Route::put('article', 'ArticleController@store');
// Route::put('article/{id}', 'ArticleController@update');

//delete article 
Route::delete('article/{id}', 'ArticleController@destroy');

//https://www.youtube.com/watch?v=4pc6cgisbKE
//https://www.youtube.com/watch?v=DJ6PD_jBtU0&t=2425s