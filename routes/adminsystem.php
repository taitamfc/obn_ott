<?php
    //Adminsystem
    Route::prefix('adminsystem')->middleware(['auth.adminsystem'])->group(function () {
        Route::get('/',[\App\Http\Controllers\Adminsystem\SiteController::class,'index'])->name('adminsystem.sites.index');
        Route::post('site/update',[\App\Http\Controllers\Adminsystem\SiteController::class,'updateSitePlan'])->name('adminsystem.site.updateSitePlan');
        Route::get('/site/{id}',[\App\Http\Controllers\Adminsystem\SiteController::class,'show'])->name('adminsystem.sites.show');
        Route::get('users',[\App\Http\Controllers\Adminsystem\UserController::class,'index'])->name('adminsystem.users.index');
        Route::resource('plans',\App\Http\Controllers\Adminsystem\PlanController::class);
        Route::resource('admins',\App\Http\Controllers\Adminsystem\AdminsystemController::class);
    });


    // login admins
    Route::get('/adminsystemlogin', [App\Http\Controllers\AuthAdminController::class,'login'])->name('adminsystem.login');
    Route::post('/adminsystemlogin', [App\Http\Controllers\AuthAdminController::class,'postLogin'])->name('adminsystem.postLogin');
    Route::get('/adminsystemlogout', [App\Http\Controllers\AuthAdminController::class,'logout'])->name('adminsystem.logout');