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

// home page
Route::get('/',[\App\Http\Controllers\HomePageController::class,'index']);
Route::get('/plan',[\App\Http\Controllers\PlanPageController::class,'index'])->name('planpage.index');
Route::get('/add-plan/{id}',[\App\Http\Controllers\PlanPageController::class,'addPlan'])->name('planpage.addPlan');
Route::post('/store-plan',[\App\Http\Controllers\PlanPageController::class,'storePlans'])->name('planpage.storePlan');
Route::get('handle-payment',[\App\Http\Controllers\PaymentController::class, 'handlePayment'])->name('make.payment');
Route::get('cancel-payment',[\App\Http\Controllers\PaymentController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('payment-success',[\App\Http\Controllers\PaymentController::class, 'paymentSuccess'])->name('success.payment');




//Adminsystem
    Route::prefix('adminsystem')->middleware('auth')->group(function () {
        Route::get('sites',[\App\Http\Controllers\Adminsystem\SiteController::class,'index'])->name('adminsystem.sites.index');
        Route::get('users',[\App\Http\Controllers\Adminsystem\UserController::class,'index'])->name('adminsystem.users.index');
        Route::resource('plans',\App\Http\Controllers\Adminsystem\PlanController::class);
        Route::resource('admins',\App\Http\Controllers\Adminsystem\AdminsystemController::class);
    });


// login admins
Route::get('/adminsystemlogin', [App\Http\Controllers\AuthAdminController::class,'login'])->name('adminsystem.login');
Route::post('/adminsystemlogin', [App\Http\Controllers\AuthAdminController::class,'postLogin'])->name('adminsystem.postLogin');


// login by social
Route::get('/google/callback',[App\Http\Controllers\AuthSocialiteController::class,'GoogleCallBack']);
Route::get('/facebook/callback',[App\Http\Controllers\AuthSocialiteController::class,'FacebookCallBack']);

// Frontend
Route::prefix('{site_name}')->middleware(['preventhistory','localization'])->group(function(){
    Route::get('/',[\App\Http\Controllers\Website\HomeController::class,'index'])->name('cms');
    Route::get('grade/{id}',[\App\Http\Controllers\Website\GradeController::class,'show'])->name('website.grades.show');
    Route::get('subject/{id}',[\App\Http\Controllers\Website\SubjectController::class,'show'])->name('website.subjects.show');
    Route::get('lessons/{id}',[\App\Http\Controllers\Website\LessonController::class,'show'])->name('website.lessons.show');
    Route::get('courses',[\App\Http\Controllers\Website\CourseController::class,'index'])->name('website.courses.index');
    Route::get('courses/{id}',[\App\Http\Controllers\Website\CourseController::class,'show'])->name('website.courses.show');
    Route::get('subscriptions/{id}',[\App\Http\Controllers\Website\SubscriptionController::class,'show'])->name('website.subscriptions.show');
    Route::get('pages/{id}',[\App\Http\Controllers\Website\PageController::class,'show'])->name('website.pages.show');
                                                                  
    Route::get('/grades',function($site_name){
        return view('website.grades.index',compact('site_name'));
    })->name('website.grades');

    Route::get('/subjects',function($site_name){
        return view('website.subjects.index',compact('site_name'));
    })->name('website.subjects');

    Route::middleware(['auth.student'])->group(function () {
        Route::get('accounts',[App\Http\Controllers\Website\StudentController::class,'index'])->name('website.accounts');
        Route::get('accounts/edit',[App\Http\Controllers\Website\StudentController::class,'edit'])->name('website.accounts.edit');
        Route::put('accounts/update',[App\Http\Controllers\Website\StudentController::class,'update'])->name('website.accounts.update');

        Route::get('lessons',[App\Http\Controllers\Website\StudentLessonController::class,'index'])->name('website.lessons');
        Route::get('currently-watching',[App\Http\Controllers\Website\StudentLessonController::class,'watching'])->name('website.currently-watching');
        Route::get('saved',[App\Http\Controllers\Website\StudentLessonController::class,'whitlist'])->name('website.saved');
        Route::post('complete-lesson',[App\Http\Controllers\Website\StudentLessonController::class,'completeLesson'])->name('website.complete-lesson');

        Route::get('saved-whitlist/{id}',[App\Http\Controllers\Website\StudentLessonController::class,'saved_whitlist'])->name('website.saved_whitlist');

        //Payment
        // Route::get('payment',[\App\Http\Controllers\Website\PaymentController::class, 'index'])->name('payment');
        Route::get('handle-payment/{order_id}/{price}',[\App\Http\Controllers\Website\PaymentController::class, 'handlePayment'])->name('website.make.payment');
        Route::get('cancel-payment',[\App\Http\Controllers\Website\PaymentController::class, 'paymentCancel'])->name('website.cancel.payment');
        Route::get('payment-success/{order_id}',[\App\Http\Controllers\Website\PaymentController::class, 'paymentSuccess'])->name('website.success.payment');

        Route::get('orders/history',[\App\Http\Controllers\Website\OrderController::class,'order_history'])->name('website.orders.history');
        Route::get('orders/fail/{order_id}',[\App\Http\Controllers\Website\OrderController::class,'fail'])->name('website.orders.fail');
        Route::get('orders/success/{order_id}',[\App\Http\Controllers\Website\OrderController::class,'success'])->name('website.orders.success');
        Route::get('orders/create/{item_id}/{type}',[\App\Http\Controllers\Website\OrderController::class,'create'])->name('website.orders.create');
        Route::post('orders/store',[\App\Http\Controllers\Website\OrderController::class,'store'])->name('website.orders.store');
        
        Route::get('q-a',[App\Http\Controllers\Website\QuestionAnswerController::class,'index'])->name('website.q-a');
        Route::get('q-a/create',[App\Http\Controllers\Website\QuestionAnswerController::class,'create'])->name('website.q-a.create');
        Route::post('q-a/store',[App\Http\Controllers\Website\QuestionAnswerController::class,'store'])->name('website.q-a.store');
        Route::get('q-a/{id}',[App\Http\Controllers\Website\QuestionAnswerController::class,'show'])->name('website.q-a.show');

        Route::get('notice',[App\Http\Controllers\Website\NoticeController::class,'index'])->name('website.notices');
        Route::get('notice/{id}',[App\Http\Controllers\Website\NoticeController::class,'show'])->name('website.notices.show');

        Route::get('progress',[App\Http\Controllers\Website\StudentLessonController::class,'progress'])->name('website.progress');
        
    });
    Route::get('search',[App\Http\Controllers\Website\SearchController::class,'index'])->name('website.search');

     // Login Google
     Route::get('/google',[App\Http\Controllers\AuthSocialiteController::class,'loginbyGG'])->name('login.google');

     // Login Facebook
     Route::get('/facebook',[App\Http\Controllers\AuthSocialiteController::class,'loginbyFB'])->name('login.facebook');

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