<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::middleware(['auth'])->group(function () {
    
    Route::middleware(['can:accessAdminpanel'])->group(function() { 
        Route::get('/admin/operations', function(){
            return view('users.admin')->name('adminOperations');
        });
            
            Route::get('admin/search', function(){
                return view('users.search');
            })->name('admin.search');
            
            Route::get('admin/show', function(){
                return view('users.showUsers');
                
            })->name('admin.showUsers');
            
            Route::get('admin/showAllUsers', 'App\Http\Controllers\Admin\UserController@showAllUsers')->name('admin.showAllUsers');
            
            
            Route::post('admin/search', 'App\Http\Controllers\Admin\UserController@search')->name('admin.handleSearch');
            
            Route::resource('admin', 'App\Http\Controllers\Admin\UserController');
    });       
});

/*
Route::get('/admin-dashboard', function(){
    return view('users.admin');
});
*/