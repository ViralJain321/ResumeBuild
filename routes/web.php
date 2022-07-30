<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\content\HeroController;

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


Route::group(['namespace' => 'App\Http\Controllers\front'], function(){
Route::get('/home' , 'HomeController@fetchHeroData');
});



//Admin route group

Route::prefix("/admin")->namespace("App\Http\Controllers\Admin")->group(function(){
    

Route::match(['GET' , 'POST'] , "login" , 'AdminController@login');

Route::group(['middleware' => 'admin'] , function(){
    Route::get("dashboard" , 'AdminController@dashboard')->name('admin.dashboard');
    Route::get("logout" ,  'AdminController@logout')->name('admin.logout');

    //Admin profile
    Route::get('profile' ,'AdminController@profile')->name('admin.profile');

    //edit profile
    Route::post('editProfile' ,'AdminController@editProfile')->name('admin.editProfile');

    //change password
    Route::post('updatePassword' , 'AdminController@updatePassword')->name('admin.updatePassword');


    //Contents
        //Hero Section
    Route::group(['prefix' => 'content' ], function(){
        Route::match(['GET' , 'POST' ] , 'hero' , [HeroController::class , 'hero'])->name('admin.content.hero');    
    });   


});


});

