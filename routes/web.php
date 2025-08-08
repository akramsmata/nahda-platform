<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterExtendedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityFrontController;
use App\Http\Controllers\Admin\ApprovalController;

Route::get('/', function () {
    return view('home');
})->name('home');

/*
|-------------------------
| Authentication (custom)
|-------------------------
*/
// صفحة تسجيل الدخول (GET)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// معالجة تسجيل الدخول (POST) — اسم route: login.submit
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// تسجيل الخروج
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// تسجيل مستخدم (الخطوة الأولى)
Route::get('/register-member', [RegisterExtendedController::class,'show'])->name('register.show');
Route::post('/register-member', [RegisterExtendedController::class,'store'])->name('register.store');

// إكمال الملف الشخصي بعد التسجيل (الخطوة الثانية) — محمي بمستخدم مسجل
Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', [ProfileController::class, 'showCompleteForm'])->name('profile.complete.show');
    Route::post('/complete-profile', [ProfileController::class, 'storeCompleteForm'])->name('profile.complete.store');

    // صفحة الملف الشخصي
    Route::get('/my-profile', [ProfileController::class, 'myProfile'])->name('profile.my');
});

// Activities (عامة)
Route::get('/activities', [ActivityFrontController::class,'index'])->name('activities.index');
Route::get('/activities/{id}', [ActivityFrontController::class,'show'])->name('activities.show');
Route::post('/activities/{id}/register', [ActivityFrontController::class,'register'])->name('activities.register')->middleware('auth');

// Admin approval routes
Route::middleware(['auth'])->prefix('admin-panel')->group(function() {
    Route::get('/registrations', [ApprovalController::class,'registrations'])->name('admin.registrations');
    Route::post('/registrations/{id}/update', [ApprovalController::class,'updateRegistrationStatus'])->name('admin.registration.update');
    Route::post('/users/{id}/approve', [ApprovalController::class,'approveUser'])->name('admin.user.approve');
    Route::post('/users/{id}/reject', [ApprovalController::class,'rejectUser'])->name('admin.user.reject');
});
