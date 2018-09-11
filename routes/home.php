<?php

Route::group(['namespace'=>'Home','prefix'=>'home'],function(){

    // 前台首页
    Route::get('/',"IndexController@index");
    Route::get('/create','MyController@createforum');
    Route::post('/update','MyController@updatedata');
    Route::get('/register','ResigterController@create');
    Route::post('/register','ResigterController@store');

});