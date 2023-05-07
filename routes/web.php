<?php
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RehabController;
use App\Http\Controllers\RehabReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OnChangeController;


Route::fallback(function () {
    abort(404);
});




Route::get('/', [HomeController::class,'index']);
Route::get('/main', [HomeController::class,'main']);

Auth::routes();
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::   routes();
});


Route::get('/home', [HomeController::class,'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//onchange 

Route::get('get-zip-code/{id}', [OnChangeController::class, 'getZipCode']);
Route::get('slider-image-delete/{id}', [OnChangeController::class, 'deleteSliderImage']);

//onchange

//search
Route::get('search', [HomeController::class,'search']);
Route::get('get-rehabs-data', [HomeController::class,'getsearchValue']);
//search

//rehab center
Route::get('rehab-center/{id}', [RehabController::class,'show']);
Route::post('rehab-review-store', [RehabReviewController::class,'store'])->name('rehab-review-store');
//rehab center

//blog center
Route::get('blog', [BlogController::class,'index']);
Route::get('blog/{id}', [BlogController::class,'show']);

//blog center






