<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
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



/**Admin Route */
//'middleware'=>['admin:admin']
Route::group(['prefix'=> 'admin'], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin All Routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->middleware(['auth:sanctum,admin', 'verified'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->middleware(['auth:sanctum,admin', 'verified'])->name('admin.profile.store');

Route::post('/admin/profile/password', [AdminProfileController::class, 'AdminUpdatePassword'])->middleware(['auth:sanctum,admin', 'verified'])->name('admin.update.password');







// All User Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'logoutUser'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
Route::get('/user/profile/password', [IndexController::class, 'getUserPassword'])->name('user.profile.password');
Route::post('/user/profile/password/store', [IndexController::class, 'updateUserPassword'])->name('user.profile.password.update');






//* Admin Brands All Routes*/

Route::prefix('brand')->group(function(){
    Route::get('/all', [BrandController::class, 'AllBrand'])->name('user.profile');

});