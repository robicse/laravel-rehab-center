<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Writer\DashboardController;
use App\Http\Controllers\Writer\RehubCenterController;

Route::group(['as'=>'writer.','prefix' =>'writer', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   //rehub listing

Route::resource('rehub-lists',RehubCenterController::class);

});

