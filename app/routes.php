<?php
/**
 * routes.php
 * 
 * @author rose1988.c@gmail.com
 * @version 1.0
 * @date 2014-6-29 下午5:05:13
 */
Route::get('/', array('as'=>'index', 'uses' => 'HomeController@index'));

//------------------------------- 登录 -------------------------------
Route::any('/login',  array('as'=>'login','uses' => 'AccountController@login'));
Route::any('/signup', array('as'=>'signup','uses' => 'AccountController@signup'));
Route::get('/logout', 'AccountController@logout');
Route::any('/logwait',  'AccountController@logwait');

//------------------------------- 后台管理 -------------------------------
Route::group(array('prefix' => 'manage', 'before' => 'auth.manage'),function() {
    
    // 后台首页
    Route::get('/', 'Controllers\Manage\ManageController@index');

    // 用户管理
    Route::group(array('prefix' => 'user'),function() {
        Route::get('list/ajax', 'Controllers\Manage\UserController@userList_ajax');
    });
    Route::resource('user', 'Controllers\Manage\UserController');
    
    // 菜单管理
    Route::resource('menus', 'Controllers\Manage\MenusController');
    
    // 角色管理
    Route::resource('roles', 'Controllers\Manage\RolesController');
    
});

//------------------------------- 本地使用 -------------------------------
Route::group(array('before' => 'dev'), function()
{
    Route::get('/env', function(){return app::environment();});
});
