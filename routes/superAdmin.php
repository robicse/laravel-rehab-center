<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\DatabackupController;

Route::group(['as'=>'superadmin.','prefix' =>'superadmin', 'middleware' => ['auth', 'superadmin']], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
  
    //databasebackup
    Route::resource('databases', DatabackupController::class);
  //common
  include __DIR__ . '/common.php';
});


