<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';



Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::middleware(['can:accessAdminpanel'])->group(function() { 
        Route::get('/admin/operations', function(){
            return view('users.admin')->name('adminOperations');
        });
            
            Route::get('admin/search', function(){
                return view('users.search');
            })->name('admin.search');
            
            Route::get('job/search', function(){
                return view('users.jobs.search');
            })->name('job.search');
            
            Route::get('admin/show', function(){
                return view('users.showUsers');              
            })->name('admin.showUsers');
            
            Route::get('admin/showAllUsers', 'App\Http\Controllers\Admin\UserController@showAllUsers')->name('admin.showAllUsers');
            
            Route::get('job/showAllJobs', 'App\Http\Controllers\Admin\JobController@showAllJobs')->name('job.showAllJobs');
                        
            Route::post('admin/search', 'App\Http\Controllers\Admin\UserController@search')->name('admin.handleSearch');
            
            Route::post('job/search', 'App\Http\Controllers\Admin\JobController@search')->name('job.handleSearch');
            
            Route::resource('admin', 'App\Http\Controllers\Admin\UserController');
            
            Route::resource('job', 'App\Http\Controllers\Admin\JobController');            
        });       
    
        Route::middleware(['can:accessProfile'])->group(function() {
            
            Route::resource('user', 'App\Http\Controllers\User\UserController');
            
            Route::get('user/showAllPosts', 'App\Http\Controllers\User\UserController@showAllPosts')->name('user.showAllPosts');
                        
        });
});

/*
Route::get('/admin-dashboard', function(){
    return view('users.admin');
});
*/