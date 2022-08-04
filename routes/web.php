<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\content\HeroController;
use App\Http\Controllers\Admin\content\PortfolioController;
use App\Http\Controllers\Admin\content\SkillController;
use Illuminate\Routing\Route as RoutingRoute;

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


Route::group(['namespace' => 'App\Http\Controllers\front'], function () {
    Route::get('/home', 'HomeController@fetchData');
});



//Admin route group

Route::prefix("/admin")->namespace("App\Http\Controllers\Admin")->group(function () {


    Route::match(['GET', 'POST'], "login", 'AdminController@login');

    Route::group(['middleware' => 'admin'], function () {
        Route::get("dashboard", 'AdminController@dashboard')->name('admin.dashboard');
        Route::get("logout",  'AdminController@logout')->name('admin.logout');

        //Admin profile
        Route::get('profile', 'AdminController@profile')->name('admin.profile');

        //edit profile
        Route::post('editProfile', 'AdminController@editProfile')->name('admin.editProfile');

        //change password
        Route::post('updatePassword', 'AdminController@updatePassword')->name('admin.updatePassword');


     
    
 
        //Contents
        Route::namespace("content")->group(function (){


             //Hero Section
            Route::match(['GET', 'POST'], 'hero', [HeroController::class, 'hero'])->name('hero');


             //Skills Section
        Route::prefix("/skills")->group(function () {
            Route::match(['get', 'post'], 'showSkills', 'SkillController@showSkills')->name('showSkills');
            Route::match(['get', 'post'], 'addSkills', 'SkillController@addSkills')->name('addSkills');
        });


             //PortFolio Section
        Route::prefix("/portfolio")->group(function () {
            Route::match(['get', 'post'], 'addCategory', 'PortfolioController@addCategory')->name('addPortfolioCategory');
            Route::match(['get', 'post'], 'insertEntry', 'PortfolioController@insertEntry')->name('insertPortfolioEntry');
        });

                //Services Section
            Route::match(['get', 'post'],  'services', 'ServiceController@insertService')->name('insertService');

            // Testimonial Section
            Route::match(['get' , 'post'] , 'testimonials' , 'TestimonialController@insertTestimonial')->name('insertTestmonial');


            // About Section
            Route::match(['get' , 'post'] , 'about' , 'AboutController@about')->name('about');


        });
    });
});
