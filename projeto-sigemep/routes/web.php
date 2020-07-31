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

Route::get('/klinick',[
    'as' => 'klinick.mainPage',
    'uses' => 'Controller@mainPage'
]);

Route::get('/client/login', [
    'as' => 'user.login',
    'uses' => 'Controller@userLogin'
]);

Route::post('/client/login',[
    'as' => 'dashboard.login',
    'uses' => 'DashboardController@login'
]);

Route::get('/client/dashboard', [
    'as' => 'dashboard.index',
    'uses' => 'DashboardController@index',
]);


Route::get('/doctor/login', [
    'as' => 'doctor.login',
    'uses' => 'Controller@doctorLogin'
]);

/*Route::post('/doctor/login',[
    'as' => 'dashboard.login',
    'uses' => 'DashboardController@login'
]);

Route::get('/client/dashboard', [
    'as' => 'dashboard.index',
    'uses' => 'DashboardController@index',
]);*/
