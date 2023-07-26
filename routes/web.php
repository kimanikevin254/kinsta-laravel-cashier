<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SingleChargeController;
use App\Http\Controllers\SubscriptionController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// subscription
Route::prefix('/subscription')->middleware(['auth'])->group(function () {
    Route::get('/', [SubscriptionController::class, 'index'])->name('subscription');
});

// single charge
Route::prefix('/single_charge')->middleware(['auth'])->group(function () {
    Route::get('/', [SingleChargeController::class, 'index'])->name('single_charge');
});

// invoice
Route::prefix('/invoice')->middleware(['auth'])->group(function () {
    Route::get('/', [InvoiceController::class, 'index'])->name('invoice');
});

require __DIR__ . '/auth.php';
