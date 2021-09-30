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
    
Route::get('/loggingService', 'App\Http\Controllers\LoggingController@index');
    
})->name('/');
    Route::get('/test', function () {
        return view('components.card');
    });
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';

/*
 * API routes
 */
Route::get('api/job', 'App\Http\Controllers\RestController@getAllJobs');
Route::get('api/job/{id}', 'App\Http\Controllers\RestController@getJob');
Route::get('api/user','App\Http\Controllers\RestController@getAllUsers');
Route::get('api/user/{id}','App\Http\Controllers\RestController@getUser');
Route::get('api/group', 'App\Http\Controllers\RestController@getAllGroups');
Route::get('api/group/{id}', 'App\Http\Controllers\RestController@getGroup');

Route::middleware(['auth'])->group(function () {
    Route::get('job/showAllJobs', 'App\Http\Controllers\Admin\JobController@showAllJobs')->name('job.showAllJobs');
    
    Route::resource('job', 'App\Http\Controllers\Admin\JobController');  
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('group/{group}/join', 'App\Http\Controllers\Groups\joinGroupController@join')->name('group.join');
    Route::resource('group', 'App\Http\Controllers\Groups\GroupController');
    
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
            
            Route::get('group/showAllGroups', 'App\Http\Controllers\Groups\GroupController@showAllGroups')->name('group.showAllGroups');
                        
            Route::post('admin/search', 'App\Http\Controllers\Admin\UserController@search')->name('admin.handleSearch');
            
            Route::post('job/search', 'App\Http\Controllers\Admin\JobController@search')->name('job.handleSearch');
            
            Route::post('group/search', 'App\Http\Controllers\Groups\GroupController@search')->name('group.handleSearch');  // what name
            
            Route::get('group/search', function () {
                return view('groups.search');
            })->name('groups.search');           

            Route::resource('admin', 'App\Http\Controllers\Admin\UserController');                       
        });       
    
        Route::middleware(['can:accessProfile'])->group(function() {
            
            Route::resource('user', 'App\Http\Controllers\User\UserController');
            
            Route::get('user/showAllPosts', 'App\Http\Controllers\User\UserController@showAllPosts')->name('user.showAllPosts');
            
            
            
            
                        
        });
});

