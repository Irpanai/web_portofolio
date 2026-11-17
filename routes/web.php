<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CmsController::class, 'index']);
Route::get('/cv', [CmsController::class, 'viewCv'])->name('cv.view');
Route::get('/download-cv', [CmsController::class, 'downloadCv'])->name('cv.download');

// Inquiry Routes
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [CmsController::class, 'dashboard'])->name('dashboard');
    Route::post('/dashboard/save', [CmsController::class, 'save'])->name('dashboard.save');
    Route::post('/dashboard/upload-image', [CmsController::class, 'uploadImage'])->name('dashboard.upload.image');
    Route::post('/dashboard/upload-hero', [CmsController::class, 'uploadHeroImage'])->name('dashboard.upload.hero');
    Route::post('/dashboard/remove-hero', [CmsController::class, 'removeHeroImage'])->name('dashboard.remove.hero');
    Route::post('/dashboard/upload-cv', [CmsController::class, 'uploadCv'])->name('dashboard.upload.cv');

    // Manage inquiries
    Route::post('/dashboard/inquiries/{id}/read', [InquiryController::class, 'markAsRead'])->name('inquiry.read');
    Route::delete('/dashboard/inquiries/{id}', [InquiryController::class, 'destroy'])->name('inquiry.destroy');
});
