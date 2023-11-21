<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
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
Route::resource('store/subscriptions',\App\Http\Controllers\SubscriptionController::class);
Route::get('/login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/postLogin',[App\Http\Controllers\AuthController::class,'postLogin'])->name('postLogin');
Route::get('/logout',[App\Http\Controllers\AuthController::class,'Logout'])->name('logout');
Route::post('/postRegister',[App\Http\Controllers\AuthController::class,'postRegister'])->name('register');

Route::middleware(['auth','preventhistory'])->group(function(){
    //Home & fullcalender
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::post('fullcalendar/create',[HomeController::class,'store']);
    Route::post('fullcalendar/update',[HomeController::class,'update']);
    Route::post('fullcalendar/delete',[HomeController::class,'destroy']);

    //Plan
    Route::get('/users/plans',[\App\Http\Controllers\UserController::class,'plan'])->name('users.plans');
    Route::get('/users/addPlans/{id}',[\App\Http\Controllers\UserController::class,'addPlan'])->name('users.addPlans');
    Route::post('/users/storePlans',[\App\Http\Controllers\UserController::class,'storePlans'])->name('users.storePlans');
    //
    Route::post('/grades/position', [\App\Http\Controllers\GradeController::class, 'position'])->name('grades.position');
    Route::post('/subjects/position', [\App\Http\Controllers\SubjectController::class, 'position'])->name('subjects.position');
    Route::resource('stores', \App\Http\Controllers\StoreController::class);
    Route::resource('contents/setting/grades', \App\Http\Controllers\GradeController::class);
    Route::resource('contents/setting/subjects', \App\Http\Controllers\SubjectController::class);
    Route::resource('contents/lessons', \App\Http\Controllers\LessonController::class);
    Route::resource('banners', \App\Http\Controllers\BannerController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('groups', \App\Http\Controllers\GroupController::class);
    //
    
    // Course 
    Route::post('/courses/position',[CourseController::class,'position'])->name('courses.position');
    Route::get('/courses/products',[CourseController::class,'products'])->name('courses.products');
    Route::post('/courses/editProduct',[CourseController::class,'editProduct'])->name('courses.editProduct');
    Route::resource('/courses',CourseController::class);
    
    // Lesson
    Route::post('/lessons/position',[LessonController::class,'position'])->name('lessons.position');
    Route::resource('/lessons',LessonController::class);

    //Class
    Route::get('/classes/students',[ClassController::class,'students'])->name('classes.students');
    Route::resource('/classes',ClassController::class);
    
    //Report
    Route::get('/reports/users',[ReportController::class,'users'])->name('report.users');
    Route::get('/reports/sales',[ReportController::class,'sales'])->name('report.sales');
    Route::get('/reports/contents',[ReportController::class,'contents'])->name('report.contents');

    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('groups', \App\Http\Controllers\GroupController::class);
    Route::get('/account', [\App\Http\Controllers\UserController::class, 'account'])->name('account.index');
   
    Route::resource('userbank', \App\Http\Controllers\UserBankController::class);

    // Setting
    Route::post('/setting', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
    Route::get('setting', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::get('setting/logo',[\App\Http\Controllers\SettingController::class,'logo'])->name('settings.logo');
    Route::get('setting/pages',[\App\Http\Controllers\SettingController::class,'pages'])->name('settings.pages');
    Route::get('setting/pages/term',[\App\Http\Controllers\SettingController::class,'pageTerm'])->name('settings.pages.term');
    Route::get('setting/pages/privacy-policy',[\App\Http\Controllers\SettingController::class,'pagePrivacyPolicy'])->name('settings.pages.privacy-policy');
    Route::get('setting/pages/refund-policy',[\App\Http\Controllers\SettingController::class,'pageRefundPolicy'])->name('settings.pages.refund-policy');
    Route::get('setting/pages/faq',[\App\Http\Controllers\SettingController::class,'pageFaq'])->name('settings.pages.faq');
    Route::get('setting/popup',[\App\Http\Controllers\SettingController::class,'popup'])->name('settings.popup');
    Route::get('setting/notice',[\App\Http\Controllers\SettingController::class,'notice'])->name('settings.notice');
    Route::get('setting/customer-inquiry',[\App\Http\Controllers\SettingController::class,'customerInquiry'])->name('settings.customer-inquiry');
    Route::get('themes/homepage-banner',[\App\Http\Controllers\ThemeController::class,'homepageBanner'])->name('themes.homepage-banner');
    Route::get('themes/homepage-sections',[\App\Http\Controllers\ThemeController::class,'homepageSections'])->name('themes.homepage-sections');
    Route::get('video-advertisement',[\App\Http\Controllers\VideoController::class,'videoAdvertisement'])->name('videos.video-advertisement');
});

// Frontend
Route::prefix('{site_name}')->middleware(['preventhistory'])->group(function(){
    Route::get('/',function($site_name){
        return view('frontend.welcome',compact('site_name'));
    })->name('home');
});