<?php
Route::group(['namespace'=>'Home'],function(){

    // 前台首页
    Route::get('/',"IndexController@index");


});
include_once("admin.php");
include_once("home.php");