<?php



// 后台路由
// 完成用户的登录路由
Route::get('admin/login',"Admin\LoginController@index");
// 登录的操作
Route::post('admin/check',"Admin\LoginController@check");
// 验证码的路由

Route::get("admin/yzm","Admin\LoginController@yzm");

// 退出的路由

Route::get('admin/logout',"Admin\LoginController@logout");

// 通过路由组 提取公共命名空间 公共的前缀
//Route::group(['middlware'=>'can:system'],function(){
//角色路由


//});
//Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'adminLogin'],function(){
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function(){
    // 后台首页
    Route::get('/','IndexController@index');
    // 后台用户管理模块
    Route::resource('user','UserController');


    Route::resource('friend','FriendController');
    //后台用户启用路由
    Route::post('user/ajaxUserStat','UserController@ajaxUserStat');






    // 后台分类管理模块
    Route::resource('types','TypesController');
    Route::post('types/forum','TypesController@forumStore');
    Route::resource('pic','PicController');
    Route::resource('sys','SysController');

    // 图片的批量删除

    Route::post('pic/delAll','PicController@delAll');
    // 图片的无刷新修改
    Route::post('pic/sort','PicController@sort');

    // 设置文件上传的方法

    Route::any('shangchuan','CommonController@upload');


    Route::resource("/role",'RoleController');
    Route::get("/roles/{user}/rolelist",'RoleController@rolelist');
    Route::post("/roles/{user}/rolelist",'RoleController@storeRolelist');

    Route::get("/roles/{user}/permission",'RoleController@permission');
    Route::post("/roles/{user}/permission",'RoleController@storePermission');

    Route::get("/user/{user}/role",'UserController@role');
    Route::post("/user/{user}/role",'UserController@storeRole');
    //权限路由
    Route::resource("/permissions",'PermissionsController');


});