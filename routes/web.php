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

Auth::routes();
Route::group(['middleware'=>['App\Http\Middleware\Adminmiddle']],function(){
    Route::get('adminhome', [App\Http\Controllers\HomeController::class, 'index'])->name('adminhome');
    Route::get('admin/userslist', [App\Http\Controllers\HomeController::class, 'userview'])->name('admin.userslist');
    Route::get('admin/articlelist', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.articlelist');
    Route::get('admin/bannerlist', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.bannerlist');
    Route::get('admin/breakingnewslist', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.breakingnewslist');
    Route::get('admin/audiencequestionlist', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.audiencequestionlist');
    Route::get('admin/videostorieslist', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.videostorieslist');
      Route::get('admin/edituser/{id}', [App\Http\Controllers\HomeController::class, 'edituser'])->name('admin.edituser');
    Route::get('admin/deleteuser/{id}', [App\Http\Controllers\HomeController::class, 'deleteuser'])->name('admin.deleteuser');
    Route::get('admin/statususer/{id}', [App\Http\Controllers\HomeController::class, 'statususer'])->name('admin.statususer');
    Route::get('admin/rolechange/{id}', [App\Http\Controllers\HomeController::class, 'rolechange'])->name('admin.rolechange');

});
Route::group(['middleware'=>['App\Http\Middleware\Usermiddle']],function(){
    Route::get('userhome', [App\Http\Controllers\HomeController::class, 'index'])->name('userhome');
    Route::get('user/userslist', [App\Http\Controllers\HomeController::class, 'userview'])->name('user.userslist');
    Route::get('user/articlelist', [App\Http\Controllers\HomeController::class, 'index'])->name('user.articlelist');
    Route::get('user/bannerlist', [App\Http\Controllers\HomeController::class, 'index'])->name('user.bannerlist');
    Route::get('user/breakingnewslist', [App\Http\Controllers\HomeController::class, 'index'])->name('user.breakingnewslist');
    Route::get('user/audiencequestionlist', [App\Http\Controllers\HomeController::class, 'index'])->name('user.audiencequestionlist');
    Route::get('user/videostorieslist', [App\Http\Controllers\HomeController::class, 'index'])->name('user.videostorieslist');

     Route::get('user/edituser/{id}', [App\Http\Controllers\HomeController::class, 'edituser'])->name('user.edituser');
    Route::get('user/deleteuser/{id}', [App\Http\Controllers\HomeController::class, 'deleteuser'])->name('user.deleteuser');
    Route::get('user/statususer/{id}', [App\Http\Controllers\HomeController::class, 'statususer'])->name('user.statususer');
    Route::get('user/rolechange/{id}', [App\Http\Controllers\HomeController::class, 'rolechange'])->name('user.rolechange');



});
