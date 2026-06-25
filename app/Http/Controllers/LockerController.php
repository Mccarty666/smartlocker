<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;
use App\Models\Rental;
use Carbon\Carbon;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Nanti kita akan menggunakan fungsi ini untuk mengambil data 
        // dari database dan menampilkannya di papan Kanban Dashboard.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang dikirim dari form modal
        $request->validate([
            'nomor_loker' => 'required|string|max:255',
            'lokasi'      => 'required|string|max:255',
            // Catatan: Jika nanti kamu menambahkan kolom 'ukuran' di database, 
            // kamu bisa menangkap datanya juga di sini.
        ]);

        // 2. Simpan data baru ke dalam tabel lockers
        $lokerBaru = new Locker();
        $lokerBaru->locker_number = $request->nomor_loker;
        $lokerBaru->location = $request->lokasi;
        $lokerBaru->status = 'available'; // Default status saat loker baru didaftarkan
        $lokerBaru->save();

        // 3. Kembalikan pengguna ke halaman dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Locker $locker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locker $locker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Locker $locker)
    {
        // 1. Validasi data
        $request->validate([
            'nomor_loker' => 'required|string|max:255',
            'lokasi'      => 'required|string|max:255',
        ]);

        // 2. Update data di database
        $locker->locker_number = $request->nomor_loker;
        $locker->location = $request->lokasi;
        $locker->save();

        // 3. Kembali ke dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locker $locker)
    {
        // Hapus data dari database
        $locker->delete();

        // Kembali ke dashboard
        return redirect()->route('dashboard');
    }

    public function sewa(Request $request, Locker $locker)
    {
        $request->validate([
        'nama_penyewa' => 'required|string|max:255',
        'durasi_jam'   => 'required|integer|min:1',
    ]);

    // Update status loker
    $locker->status = 'occupied'; 
    $locker->save();

    // Tambahkan user_id di sini
    \App\Models\Rental::create([
        'locker_id'   => $locker->id,
        'user_id'     => auth()->id(), // <--- TAMBAHKAN BARIS INI
        'renter_name' => $request->nama_penyewa,
        'status'      => 'active', 
        'end_time'    => \Carbon\Carbon::now()->addHours((int) $request->durasi_jam),
    ]);

    return redirect()->route('dashboard');
}

    public function selesai(\App\Models\Rental $rental)
    {
        // 1. Ambil loker yang terkait dengan rental ini
        $locker = $rental->locker;

        // 2. Ubah status loker kembali menjadi tersedia
        $locker->status = 'available'; 
        $locker->save();

        // 3. Ubah status rental menjadi selesai
        $rental->status = 'completed';
        $rental->save();

        return redirect()->route('dashboard')->with('success', 'Loker berhasil dikembalikan!');
    }

    public function simpanBiometrik()
    {
        $user = auth()->user();
        
        // Simulasikan bahwa sistem telah merekam wajah
        $user->face_registered = true;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Biometrik wajah berhasil didaftarkan!');
    }
} 