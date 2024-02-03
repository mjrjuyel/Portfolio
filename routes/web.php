<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ServiceController;
// ===== website Controller
use App\Http\Controllers\Website\ContactMessageController;

Route::get('/', function () {
    return view('welcome');
})->name('/');
//   ================== Contact Message From User ======= 
Route::post('/contact/insert',[ContactMessageController::class,'send'])->name('.contact.insert');

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//  ...................... Banner Part Start

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/banner', [BannerController::class, 'index'])->name('dashboard.banner');
    Route::post('/dashboard/banner/update', [BannerController::class, 'update'])->name('dashboard.banner.update');
//  --------------------- About Us
    Route::get('/dashboard/about', [AboutUsController::class, 'index'])->name('dashboard.about');
    Route::post('/dashboard/about/update', [AboutUsController::class, 'update'])->name('dashboard.about.update');
// ----------------------ServiceController ------
   Route::get('/dashboard/service',[ServiceController::class, 'index'])->name('dashboard.service');
   Route::get('/dashboard/service/add',[ServiceController::class, 'add'])->name('dashboard.service.add');
   Route::post('/dashboard/service/insert',[ServiceController::class, 'insert'])->name('dashboard.service.insert');
   Route::get('/dashboard/service/edit/{slug}',[ServiceController::class, 'edit'])->name('dashboard.service.edit');
   Route::post('/dashboard/service/update',[ServiceController::class, 'update'])->name('dashboard.service.update');
   Route::get('/dashboard/service/view/{slug}',[ServiceController::class, 'view'])->name('dashboard.service.view');
   Route::post('/dashboard/service/softdel',[ServiceController::class, 'softdel'])->name('dashboard.service.softdel');
   Route::post('/dashboard/service/view',[ServiceController::class, 'restore'])->name('dashboard.service.view');
   Route::get('/dashboard/service/pdf',[ServiceController::class, 'pdfmake'])->name('dashboard.service.pdf');


});

require __DIR__.'/auth.php';
