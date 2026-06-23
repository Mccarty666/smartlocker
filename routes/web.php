<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LockerController;
use Illuminate\Support\Facades\Route;
use App\Models\Locker;
use App\Models\Rental;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // 1. Ambil Loker yang masih tersedia
    $lokersTersedia = Locker::where('status', 'available')->get();
    
    // 2. Ambil Penyewaan yang masih aktif (termasuk data lokernya)
    $rentalsAktif = Rental::with('locker')->where('status', 'active')->get();
    
    // 3. Ambil Penyewaan yang selesai HARI INI
    $rentalsSelesai = Rental::with('locker')
                            ->where('status', 'completed')
                            ->whereDate('updated_at', Carbon::today())
                            ->get();

    return view('dashboard', compact('lokersTersedia', 'rentalsAktif', 'rentalsSelesai'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rute Loker
    Route::post('/loker/simpan', [LockerController::class, 'store'])->name('loker.store');
    Route::put('/loker/{locker}', [LockerController::class, 'update'])->name('loker.update'); // Untuk proses edit
    Route::delete('/loker/{locker}', [LockerController::class, 'destroy'])->name('loker.destroy'); // Untuk proses hapus
});

require __DIR__.'/auth.php';