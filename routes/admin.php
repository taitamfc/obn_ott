<?php
    Route::middleware(['localization'])->group(function(){
    // Login
    Route::get('/login',[\App\Http\Controllers\Admin\AuthController::class,'login'])->name('login');
    Route::post('/postLogin',[\App\Http\Controllers\Admin\AuthController::class,'postLogin'])->name('admin.postLogin');
    Route::get('/logout',[\App\Http\Controllers\Admin\AuthController::class,'logout'])->name('admin.logout');

    // Forgot password
    Route::get('/forgot',[\App\Http\Controllers\Admin\AuthController::class,'forgot'])->name('admin.forgot');
    Route::post('/postForgot',[\App\Http\Controllers\Admin\AuthController::class,'postForgot'])->name('admin.postForgot');
    Route::get('/resetPassword/{user}/{token}',[\App\Http\Controllers\Admin\AuthController::class,'getReset'])->name('admin.getReset');
    Route::post('/resetPassword/{user}/{token}',[\App\Http\Controllers\Admin\AuthController::class,'postReset'])->name('admin.postReset');

    // Register
    Route::get('/register',[\App\Http\Controllers\Admin\AuthController::class,'register'])->name('admin.register');
    Route::post('/postRegister',[\App\Http\Controllers\Admin\AuthController::class,'postRegister'])->name('admin.postRegister');

});

Route::prefix('admin')->name('admin.')->middleware(['auth','preventhistory','localization'])->group(function(){
    //Home & fullcalender
    Route::get('/',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');
    Route::post('fullcalendar/create',[\App\Http\Controllers\Admin\HomeController::class,'store']);
    Route::post('fullcalendar/update',[\App\Http\Controllers\Admin\HomeController::class,'update']);
    Route::post('fullcalendar/delete',[\App\Http\Controllers\Admin\HomeController::class,'destroy']);
    
    //Question
    Route::resource('/questionanswer',\App\Http\Controllers\Admin\QuestionController::class);
    
    //Payment
    Route::get('payment',[\App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payment');
    Route::get('handle-payment',[\App\Http\Controllers\Admin\PaymentController::class, 'handlePayment'])->name('make.payment');
    Route::get('cancel-payment',[\App\Http\Controllers\Admin\PaymentController::class, 'paymentCancel'])->name('cancel.payment');
    Route::get('payment-success',[\App\Http\Controllers\Admin\PaymentController::class, 'paymentSuccess'])->name('success.payment');
    
    //Duration
    Route::resource('/durations',\App\Http\Controllers\Admin\DurationController::class);

    //Plan
    Route::get('/users/plans',[\App\Http\Controllers\Admin\UserController::class,'plan'])->name('users.plans');
    Route::get('/users/addPlans/{id}',[\App\Http\Controllers\Admin\UserController::class,'addPlan'])->name('users.addPlans');
    Route::post('/users/storePlans',[\App\Http\Controllers\Admin\UserController::class,'storePlans'])->name('users.storePlans');
    
    //Update Avatar Users
    Route::post('/users/avatar', [\App\Http\Controllers\Admin\UserController::class, 'avatar'])->name('users.avatar');
    
    // User
    Route::get('/account', [\App\Http\Controllers\Admin\UserController::class, 'account'])->name('account.index');
    Route::resource('userbank', \App\Http\Controllers\Admin\UserBankController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    

    //Grade
    Route::post('/grades/position', [\App\Http\Controllers\Admin\GradeController::class, 'position'])->name('grades.position');
    Route::resource('grades', \App\Http\Controllers\Admin\GradeController::class);
    
    //Subject
    Route::post('/subjects/position', [\App\Http\Controllers\Admin\SubjectController::class, 'position'])->name('subjects.position');
    Route::resource('subjects', \App\Http\Controllers\Admin\SubjectController::class);
    
    //Stores
    Route::resource('stores', \App\Http\Controllers\Admin\StoreController::class);
    Route::resource('subscriptions',\App\Http\Controllers\Admin\SubscriptionController::class);
    
    //Lessons
    Route::post('lessons/storeVideo/{id?}', [\App\Http\Controllers\Admin\LessonController::class, 'storeVideo'])->name('lessons.storeVideo');
    Route::resource('lessons', \App\Http\Controllers\Admin\LessonController::class);
    
    //Banners
    Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class);
    
    //Group
    Route::post('/groups/position', [\App\Http\Controllers\Admin\GroupController::class, 'position'])->name('groups.position');
    Route::resource('groups', \App\Http\Controllers\Admin\GroupController::class);
    
    // Course 
    Route::post('/courses/position',[\App\Http\Controllers\Admin\CourseController::class,'position'])->name('courses.position');
    Route::get('/courses/products',[\App\Http\Controllers\Admin\CourseController::class,'products'])->name('courses.products');
    Route::post('/courses/editProduct',[\App\Http\Controllers\Admin\CourseController::class,'editProduct'])->name('courses.editProduct');
    Route::resource('/courses',\App\Http\Controllers\Admin\CourseController::class);
    
    // Lesson
    Route::post('/lessons/position',[\App\Http\Controllers\Admin\LessonController::class,'position'])->name('lessons.position');
    Route::resource('/lessons',\App\Http\Controllers\Admin\LessonController::class);

    //Class
    Route::get('/classes/students',[\App\Http\Controllers\Admin\ClassController::class,'students'])->name('classes.students');
    Route::resource('/classes',\App\Http\Controllers\Admin\ClassController::class);
    
    //Report
    Route::get('/reports/users',[\App\Http\Controllers\Admin\ReportController::class,'users'])->name('report.users');
    Route::get('/reports/sales',[\App\Http\Controllers\Admin\ReportController::class,'sales'])->name('report.sales');
    Route::get('/reports/contents',[\App\Http\Controllers\Admin\ReportController::class,'contents'])->name('report.contents');

    //Banners
    Route::get('themes/homepage-banner',[\App\Http\Controllers\Admin\ThemeController::class,'homepageBanner'])->name('themes.homepage-banner');
    Route::get('themes/homepage-sections',[\App\Http\Controllers\Admin\ThemeController::class,'homepageSections'])->name('themes.homepage-sections');
    Route::get('video-advertisement',[\App\Http\Controllers\Admin\VideoController::class,'videoAdvertisement'])->name('videos.video-advertisement');
    
    
    // Setting
    Route::prefix('settings')->group(function(){
        Route::get('/', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::get('/show', [\App\Http\Controllers\Admin\SettingController::class, 'show'])->name('settings.show');
        
        //Banner
        Route::post('/', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

        //Logo
        Route::get('/logo',[\App\Http\Controllers\Admin\SettingController::class,'logo'])->name('settings.logo');
        Route::post('/updateLogo',[\App\Http\Controllers\Admin\SettingController::class,'updateLogo'])->name('settings.updateLogo');
        
        //Pages
        Route::resource('/pages',\App\Http\Controllers\Admin\PageController::class);

        //Popup
        Route::get('/popup',[\App\Http\Controllers\Admin\SettingController::class,'popup'])->name('settings.popup');
        Route::get('/show-popup',[\App\Http\Controllers\Admin\SettingController::class,'showPopup'])->name('settings.showPopup');
        Route::post('/update-popup',[\App\Http\Controllers\Admin\SettingController::class,'updatePopup'])->name('settings.updatePopup');
        
    });

    Route::prefix('sites')->group(function(){
        Route::get('changeSite/{id}',[\App\Http\Controllers\Admin\SiteController::class,'changeSite'])->name('sites.changeSite');
    });
    Route::resource('sites', \App\Http\Controllers\Admin\SiteController::class);

    
});
Route::get('changeLanguage/{lang}',[\App\Http\Controllers\LanguageController::class,'changeLanguage'])->name('changeLanguage');