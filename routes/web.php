<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });



//admin-panel
Route::prefix('admin')->group(function () {
    Route::get('',[AdminDashboardController::class,'index'])->name('admin.home');

        Route::controller(CategoryController::class)->prefix('category')->group(function(){
            Route::get('/','index')->name('admin.category.index');
            Route::get('/create','create')->name('admin.category.create');
            Route::post('/','store')->name('admin.category.store');
            Route::get('edit/{category}','edit')->name('admin.category.edit');
            Route::put('/{category}','update')->name('admin.category.update');
            Route::get('/status/{category}', 'status')->name('admin.category.status');
            Route::delete('/destroy/{category}', 'destroy')->name('admin.category.destroy');
        });
        
        Route::controller(ReservationController::class)->prefix('reservation')->group(function(){
            Route::get('/', 'index')->name('admin.reservation.index');
            Route::get('/show/{reservation}','show')->name('admin.reservation.show');
        });


});
