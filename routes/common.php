<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\BlogController;
use App\Http\Controllers\Common\RoleController;
use App\Http\Controllers\Common\UserController;
use App\Http\Controllers\Common\SliderController;
use App\Http\Controllers\Common\SettingController;
use App\Http\Controllers\Common\CategoryController;
use App\Http\Controllers\Common\RehabController;


Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::post('user-status', [UserController::class, 'updateStatus'])->name('userStatus');

##user end
Route::resource('setting', SettingController::class);

##caregory 
Route::resource('categories', CategoryController::class);
Route::post('category-status', [CategoryController::class, 'updateStatus'])->name('categoryStatus');


##blog end
Route::resource('blogs', BlogController::class);
Route::post('blog-status', [BlogController::class, 'updateStatus'])->name('blogStatus');

##slider start
Route::resource('sliders', SliderController::class);
Route::post('slider-status', [SliderController::class, 'updateStatus'])->name('sliderStatus');
##slider end

##rehab start
 Route::resource('rehab-lists',RehabController::class);
 Route::post('rehab-status', [RehabController::class, 'updateStatus'])->name('rehabStatus');
 ##rehab start