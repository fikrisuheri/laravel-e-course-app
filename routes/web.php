<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Feature\CourseController;
use App\Http\Controllers\Backend\Feature\MitraController;
use App\Http\Controllers\Backend\Feature\TransactionController as FeatureTransactionController;
use App\Http\Controllers\Backend\Feature\WithdrawController;
use App\Http\Controllers\Backend\Master\CategoryController;
use App\Http\Controllers\Backend\Master\PenggunaController;
use App\Http\Controllers\Config\WebconfigController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\KursusController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Mitra\CoursemitraController;
use App\Http\Controllers\Mitra\RegistermitraController;
use App\Http\Controllers\Mitra\TransactionmitraController;
use App\Http\Controllers\Mitra\WalletController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\UsercourseController;
use Illuminate\Support\Facades\Route;

 



Route::get('/backend/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('backend')->name('backend.')->middleware(['auth','role:admin'])->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

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
            Route::get('/show/{id}',[MitraController::class,'show'])->name('show');
            Route::post('/accept',[MitraController::class,'accept'])->name('accept');
        });

        Route::prefix('course')->name('course.')->group(function(){

            Route::get('/',[CourseController::class,'index'])->name('index');
            Route::get('/show/{id}',[CourseController::class,'show'])->name('show');

        });

        Route::prefix('transaction')->name('transaction.')->group(function(){

            Route::get('/',[FeatureTransactionController::class,'index'])->name('index');
            Route::get('/show/{id}',[FeatureTransactionController::class,'show'])->name('show');

        });

        Route::prefix('withdraw')->name('withdraw.')->group(function(){

            Route::get('/',[WithdrawController::class,'index'])->name('index');
            Route::get('/sent/{id}',[WithdrawController::class,'sent'])->name('sent');

        });

    });

    Route::prefix('config')->name('config.')->group(function () {
        Route::get('/', [WebconfigController::class, 'index'])->name('index');
        Route::post('/', [WebConfigController::class, 'store'])->name('store');
        Route::post('/', [WebConfigController::class, 'update'])->name('update');
        Route::delete('/', [WebConfigController::class, 'destroy'])->name('destroy');            
});

});



Route::name('frontend.')->group(function(){

    Route::get('/',[WelcomeController::class,'index'])->name('index');

    Route::prefix('course')->name('course.')->group(function(){

        Route::get('/{mitraSlug}/{courseSlug}',[KursusController::class,'show'])->name('show');

    });

    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/{slug}',[FrontendCategoryController::class,'show'])->name('show');
    }); 

    Route::middleware(['auth','role:user|mitra'])->group(function(){

        Route::prefix('user')->name('user.')->group(function(){

            Route::get('/dashboard',[UserDashboard::class,'index'])->name('dashboard');
            
            Route::prefix('transaction')->name('transaction.')->group(function(){
                Route::get('/',[TransactionController::class,'index'])->name('index');
                Route::post('/store',[TransactionController::class,'store'])->name('store');
                Route::get('/invoice/{invoice}',[TransactionController::class,'invoice'])->name('invoice');
            });

            Route::prefix('course')->name('course.')->group(function(){
                Route::get('/',[UsercourseController::class,'index'])->name('index');
                Route::get('/learn/{id}/{progress}',[UsercourseController::class,'learn'])->name('learn');
            });

        });
    
        Route::middleware('role:mitra')->prefix('mitra')->name('mitra.')->group(function(){
    
            Route::prefix('register')->name('register.')->group(function(){
    
                Route::get('/',[RegistermitraController::class,'register'])->name('index');
                Route::post('/store',[RegistermitraController::class,'store'])->name('store');
    
            });
    
            Route::prefix('course')->name('course.')->group(function(){
    
                Route::get('/',[CoursemitraController::class,'index'])->name('index');
                Route::get('/create',[CoursemitraController::class,'create'])->name('create');
                Route::get('/show/{id}',[CoursemitraController::class,'show'])->name('show');
                Route::get('/edit/{id}',[CoursemitraController::class,'edit'])->name('edit');
                Route::post('/update/{id}',[CoursemitraController::class,'update'])->name('update');
                Route::post('/store',[CoursemitraController::class,'store'])->name('store');
    
            });

            Route::prefix('transaction')->name('transaction.')->group(function(){
    
                Route::get('/',[TransactionmitraController::class,'index'])->name('index');
    
            });

            Route::prefix('wallet')->name('wallet.')->group(function(){
    
                Route::get('/',[WalletController::class,'index'])->name('index');
                Route::post('/withdraw',[WalletController::class,'withdraw'])->name('withdraw');
    
            });
    
        });

    });

});

require __DIR__.'/auth.php';
