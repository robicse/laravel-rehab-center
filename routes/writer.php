<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Writer\DashboardController;
use App\Http\Controllers\Writer\RehabController;


Route::group(['as'=>'writer.','prefix' =>'writer', 'middleware' => ['auth','writer']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

 //rehab listing
Route::resource('rehab-lists',RehabController::class);

});

