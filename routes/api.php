<?php

use Illuminate\Http\Request;

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

Route::get('/users','UserController@index');
Route::get('/users/{id}','UserController@show');
Route::get('/posts','PostController@index');
Route::get('/posts/get/{userId}','PostController@get');
Route::get('/post/{id}','PostController@show');
Route::get('/comments','CommentController@index');
Route::get('/comments/get/{postId}','CommentController@get');
Route::get('comment/{id}','CommentController@show');
