<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\BlogController;
use App\Http\Controllers\Common\RoleController;
use App\Http\Controllers\Common\UserController;
use App\Http\Controllers\Common\SliderController;
use App\Http\Controllers\Common\SettingController;
use App\Http\Controllers\Common\CategoryController;
use App\Http\Controllers\Common\RehabController;
use App\Http\Controllers\Common\RehabReviewController;
use App\Http\Controllers\Common\CommandController;
use App\Http\Controllers\Common\SubscribeController;

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::post('user-status', [UserController::class, 'updateStatus'])->name('userStatus');

##user end
Route::resource('setting', SettingController::class);
## smtp settings
Route::get('smtp-settings', [SettingController::class, 'smtpIndex'])->name('smtpIndex');
Route::post('env_key_update', [SettingController::class, 'envKeyUpdate'])->name('envKeyUpdate');

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
 Route::delete('delete-rehab/{id}', [RehabController::class, 'destroy'])->name('rehabDestroy');
 ##rehab end

 
##rehab review start
Route::resource('rehab-review-lists',RehabReviewController::class);
Route::post('rehab-review-status', [RehabReviewController::class, 'updateStatus'])->name('rehabreviewsStatus');
Route::delete('delete-rehab-review/{id}', [RehabReviewController::class, 'destroy'])->name('rehabreviewDestroy');
##rehab review end
 
##artisan command  start
Route::get('artisan-command',[CommandController::class,'index'])->name('artisanCommand');
Route::get('artisan/{command}/{param}',[CommandController::class,'artisan']);

   //subscribe
   Route::resource('subscribes', SubscribeController::class);
   Route::post('subscribe-status', [SubscribeController::class, 'updateStatus'])->name('subscribeStatus');