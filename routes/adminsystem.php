<?php
    //Adminsystem
    Route::prefix('adminsystem')->middleware(['auth.adminsystem'])->group(function () {
        Route::get('site',[\App\Http\Controllers\Adminsystem\SiteController::class,'index'])->name('adminsystem.sites.index');
        Route::post('site/update',[\App\Http\Controllers\Adminsystem\SiteController::class,'updateSitePlan'])->name('adminsystem.site.updateSitePlan');
        Route::get('/site/{id}',[\App\Http\Controllers\Adminsystem\SiteController::class,'show'])->name('adminsystem.sites.show');
        Route::get('/',[\App\Http\Controllers\Adminsystem\UserController::class,'index'])->name('adminsystem.users.index');
        Route::get('users',[\App\Http\Controllers\Adminsystem\UserController::class,'index'])->name('adminsystem.users.index');
        Route::delete('users/destroy/{id}',[\App\Http\Controllers\Adminsystem\UserController::class,'destroy'])->name('adminsystem.users.destroy');
        Route::get('users/getPlanSite',[\App\Http\Controllers\Adminsystem\UserController::class,'getPlanSite'])->name('adminsystem.users.getPlanSite');
        Route::get('users/changeStatus',[\App\Http\Controllers\Adminsystem\UserController::class,'changeStatus'])->name('adminsystem.users.changeStatus');
        Route::resource('plans',\App\Http\Controllers\Adminsystem\PlanController::class);
        Route::resource('admins',\App\Http\Controllers\Adminsystem\AdminsystemController::class);
        Route::resource('notices',\App\Http\Controllers\Adminsystem\NoticeController::class);
        Route::get('reports',[\App\Http\Controllers\Adminsystem\ReportController::class,'index'])->name('adminsystem.report');
    });


    // login admins
    Route::get('/adminsystemlogin', [App\Http\Controllers\AuthAdminController::class,'login'])->name('adminsystem.login');
    Route::post('/adminsystemlogin', [App\Http\Controllers\AuthAdminController::class,'postLogin'])->name('adminsystem.postLogin');
    Route::get('/adminsystemlogout', [App\Http\Controllers\AuthAdminController::class,'logout'])->name('adminsystem.logout');