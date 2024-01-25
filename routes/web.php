<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminMiddleware;
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
    return view('guest.landing');
})->name('landing');

Route::get('/register', function() {
    return view('guest.register');
});

Route::get('/login', function() {
    return view('guest.login');
})->name('login');

Route::post('/register-account', [AccountController::class, 'registerAccount'])->name('registerAccount');

Route::post('/login-account', [AccountController::class, 'loginAccount'])->name('loginAccount');

Route::get('/log-out', [AccountController::class, 'logOut'])->name('logout');

Route::get('/home', [ItemController::class, 'getAllProducts'])->name('homePage')->middleware('auth');

Route::get('/veggie-{item:id}', [ItemController::class, 'getProductDetail'])->name('itemDetail')->middleware('auth');

Route::post('/add-to-cart-{item:id}', [OrderController::class, 'addToCart'])->name('addToCart')->middleware('auth');

Route::get('/cart', [OrderController::class, 'displayCart'])->name('displayCart')->middleware('auth');

Route::delete('/check-out', [OrderController::class, 'checkOut'])->name('checkOut')->middleware('auth');

Route::delete('/delete-cart-item-{item:id}', [OrderController::class, 'deleteCartItem'])->name('deleteCartItem');

Route::get('/account_profile', [AccountController::class, 'getProfileData'])->name('getProfileData');

Route::put('/update-profile-{user:id}', [AccountController::class, 'updateProfile'])->name('updateProfile');

// Admin
Route::get('/account_maintanance', [AccountController::class, 'manageAccounts'])->name('manageAccounts')->middleware(['auth', AdminMiddleware::class]);

Route::get('/change_role-{user:id}', [AccountController::class, 'changeRolePage'])->name('changeRolePage')->middleware(['auth', AdminMiddleware::class]);

Route::put('/update-role-{user:id}', [AccountController::class, 'updateRole'])->name('updateRole')->middleware(['auth', AdminMiddleware::class]);

Route::delete('/delete-user-{user:id}', [AccountController::class, 'deleteUser'])->name('deleteUser')->middleware(['auth', AdminMiddleware::class]);