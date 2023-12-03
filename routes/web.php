<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
include 'admin.php';


// Frontend
Route::prefix('{site_name}')->middleware(['preventhistory','localization'])->group(function(){
    Route::get('/',[\App\Http\Controllers\Website\HomeController::class,'index'])->name('cms');

    Route::get('/courses',function($site_name){
        return view('website.courses.index',compact('site_name'));
    })->name('website.courses');

    Route::get('/grades',function($site_name){
        return view('website.grades.index',compact('site_name'));
    })->name('website.grades');

    Route::get('/subjects',function($site_name){
        return view('website.subjects.index',compact('site_name'));
    })->name('website.subjects');

    Route::get('/accounts',function($site_name){
        return view('website.dashboards.accounts.index',compact('site_name'));
    })->name('website.accounts');

    Route::get('/accounts/edit', function ($site_name) {
        return view('website.dashboards.accounts.edit', compact('site_name'));
    })->name('website.accounts.edit');
    
  
    Route::get('/lessons',function($site_name){
        return view('website.dashboards.lessons.index',compact('site_name'));
    })->name('website.lessons');

    Route::get('/currently-watching',function($site_name){
        return view('website.dashboards.currently-watching.index',compact('site_name'));
    })->name('website.currently-watching');

    Route::get('/saved',function($site_name){
        return view('website.dashboards.saved.index',compact('site_name'));
    })->name('website.saved');

    Route::get('/notices',function($site_name){
        return view('website.dashboards.notices.index',compact('site_name'));
    })->name('website.notices');

    Route::get('/progress',function($site_name){
        return view('website.dashboards.progress.index',compact('site_name'));
    })->name('website.progress');

    Route::get('/q&a',function($site_name){
        return view('website.dashboards.q&a.index',compact('site_name'));
    })->name('website.q&a');
    // Login
    Route::get('login',[App\Http\Controllers\Website\AuthController::class,'login'])->name('website.login');
    Route::post('postLogin',[App\Http\Controllers\Website\AuthController::class,'postLogin'])->name('website.postLogin');
    Route::get('logout',[App\Http\Controllers\Website\AuthController::class,'Logout'])->name('website.logout');

    // Register
    Route::get('register',[App\Http\Controllers\Website\AuthController::class,'register'])->name('website.register');
    Route::post('postRegister',[App\Http\Controllers\Website\AuthController::class,'postRegister'])->name('website.postRegister');

    // Forgot password
    Route::get('/forgot',[App\Http\Controllers\Website\AuthController::class,'forgot'])->name('website.forgot');
    Route::post('/postForgot',[App\Http\Controllers\Website\AuthController::class,'postForgot'])->name('website.postForgot');
    Route::get('/resetPassword/{user}/{token}',[App\Http\Controllers\Website\AuthController::class,'getReset'])->name('website.getReset');
    Route::post('/resetPassword/{user}/{token}',[App\Http\Controllers\Website\AuthController::class,'postReset'])->name('website.postReset');
});
