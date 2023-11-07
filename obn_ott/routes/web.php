<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('homes.index');
});

Route::get('/class', function () {
    return view('class.index');
});

Route::get('contents/setting/grades', function () {
    return view('contents.setting.grade');
});
Route::get('contents/setting/subject', function () {
    return view('contents.setting.subject');
});
Route::get('contents/setting/couse', function () {
    return view('contents.setting.couse');
});
Route::get('/lessons', function () {
    return view('contents.lessonupload');
});

Route::get('/lessons/list', function () {
    return view('lessonlists.index');
});

Route::get('/stores/product', function () {
    return view('stores.productmanagement');
});
Route::get('/stores/subscription', function () {
    return view('stores.subscriptionmanagement');
});

Route::get('/videos', function () {
    return view('videoadvertisements.index');
});

Route::get('/themes/banner', function () {
    return view('themes.homepagebanner');
});
Route::get('/themes/sestion', function () {
    return view('themes.homepagesections');
});
Route::get('/themes/setting', function () {
    return view('themes.Settings');
});

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
