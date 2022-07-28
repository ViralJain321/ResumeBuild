<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin;
// use App\Http\Controllers\Admin\AdminController;

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




//Admin route group

Route::prefix("/admin")->namespace("App\Http\Controllers\Admin")->group(function(){
    

Route::match(['GET' , 'POST'] , "login" , 'AdminController@login');

Route::group(['middleware' => 'admin'] , function(){
    Route::get("dashboard" , 'AdminController@dashboard')->name('admin.dashboard');

    Route::get("logout" ,  'AdminController@logout')->name('admin.logout');
});


});

