<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffRegisteredUserController;
use App\Http\Controllers\StoreStockController;

Route::get('/', function () {
    return view('welcome');
});

//Dashboard Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:staff', 'verified'])->name('dashboard');

Route::get('/dashboard/userDetails', [UserController::class, 'details'])
    ->middleware(['auth:staff'])
    ->name('userDetails');

//StoreStock Route
Route::get('/dashboard/{id}/storestock', [StoreStockController::class, 'show'])->name('dashboard.storestock');

//Profile Routes
Route::middleware('auth:staff')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Register Routes
Route::middleware('guest')->group(function () {
    Route::get('register-staff', [StaffRegisteredUserController::class, 'create'])->name('register-staff');
    Route::post('register-staff', [StaffRegisteredUserController::class, 'store'])->name('register-staff.store');
});

require __DIR__ . '/auth.php';
