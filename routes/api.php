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
    return $request->user()->id;
});

Route::post('/register', 'Api\Users\AuthController@register');
Route::post('/login', 'Api\Users\AuthController@login');
Route::get('verify/{token}', 'Api\Students\AuthController@verifyEmail')->name('verify');



// Teacher  Panel
Route::group(['prefix' => 'teacher', 'middleware' => 'auth:api'], function () {

    Route::get('/', 'Api\Teachers\TeacherController@posts'); // all post / home page

    Route::get('/profile', 'Api\Teachers\TeacherControllerr@profile');
    Route::post('/profile/update', ' Api\Teachers\TeacherController@update');

    Route::post('/post/create', 'Api\PostController@create');
    Route::get('/post/my-post', 'Api\PostController@myPost');
    Route::get('/post/{id}', 'Api\PostController@show');
    Route::post('/post/{id}/update', 'Api\PostController@update');
    Route::get('/post/{id}/delete', 'Api\PostController@destroy');
});





