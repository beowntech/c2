<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

//Route::group(['prefix' => 'options'], function () {
//    Route::post('blog_video','OptionController@update');
//    Route::post('blog_video/get','OptionController@index');
//});
Route::post('submit',[App\Http\Controllers\MultipleFormController::class,'create'])->name('multiple-form');
