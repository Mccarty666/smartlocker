<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;

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
}