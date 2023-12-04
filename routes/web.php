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
    Route::get('grade/{id}',[\App\Http\Controllers\Website\GradeController::class,'show'])->name('website.grades.show');
    Route::get('subject/{id}',[\App\Http\Controllers\Website\SubjectController::class,'show'])->name('website.subjects.show');
    Route::get('lessons/{id}',[\App\Http\Controllers\Website\LessonController::class,'show'])->name('website.lessons.show');
    Route::get('courses',[\App\Http\Controllers\Website\CourseController::class,'index'])->name('website.courses.index');
    Route::get('courses/{id}',[\App\Http\Controllers\Website\CourseController::class,'show'])->name('website.courses.show');
    Route::get('orders/create/{course_id}',[\App\Http\Controllers\Website\OrderController::class,'create'])->name('website.orders.create');

    // Route::get('/courses',function($site_name){
    //     return view('website.courses.index',compact('site_name'));
    // })->name('website.courses');

    Route::get('/grades',function($site_name){
        return view('website.grades.index',compact('site_name'));
    })->name('website.grades');

    Route::get('/subjects',function($site_name){
        return view('website.subjects.index',compact('site_name'));
    })->name('website.subjects');

    // Route::get('/accounts',function($site_name){
    //     return view('website.dashboards.accounts.index',compact('site_name'));
    // })->name('website.accounts');
    
    // Route::get('/accounts/edit', function ($site_name) {
    //     return view('website.dashboards.accounts.edit', compact('site_name'));
    // })->name('website.accounts.edit');

    Route::get('accounts',[App\Http\Controllers\Website\StudentController::class,'index'])->name('website.accounts');
    Route::get('accounts/edit',[App\Http\Controllers\Website\StudentController::class,'edit'])->name('website.accounts.edit');
    Route::put('accounts/update',[App\Http\Controllers\Website\StudentController::class,'update'])->name('website.accounts.update');

    
    Route::get('lessons',[App\Http\Controllers\Website\StudentLessonController::class,'index'])->name('website.lessons');
    Route::get('currently-watching',[App\Http\Controllers\Website\StudentLessonController::class,'watching'])->name('website.currently-watching');
    Route::get('saved',[App\Http\Controllers\Website\StudentLessonController::class,'whitlist'])->name('website.saved');

    // Route::get('/lessons',function($site_name){
    //     return view('website.dashboards.lessons.index',compact('site_name'));
    // })->name('website.lessons');

    // Route::get('/currently-watching',function($site_name){
    //     return view('website.dashboards.currently-watching.index',compact('site_name'));
    // })->name('website.currently-watching');

    // Route::get('/saved',function($site_name){
    //     return view('website.dashboards.saved.index',compact('site_name'));
    // })->name('website.saved');

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
    Route::get('/resetPassword/{student}/{token}',[App\Http\Controllers\Website\AuthController::class,'getReset'])->name('website.getReset');
    Route::post('/resetPassword/{student}/{token}',[App\Http\Controllers\Website\AuthController::class,'postReset'])->name('website.postReset');
});
