<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'components.pages.frontend.home')->name('index');
Route::view('/about-us', 'components.pages.frontend.about-us')->name('about-us');
Route::view('/public-report', 'components.pages.frontend.public-reports')->name('public-report');
Route::view('/detail', 'components.pages.frontend.detail')->name('detail');
Route::view('/history', 'components.pages.frontend.history')->name('history');
Route::view('/create', 'components.pages.frontend.create')->name('create');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
