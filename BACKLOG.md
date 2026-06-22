# Product & Sprint Backlog: Sistem Penyewaan Skoper

Dokumen ini berisi Product Backlog dan Sprint Backlog untuk pengembangan aplikasi penyewaan loker (Skoper) untuk target pengguna Mahasigma. Aplikasi dibangun menggunakan framework Laravel 12.

---

## 1. Visi Produk
Menyediakan sistem yang memudahkan Mahasigma untuk menyewa loker (Skoper) dengan mudah, melihat ketersediaan loker secara *real-time*, dan mengelola waktu penyewaan mereka secara mandiri.

---

## 2. Product Backlog

Berikut adalah daftar kebutuhan fitur (User Stories) berdasarkan struktur model dan tabel database (`User`, `Locker`, `Rental`) yang telah tersedia.

### Epic 1: Autentikasi dan Profil Mahasigma
- **PB-1.1:** Sebagai Mahasigma, saya ingin dapat mendaftar (Register) ke dalam sistem agar saya memiliki akun penyewaan.
- **PB-1.2:** Sebagai Mahasigma, saya ingin dapat masuk (Login) ke dalam sistem menggunakan email dan password agar saya dapat menyewa Skoper.
- **PB-1.3:** Sebagai Mahasigma, saya ingin melihat profil saya dan riwayat penyewaan saya agar saya tahu aktivitas penyewaan yang pernah saya lakukan.

### Epic 2: Manajemen Skoper (Loker)
- **PB-2.1:** Sebagai Mahasigma, saya ingin melihat daftar semua Skoper beserta statusnya (`available`, `occupied`, `maintenance`) agar saya dapat memilih Skoper yang kosong.
- **PB-2.2:** Sebagai Admin/Sistem, saya ingin menambahkan data Skoper baru (Nomor dan Lokasi) agar Mahasigma memiliki pilihan loker.
- **PB-2.3:** Sebagai Admin/Sistem, saya ingin dapat mengubah status Skoper (misalnya dari `available` menjadi `maintenance`) agar Mahasigma tidak menyewa loker yang rusak.

### Epic 3: Sistem Penyewaan Skoper
- **PB-3.1:** Sebagai Mahasigma, saya ingin dapat memulai penyewaan Skoper yang berstatus `available`, agar loker tersebut menjadi milik saya (`occupied`) sementara dan waktu mulai (`start_time`) tercatat.
- **PB-3.2:** Sebagai Mahasigma, saya ingin dapat mengakhiri penyewaan Skoper yang sedang berjalan (`active`), agar status penyewaan selesai (`completed`), waktu selesai (`end_time`) tercatat, dan loker kembali menjadi `available`.
- **PB-3.3:** Sebagai Sistem, saat Mahasigma menyewa loker, sistem harus memvalidasi agar Mahasigma tidak dapat menyewa loker yang saat ini berstatus `occupied` atau `maintenance`.

---

## 3. Sprint Backlog

Pengembangan dibagi ke dalam 2 Sprint. Masing-masing Sprint diasumsikan berjalan selama 2 minggu.

### Sprint 1: Autentikasi Pengguna & Tampilan Daftar Skoper
**Goal:** Membangun fondasi utama aplikasi, pendaftaran pengguna (Mahasigma), dan kemampuan sistem untuk mengelola serta menampilkan data Skoper.

**Task List:**
1. **[Setup]** Inisialisasi autentikasi menggunakan starter kit Laravel (seperti Laravel Breeze). (Terkait PB-1.1, PB-1.2)
2. **[Backend]** Implementasi Seeder untuk menginisialisasi beberapa data awal Skoper (Locker) untuk testing. (Terkait PB-2.2)
3. **[Frontend]** Membuat halaman untuk menampilkan daftar Skoper beserta lokasinya dan statusnya kepada Mahasigma. (Terkait PB-2.1)
4. **[Backend]** Membuat Route dan Controller (`LockerController@index`) untuk mengambil data Skoper dari database. (Terkait PB-2.1)
5. **[QA]** Menulis pengujian dasar (Feature Test) untuk proses Login, Register, dan menampilkan daftar Skoper.

### Sprint 2: Fungsionalitas Inti Penyewaan Skoper
**Goal:** Memungkinkan Mahasigma untuk melakukan *booking* (penyewaan) Skoper dan menyelesaikan sewa yang berjalan.

**Task List:**
1. **[Backend]** Membuat fungsi `store` pada `RentalController` untuk memproses sewa Skoper. (Terkait PB-3.1 & PB-3.3)
   - *Logic:* Validasi status loker `available`, buat record baru di tabel `rentals` (`status` = `active`), dan *update* tabel `lockers` status menjadi `occupied`.
2. **[Frontend]** Membuat tombol "Sewa Skoper" pada halaman daftar Skoper, yang mengirim *request* ke backend untuk menyewa. (Terkait PB-3.1)
3. **[Backend]** Membuat fungsi `update` (atau *custom method*) pada `RentalController` untuk mengakhiri sewa Skoper. (Terkait PB-3.2)
   - *Logic:* Temukan rental yang `active`, set `end_time`, ubah status rental menjadi `completed`, dan *update* tabel `lockers` status kembali menjadi `available`.
4. **[Frontend]** Membuat halaman "Penyewaanku" (Profil) untuk Mahasigma yang menampilkan penyewaan yang sedang aktif dan riwayat sewa. Terdapat tombol "Akhiri Sewa" pada penyewaan aktif. (Terkait PB-1.3 & PB-3.2)
5. **[QA]** Menulis pengujian dasar (Feature Test) untuk proses mulai menyewa dan mengakhiri penyewaan, serta memastikan status loker terupdate dengan benar.
