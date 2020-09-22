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
    return view('welcome');
});

/*Route::get('/klinick',[
    'as' => 'klinick.mainPage',
    'uses' => 'Controller@mainPage'
]);*/

Route::get('/login', [
    'as' => 'user.login_get',
    'uses' => 'Controller@userLogin'
]);

Route::post('/login',[
    'as' => 'user.login_post',
    //'uses' => 'DashboardController@login'
    'uses' => 'UsersController@login'
]);

/*Route::get('/user', [
    'as' => 'user.index',
    'uses' => 'UsersController@index',
]);*/

Route::get('/register',[
    'as' => 'user.register_get',
    'uses' => 'UsersController@register'
]);

Route::resource('user', 'UsersController');

/*Route::post('/userStore', [
    'as' => 'user.store',
    'uses' => 'UsersController@store'
]);*/

/*Route::get('/client/dashboard', [
    'as' => 'dashboard.index',
    'uses' => 'DashboardController@index',
]);*/


/*Route::get('/doctor/login', [
    'as' => 'doctor.login',
    'uses' => 'Controller@doctorLogin'
]);*/

/*Route::post('/doctor/login',[
    'as' => 'dashboard.login',
    'uses' => 'DashboardController@login'
]);*/

/*Route::get('/client/dashboard', [
    'as' => 'dashboard.index',
    'uses' => 'DashboardController@index',
]);*/
