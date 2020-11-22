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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register','Api\Users\AuthController@register');
Route::post('/login','Api\Users\AuthController@login');

Route::get('verify/{token}', 'Api\Students\UserController@verifyEmail')->name('verify');
//user login


//CR
Route::get('/cr','Api\CRs\CrController@all');