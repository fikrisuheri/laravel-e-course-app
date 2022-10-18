<?php

use App\Http\Controllers\Backend\Feature\CourseController;
use App\Http\Controllers\Backend\Feature\MitraController;
use App\Http\Controllers\Backend\Master\CategoryController;
use App\Http\Controllers\Backend\Master\PenggunaController;
use App\Http\Controllers\Mitra\RegistermitraController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/backend/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('backend')->name('backend.')->middleware(['auth','role:admin'])->group(function(){

    Route::prefix('master')->name('master.')->group(function(){

        Route::prefix('category')->name('category.')->group(function(){

            Route::get('/',[CategoryController::class,'index'])->name('index');
            Route::get('/create',[CategoryController::class,'create'])->name('create');
            Route::post('/store',[CategoryController::class,'store'])->name('store');
            Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[CategoryController::class,'update'])->name('update');
            Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('delete');

        });

        Route::prefix('user')->name('user.')->group(function(){

            Route::get('/',[PenggunaController::class,'index'])->name('index');
            Route::get('/create',[PenggunaController::class,'create'])->name('create');
            Route::post('/store',[PenggunaController::class,'store'])->name('store');
            Route::get('/edit/{id}',[PenggunaController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[PenggunaController::class,'update'])->name('update');
            Route::get('/delete/{id}',[PenggunaController::class,'delete'])->name('delete');

        });

    });

    Route::prefix('feature')->name('feature.')->group(function(){
        
        Route::prefix('mitra')->name('mitra.')->group(function(){

            Route::get('/',[MitraController::class,'index'])->name('index');
            Route::post('/accept',[MitraController::class,'accept'])->name('accept');
        });

        Route::prefix('course')->name('course.')->group(function(){

            Route::get('/',[CourseController::class,'index'])->name('index');

        });

    });

});

Route::name('frontend.')->middleware(['auth','role:user'])->group(function(){

    Route::prefix('user')->name('user.')->group(function(){

        Route::get('/dashboard',[UserDashboard::class,'index'])->name('dashboard');

    });

    Route::prefix('mitra')->name('mitra.')->group(function(){

        Route::prefix('register')->name('register.')->group(function(){

            Route::get('/',[RegistermitraController::class,'register'])->name('index');
            Route::post('/store',[RegistermitraController::class,'store'])->name('store');

        });

    });

});

require __DIR__.'/auth.php';
