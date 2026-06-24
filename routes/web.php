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
    $user = auth()->user();

    // ==========================================
    // LOGIKA UNTUK MAHASISWA
    // ==========================================
    if ($user->role === 'student') {
        // Ambil HANYA 1 loker yang sedang dia sewa saat ini (jika ada)
        $myRental = Rental::with('locker')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        // Ambil data loker tersedia agar mahasiswa bisa memilih sendiri
        $lokersTersedia = Locker::where('status', 'available')->get();

        return view('dashboard', compact('myRental', 'lokersTersedia'));
    }

    // ==========================================
    // LOGIKA UNTUK ADMIN
    // ==========================================
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
    
    // Rute Loker (Akses CRUD Admin)
    Route::post('/loker/simpan', [LockerController::class, 'store'])->name('loker.store');
    Route::put('/loker/{locker}', [LockerController::class, 'update'])->name('loker.update');
    Route::delete('/loker/{locker}', [LockerController::class, 'destroy'])->name('loker.destroy');
    
    // Rute Penyewaan Loker (Bisa diakses Mahasiswa dan Admin)
    Route::post('/loker/{locker}/sewa', [LockerController::class, 'sewa'])->name('loker.sewa');

    // Rute Selesaikan Sewa
    Route::put('/rental/{rental}/selesai', [LockerController::class, 'selesai'])->name('rental.selesai');
    
    Route::post('/biometrik/simpan', [LockerController::class, 'simpanBiometrik'])->name('biometrik.simpan');
});

require __DIR__.'/auth.php';