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
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/get-my-pdfs', '\App\Http\Controllers\Api\PdfController@getMy')->name('get-my-pdfs');
    Route::post('/upload-pdf', '\App\Http\Controllers\Api\PdfController@upload')->name('upload-pdf');
    Route::post('/search-pdf', '\App\Http\Controllers\Api\PdfController@search')->name('search-pdf');
});
