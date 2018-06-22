<?php

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

Route::get('/', function () {
    return view('main');
});

Route::post('/catalog','MainController@getCatalog');
Route::post('/manga','MainController@getManga');
Route::get('/new','MainController@getNew');
Route::get('/test2', function () {
    $curl = new \Curl\Curl();
    $start = microtime(true);
    $curl->get('http://mangachan.ru/mmmapps/manga.php?secretlinkType=multz&id=3175');
    $end = microtime(true); //конец измерения
    \Illuminate\Support\Facades\Log::info(($end - $start));
    return $curl->rawResponse;
});
