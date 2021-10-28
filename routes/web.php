<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
/*
*Backend 
*/
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;

/*
*FrontEnd 
*/
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
 

Route::prefix('/admin/brand')->group(function () {
    Route::get('/', [BrandController::class, 'BrandIndex'])->name('all.brand');
    Route::post('/add', [BrandController::class, 'addNewBrand'])->name('add.brand');
    Route::get('/edit/{id}', [BrandController::class, 'editBrand']);
    Route::post('/update', [BrandController::class, 'updateBrand'])->name('update.brand');
    Route::post('/remove/{id}', [BrandController::class, 'removeBrand']);



});




//* Admin Category All Routes*/
Route::prefix('/admin/category')->group(function () {
    Route::get('/', [CategoryController::class, 'CategoryIndex'])->name('all.category');
    Route::post('/add', [CategoryController::class, 'addNewCategory'])->name('add.category');
    Route::get('/edit/{id}', [CategoryController::class, 'editCategory']);
    Route::post('/update', [CategoryController::class, 'updateCategory'])->name('update.category');
    Route::post('/remove/{id}', [CategoryController::class, 'removeCategory']);

    //* Admin Sub - Category All Routes*/
    Route::get('/sub', [SubCategoryController::class, 'SubCategoryIndex'])->name('all.sub.category');
    Route::post('/sub/add', [SubCategoryController::class, 'addNewSubCategory'])->name('add.sub.category');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'editSubCategory']);
    Route::get('/sub/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::post('/sub/update', [SubCategoryController::class, 'updateSubCategory'])->name('update.sub.category');
    Route::post('/sub/remove/{id}', [SubCategoryController::class, 'removeSubCategory']);


});




//* Admin Products All Routes*/
 

Route::prefix('/admin/product')->group(function () {
     Route::get('/add', [ProductController::class, 'addProduct'])->name('add.product');
     Route::post('/save', [ProductController::class, 'saveProduct'])->name('save.product');
     Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage.product');


});