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

// Login
Route::get('/login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/postLogin',[App\Http\Controllers\AuthController::class,'postLogin'])->name('postLogin');
Route::get('/logout',[App\Http\Controllers\AuthController::class,'Logout'])->name('logout');

// Forgot password
Route::get('/forgot',[App\Http\Controllers\AuthController::class,'forgot'])->name('forgot');
Route::post('/postForgot',[App\Http\Controllers\AuthController::class,'postForgot'])->name('postForgot');
Route::get('/resetPassword/{user}/{token}',[App\Http\Controllers\AuthController::class,'getReset'])->name('getReset');
Route::post('/resetPassword/{user}/{token}',[App\Http\Controllers\AuthController::class,'postReset'])->name('postReset');

// Register
Route::get('/register',[App\Http\Controllers\AuthController::class,'register'])->name('register');
Route::post('/postRegister',[App\Http\Controllers\AuthController::class,'postRegister'])->name('postRegister');

Route::prefix('admin')->middleware(['auth','preventhistory'])->group(function(){
    
    //Home & fullcalender
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::post('fullcalendar/create',[HomeController::class,'store']);
    Route::post('fullcalendar/update',[HomeController::class,'update']);
    Route::post('fullcalendar/delete',[HomeController::class,'destroy']);

    //Plan
    Route::get('/users/plans',[\App\Http\Controllers\UserController::class,'plan'])->name('users.plans');
    Route::get('/users/addPlans/{id}',[\App\Http\Controllers\UserController::class,'addPlan'])->name('users.addPlans');
    Route::post('/users/storePlans',[\App\Http\Controllers\UserController::class,'storePlans'])->name('users.storePlans');
    
    //Update Avatar Users
    Route::post('/users/avatar', [\App\Http\Controllers\UserController::class, 'avatar'])->name('users.avatar');
    
    // User
    Route::get('/account', [\App\Http\Controllers\UserController::class, 'account'])->name('account.index');
    Route::resource('userbank', \App\Http\Controllers\UserBankController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    

    //Grade
    Route::post('/grades/position', [\App\Http\Controllers\GradeController::class, 'position'])->name('grades.position');
    Route::resource('grades', \App\Http\Controllers\GradeController::class);
    
    //Subject
    Route::post('/subjects/position', [\App\Http\Controllers\SubjectController::class, 'position'])->name('subjects.position');
    Route::resource('subjects', \App\Http\Controllers\SubjectController::class);
    
    //Stores
    Route::resource('stores', \App\Http\Controllers\StoreController::class);
    Route::resource('subscriptions',\App\Http\Controllers\SubscriptionController::class);
    
    //Lessons
    Route::resource('lessons', \App\Http\Controllers\LessonController::class);
    
    //Banners
    Route::resource('banners', \App\Http\Controllers\BannerController::class);
    
    //Group
    Route::post('/groups/position', [\App\Http\Controllers\GroupController::class, 'position'])->name('groups.position');
    Route::resource('groups', \App\Http\Controllers\GroupController::class);
    
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

    //Banners
    Route::get('themes/homepage-banner',[\App\Http\Controllers\ThemeController::class,'homepageBanner'])->name('themes.homepage-banner');
    Route::get('themes/homepage-sections',[\App\Http\Controllers\ThemeController::class,'homepageSections'])->name('themes.homepage-sections');
    Route::get('video-advertisement',[\App\Http\Controllers\VideoController::class,'videoAdvertisement'])->name('videos.video-advertisement');
    
    
    // Setting
    Route::prefix('setting')->group(function(){
        Route::get('/', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
        
        //Banner
        Route::post('/', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

        //Logo
        Route::get('/logo',[\App\Http\Controllers\SettingController::class,'logo'])->name('settings.logo');
        Route::post('/updateLogo',[\App\Http\Controllers\SettingController::class,'updateLogo'])->name('settings.updateLogo');
        
        //Pages
        Route::resource('/pages',\App\Http\Controllers\PageController::class);

        //Popup
        Route::get('/popup',[\App\Http\Controllers\SettingController::class,'popup'])->name('settings.popup');
        Route::get('/show-popup',[\App\Http\Controllers\SettingController::class,'showPopup'])->name('settings.showPopup');
        Route::post('/update-popup',[\App\Http\Controllers\SettingController::class,'updatePopup'])->name('settings.updatePopup');
        
    });

});

// Frontend
Route::prefix('{site_name}')->middleware(['preventhistory'])->group(function(){
    Route::get('/',function($site_name){
        return view('website.homes.index',compact('site_name'));
    })->name('website.homes');

    Route::get('/courses',function($site_name){
        return view('website.courses.index',compact('site_name'));
    })->name('website.courses');

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
    Route::get('/resetPassword/{student}/{token}',[App\Http\Controllers\Website\AuthController::class,'getReset'])->name('website.getReset');
    Route::post('/resetPassword/{student}/{token}',[App\Http\Controllers\Website\AuthController::class,'postReset'])->name('website.postReset');
   
    // Route::get('chinh-sach-rieng-tu',function (){
    // return '<h1>Chính sách riêng tư</h1>';
    // }); 

    // Route::get('auth/facebook',function (){
    //     return Socialite::driver('facebook')->redirect();
    //     });

    // Route::get('auth/facebook/callback',function (){
    //     return 'Callback login facebook';
    //     }); 
});
