# DOKUMEN SRS
**"PLATFORM PENYEWAAN LOKER (SKOPER) BERBASIS WEB UNTUK MAHASIGMA"**

Software Requirements Specification (SRS) merupakan dokumen yang digunakan untuk mendefinisikan kebutuhan sistem secara rinci sebagai acuan utama dalam proses pengembangan perangkat lunak.

## Functional Requirement:
1. **Sistem dapat melakukan pendaftaran dan login.** Harus dilengkapi dengan pemisahan hak akses (Role-Based Access Control) antara Admin dan Mahasiswa.
2. **Mahasiswa dapat melihat ketersediaan loker.** Sistem hanya menampilkan loker yang berstatus *available* di katalog mahasiswa.
3. **Mahasiswa dapat menyewa/memesan loker.** Mahasiswa dapat memilih loker dan memasukkan durasi penyewaan (dalam jam).
4. **Sistem menampilkan dashboard penyewaan aktif bagi Mahasiswa.** Mahasiswa berfokus pada Penyewaan Aktif (melihat kartu loker raksasa dan Live Countdown Timer).
5. **Admin dapat mengelola data loker dan penyewaan.** Admin mengelola data master (CRUD) dan memantau status penyewaan (Tersedia, Disewa, Selesai) melalui Kanban Board. Riwayat penyewaan lengkap dipantau oleh Admin.
6. **Pendaftaran Biometrik.** Mahasiswa wajib melakukan simulasi pendaftaran vektor wajah (*Face Enrollment*) sebelum diizinkan menyewa loker.
7. **Simulasi IoT Unlock.** Mahasiswa dapat menekan tombol untuk memicu simulasi pembukaan pintu loker dari dasbor mereka.

## Non Functional Requirement:
1. **Sistem memiliki autentikasi pengguna.** Dilengkapi dengan hashing password.
2. **Sistem dapat berjalan pada browser modern.**
3. **Sistem responsif.** Antarmuka harus responsif dan adaptif terhadap berbagai ukuran layar (Desktop & Mobile) menggunakan kerangka kerja Tailwind CSS.
4. **Sistem mudah digunakan pengguna.** Interaktivitas UI dan kinerja: Transisi antar modul (seperti pop-up formulir sewa) harus dilakukan secara asinkron tanpa memuat ulang seluruh halaman (menggunakan Alpine.js).
5. **Sistem menerapkan Keamanan Ekstra.** Sistem harus terlindungi dari serangan *Clickjacking* dan *XSS* melalui injeksi HTTP *headers* kustom (menggunakan Middleware SecurityHeaders).
6. **Sistem memiliki Akurasi Waktu.** Penghitung waktu mundur (*Countdown Timer*) harus dihitung berdasarkan Unix Timestamp mutlak dari server (Carbon), sehingga tidak dapat dimanipulasi dengan mengubah jam di perangkat pengguna.
