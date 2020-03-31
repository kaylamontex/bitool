<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/',                     'WebsiteController@home')->name('website-home');
Route::get('/dashboard',            'DashboardController@home')->name('dashboard-home');
Route::get('/dashboard/reports',    'DashboardController@reports')->name('dashboard-reports');

Route::get('login/okta',            'Auth\LoginController@redirectToProvider')->name('login-okta');
Route::get('login/okta/callback',   'Auth\LoginController@handleProviderCallback');
