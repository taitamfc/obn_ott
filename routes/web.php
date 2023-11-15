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

// Route::get('/', function () {
//     return view('homes.index');
// });
Route::get('/', function () {
    return view('includes.Login');
});

Route::get('/class', function () {
    return view('class.index');
});

Route::get('/lessons/list', function () {
    return view('lessonlists.index');
});

// Route::get('/stores/subscription', function () {
//     return view('stores.subscriptionmanagement');
// });

Route::get('/videos', function () {
    return view('videoadvertisements.index');
});

// Route::get('/themes/banner', function () {
//     return view('themes.homepagebanner');
// });
// Route::get('/themes/sestion', function () {
//     return view('themes.homepagesections');
// });
// Route::get('/themes/setting', function () {
//     return view('themes.Settings');
// });

Route::get('/reports/user', function () {
    return view('reports.user');
});
Route::get('/reports/sale', function () {
    return view('reports.sale');
});
Route::get('/reports/content', function () {
    return view('reports.content');
});

Route::get('/account/management', function () {
    return view('accountmanagements.accountmanagement');
});
Route::get('/account/admin', function () {
    return view('accountmanagements.admin');
});
Route::get('/account/billing', function () {
    return view('accountmanagements.billing');
});
Route::get('/account/plan', function () {
    return view('accountmanagements.plan');
});

Route::get('/setting/logo', function () {
    return view('setting.logo');
});
Route::get('/setting/popup', function () {
    return view('setting.popup');
});
Route::get('/setting/notice', function () {
    return view('setting.notice');
});
Route::get('/setting/cusstomer', function () {
    return view('setting.cusstomerinquiry');
});

Route::get('/setting/term', function () {
    return view('setting.pages.term');
});

Route::get('/setting/privacy-policy', function () {
    return view('setting.pages.privacypolicy');
});

Route::get('/setting/refund-policy', function () {
    return view('setting.pages.refundpolicy');
});

Route::get('/setting/FAQ', function () {
    return view('setting.pages.faq');
});



Route::get('/login', function () {
    return view('includes.login');
});
Route::get('/register', function () {
    return view('includes.register');
});
// Route::get('/billings', function () {
//     return view('accountmanagements.billings.index');
// })->name('billings');
// Route::get('/billings/create', function () {
//     return view('accountmanagements.billings.create');
// });

Route::resource('store/subscriptions',\App\Http\Controllers\SubscriptionController::class);
Route::get('/login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/postLogin',[App\Http\Controllers\AuthController::class,'postLogin'])->name('postLogin');
Route::get('/logout',[App\Http\Controllers\AuthController::class,'Logout'])->name('logout');
Route::post('/postRegister',[App\Http\Controllers\AuthController::class,'postRegister'])->name('register');

Route::middleware(['auth','preventhistory'])->group(function(){
    

    //Home & fullcalender
    Route::get('/',[HomeController::class,'index'])->name('dashboard');
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
    Route::get('/s', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::post('/setting', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
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
});