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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => 'web'], function (){
    //登录和登出
    Route::any('guanli/login','Admin\IndexController@index');
    Route::any('guanli/tuichu','Admin\IndexController@out');
    //后台首页
    Route::any('user/list','Admin\UserController@userList')->middleware('login');
    Route::any('user/info','Admin\UserController@userInfo')->middleware('login');
    //权限设置
    Route::any('auth/list','Admin\AuthController@authList')->middleware('login');
    Route::any('auth/add','Admin\AuthController@authAdd')->middleware('login');
    Route::any('auth/edit','Admin\AuthController@authEdit')->middleware('login');
    Route::any('auth/del','Admin\AuthController@authDel')->middleware('login');

    //角色设置
    Route::any('role/list','Admin\RoleController@roleList')->middleware('login');
    Route::any('role/add','Admin\RoleController@roleAdd')->middleware('login');
    Route::any('role/edit','Admin\RoleController@roleEdit')->middleware('login');
    Route::any('role/del','Admin\RoleController@roleDel')->middleware('login');
    Route::any('role/assign','Admin\RoleController@roleAssign')->middleware('login');

    //管理员设置
    Route::any('manager/list','Admin\ManagerController@managerList')->middleware('login');
    Route::any('manager/add','Admin\ManagerController@managerAdd')->middleware('login');
    Route::any('manager/edit','Admin\ManagerController@managerEdit')->middleware('login');
    Route::any('manager/del','Admin\ManagerController@managerDel')->middleware('login');
    Route::any('manager/assign','Admin\ManagerController@managerAssign')->middleware('login');
});