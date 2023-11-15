<?php

use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin'],function(){
    
    Route::group(['middleware' => 'admin.guest'],function(){
        
        Route::get('/login',[admincontroller::class,'admin'])->name('admin.login');
        Route::post('/authenticate',[admincontroller::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'],function(){
        
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');

        //category routes
        Route::get('/category/create',[categorycontroller::class,'create'])->name('category.create');
        Route::post('/category/create',[categorycontroller::class,'store'])->name('category.store');

    });
});
