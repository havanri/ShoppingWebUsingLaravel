<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin', [AdminController::class,'loginAdmin']);

Route::get('/test', [AdminController::class,'test'])->name('test');

Route::post('/admin', [AdminController::class,'postloginAdmin']);
Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->middleware('can:list-category');
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/create', [CategoryController::class, 'create'])->middleware('can:add-category')->name('category.create');
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->middleware('can:edit-category')->name('category.edit');
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->middleware('can:remove-category')->name('category.destroy');
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->middleware('can:list-menu');
        Route::post('/', [MenuController::class, 'store']);
        Route::get('/create', [MenuController::class, 'create'])->middleware('can:add-menu')->name('menu.create');
        Route::get('/{id}', [MenuController::class, 'show']);
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->middleware('can:edit-menu')->name('menu.edit');
        Route::put('/{id}', [MenuController::class, 'update']);
        Route::delete('/{id}', [MenuController::class, 'destroy'])->middleware('can:remove-menu')->name('menu.destroy');
    });
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::post('/', [OrderController::class, 'store']);
        Route::get('/create', [OrderController::class, 'create'])->name('order.create');
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
        Route::put('/edit/{id}', [OrderController::class, 'update'])->name('order.edit');      
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    });
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->middleware('can:list-product');
        Route::post('/', [ProductController::class, 'store']);
        Route::get('/create', [ProductController::class, 'create'])->middleware('can:add-product')->name('product.create');
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->middleware('can:edit-product')->name('product.edit');
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->middleware('can:remove-product')->name('product.destroy');
    });
    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->middleware('can:list-slider')->name('slider.index');
        Route::post('/', [SliderController::class, 'store']);
        Route::get('/create', [SliderController::class, 'create'])->middleware('can:add-slider')->name('slider.create');
        Route::get('/{id}', [SliderController::class, 'show']);
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->middleware('can:edit-slider')->name('slider.edit');
        Route::put('/{id}', [SliderController::class, 'update']);
        Route::get('/delete/{id}', [SliderController::class, 'destroy'])->middleware('can:remove-slider')->name('slider.destroy');
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->middleware('can:list-setting');
        Route::post('/', [SettingController::class, 'store']);
        Route::get('/create', [SettingController::class, 'create'])->middleware('can:add-setting')->name('setting.create');
        Route::get('/{id}', [SettingController::class, 'show']);
        Route::get('/edit/{id}', [SettingController::class, 'edit'])->middleware('can:edit-setting')->name('setting.edit');
        Route::put('/{id}', [SettingController::class, 'update']);
        Route::get('/delete/{id}', [SettingController::class, 'destroy'])->middleware('can:remove-setting')->name('setting.destroy');
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->middleware('can:list-user');
        Route::post('/', [UserController::class, 'store']);
        Route::get('/create', [UserController::class, 'create'])->middleware('can:add-user')->name('user.create');
        Route::get('/{id}', [UserController::class, 'show']);
        Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware('can:edit-user')->name('user.edit');
        Route::put('/{id}', [UserController::class, 'update']);
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->middleware('can:remove-user')->name('user.destroy');
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->middleware('can:list-role');
        Route::post('/', [RoleController::class, 'store']);
        Route::get('/create', [RoleController::class, 'create'])->middleware('can:add-role')->name('role.create');
        Route::get('/{id}', [RoleController::class, 'show']);
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->middleware('can:edit-role')->name('role.edit');
        Route::put('/edit/{id}', [RoleController::class, 'update']);
        Route::get('/delete/{id}', [RoleController::class, 'destroy'])->middleware('can:remove-role')->name('role.destroy');
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index']);
        Route::post('/', [PermissionController::class, 'store']);
        Route::get('/create', [PermissionController::class, 'create'])->name('permission.create');
        Route::get('/{id}', [PermissionController::class, 'show']);
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::put('/edit/{id}', [PermissionController::class, 'update']);
        Route::get('/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });
    Route::post('/confirm-password', function (Request $request) {
        if (! Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }
     
        $request->session()->passwordConfirmed();
     
        return redirect()->intended();
    })->middleware(['auth', 'throttle:6,1']);
});
Route::post('logout',[AdminController::class,'logout'])->name('logout');

