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


Route::get('/test',function () {
   echo file_get_contents('http://mangachan.ru/mmmapps/newch.php?secretlinkType=multz&type=all');
});
