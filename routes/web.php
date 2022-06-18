<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\FormDriverController;
use App\Http\Controllers\Admin\FormMerchantController;
use App\Http\Controllers\Admin\SlideBannerController;
use App\Http\Controllers\Admin\UserController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/join-us', function () {
    return view('join-us');
})->name('join-us');

Route::get('/register-updriver', function () {
    return view('register-updriver');
})->name('register-updriver');

Route::get('/updrive', function () {
    return view('updrive');
})->name('updrive');

Route::get('/register-upmerchant', function () {
    return view('register-upmerchant');
})->name('register-upmerchant');

Route::get('/upmerchant', function () {
    return view('upmerchant');
})->name('upmerchant');

Route::get('/contact-us', function () {
    return view('kontakkami');
})->name('contact-us');

require __DIR__ . '/auth.php';

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::middleware(['auth', 'is_admin:1'])->group(function () {
    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            Route::get('/form-driver', [FormDriverController::class, 'index'])->name('form-driver');
            Route::get('/getDriverJSON', [FormDriverController::class, 'getDriverJSON']);
            Route::get('/form-driver/show/{id}', [FormDriverController::class, 'show'])->name('show-driver');
            Route::post('/form-driver/verif', [FormDriverController::class, 'verif'])->name('verifDriver');
            Route::post('/form-driver/tambah-driver', [FormDriverController::class, 'store'])->name('tambahDriver');

            Route::get('/form-merchant', [FormMerchantController::class, 'index'])->name('form-merchant');
            Route::get('/getMerchantJSON', [FormMerchantController::class, 'getMerchantJSON']);
            Route::get('/form-merchant/show/{id}', [FormMerchantController::class, 'show'])->name('show-merchant');
            Route::post('/form-merchant/verif', [FormMerchantController::class, 'verif'])->name('verifMerchant');
            Route::post('/form-merchant/tambah-merchant', [FormMerchantController::class, 'store'])->name('tambahMerchant');

            Route::get('/kontak-kami', [ContactUsController::class, 'index'])->name('kontak-kami');
            Route::get('/user', [UserController::class, 'index'])->name('user');
        });
    });
});