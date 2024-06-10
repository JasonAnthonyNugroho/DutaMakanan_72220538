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

Route::group(['middleware' => ['guest']], function (){
    Route::get('/','PageController@login')->name('login');
    Route::post('/login',"AuthController@ceklogin");
});

Route::group(['middleware' => ['auth']], function (){
    Route::get('/user','PageController@formedituser');
    Route::get('/home','PageController@home');
    Route::get('/makanan','PageController@makanan');
    Route::get('/makanan/add-form','PageController@formaddmakanan');
    Route::post('/save','PageController@savemakanan');
    Route::get('/makanan/form-edit/{id}','PageController@formeditmakanan');
    Route::put("/update/{id}","PageController@updatemakanan");
    Route::get("/delete/{id}","PageController@deletemakanan");
    Route::post('/updateuser','PageController@updateuser');
    Route::get('/logout','AuthController@ceklogout');
});






// Route::get('/', function () {
//     return view('welcome');
// });
