<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Backend\BackenHomeController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\FrontendHomeController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

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

Route::get('/', [FrontendHomeController::class, 'index']);
Route::post('/contact/add', [ContactController::class, 'store'])->name('contact.store');

Route::prefix("admin")->group(function () {
    Route::view('/login', 'backend.pages.login')->name('login');
    Route::post('/login', [Authentication::class, 'login'])->name('login');
    Route::get('/logout', [Authentication::class, 'logout'])->name('logout');

    Route::middleware('custom_auth_guard')->group(function () {
        Route::get("/dashboard", [BackenHomeController::class, "index"])->name('dashboard');

        Route::prefix("review")->group(function () {
            Route::get('/add', [ReviewController::class, "index"])->name('review.add');
            Route::post('/add', [ReviewController::class, "store"])->name('review.store');
            Route::get('/list', [ReviewController::class, 'list'])->name('review.list');
            Route::get('/delete/{id}', [ReviewController::class, 'destroy'])->name('review.delete');
        });

        Route::prefix('package')->group(function () {
            Route::view('/add', 'backend.pages.package.add_package')->name('package.add');
            Route::post('/add', [PackageController::class, 'store'])->name('package.store');
            Route::get('/list', [PackageController::class, 'list'])->name('package.list');
            Route::get('/delete/{id}', [PackageController::class, 'destroy'])->name('package.delete');
        });

        Route::prefix('gallery')->group(function () {
            Route::view('/add', 'backend.pages.gallery.add_gallery_image')->name('gallery.add');
            Route::post('/add', [GalleryController::class, 'store'])->name('gallery.store');
            Route::get('/list', [GalleryController::class, 'list'])->name('gallery.list');
        });

        Route::prefix('contact')->group(function () {
            Route::get('/list', [ContactController::class, 'list'])->name('contact.list');
            Route::get('/details/{id}', [ContactController::class, 'show'])->name('contact.show');
        });
    });
});
