<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduledClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard',DashboardController::class)->middleware(['auth'])->name('dashboard');
Route::middleware('auth')->name('dashboard.')->group(function (){
    Route::middleware('role:member')->get('member/dashboard', function () {
        return view('member.dashboard');
    })->name('member');
    Route::middleware('role:instructor')->get('instructor/dashboard', function () {
        return view('instructor.dashboard');
    })->name('instructor')->middleware('role:instructor');
    Route::middleware('role:admin')->get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin');
});
Route::resource('/instructor/schedule',ScheduledClassController::class)
    ->only(['index','create','store','destroy'])
    ->middleware(['role:instructor','auth']);
Route::middleware(['role:member','auth'])->name('bookings.')->prefix('member')->group(function(){
    Route::get('/bookings',[BookingController::class,'index'])->name('index');
    Route::get('/book',[BookingController::class,'create'])->name('create');
    Route::post('/bookings',[BookingController::class,'store'])->name('store');
    Route::delete('/bookings/{id}',[BookingController::class,'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
