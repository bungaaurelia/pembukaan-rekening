<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\SupervisiController;
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

require __DIR__.'/auth.php';

route::get('customerservice/dashboard',[HomeController::class,'index'])->middleware(['auth','customerservice']);
route::get('customerservice/create',[CustomerServiceController::class,'create'])->middleware(['auth','customerservice']);
route::post('customerservice/store',[CustomerServiceController::class,'store'])->middleware(['auth','customerservice']);
route::get('customerservice/pengajuan-rekening/view',[CustomerServiceController::class,'pengajuan'])->middleware(['auth','customerservice']);
route::get('supervisi/pengajuan-rekening/view',[SupervisiController::class,'pengajuan']);
route::put('supervisi/pengajuan-rekening/{id}/approve',[SupervisiController::class,'approve']);