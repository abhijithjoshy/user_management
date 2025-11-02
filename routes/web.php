<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $totalUsers = \App\Models\User::count();
    $totalAdmins = \App\Models\User::where('type', 'admin')->count();
    $totalRegularUsers = \App\Models\User::where('type', 'user')->count();
    $trashedUsers = \App\Models\User::onlyTrashed()->count();
    
    return view('dashboard', compact('totalUsers', 'totalAdmins', 'totalRegularUsers', 'trashedUsers'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::softDeletes('users', UserController::class);
    Route::resource('users', UserController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
