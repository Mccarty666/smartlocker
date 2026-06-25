# 📦 Product Backlog — SmartLocker

> **Produk:** SmartLocker — Sistem Manajemen Loker Kampus Berbasis IoT & Biometrik  
> **Framework:** Laravel 12 · PHP 8.2 · MySQL · Tailwind CSS · Alpine.js · ApexCharts  
> **Tanggal:** Juni 2026

---

## 🎯 Visi Produk

SmartLocker hadir sebagai solusi **self-service locker management** bagi mahasiswa di lingkungan kampus. Sistem ini menggantikan proses manual peminjaman loker menjadi otomatis, aman, dan termonitor secara real-time — didukung oleh biometrik wajah dan integrasi IoT untuk membuka kunci loker dari jarak jauh.

---

## 👥 Persona Pengguna

| Persona | Deskripsi | Kebutuhan Utama |
|---------|-----------|-----------------|
| **Admin / Pengelola** | Staf atau dosen yang mengelola loker | Monitor status loker real-time, kelola data loker, lihat riwayat penyewaan |
| **Mahasiswa** | Pengguna akhir yang menyewa loker | Sewa loker mandiri, lihat sisa waktu, buka loker dari HP |

---

## 📋 Product Backlog Items (PBI)

### 🔴 High Priority (MVP)

| ID | Epic / Feature | User Story | Acceptance Criteria | Est. | Status |
|----|---------------|------------|---------------------|------|--------|
| **PBI-01** | Autentikasi & RBAC | Sebagai admin/mahasiswa, saya ingin login dan mendapat hak akses sesuai role | Login, register, forgot password berfungsi; admin & student melihat dasbor berbeda | 13h | ✅ Done |
| **PBI-02** | Manajemen Loker (CRUD) | Sebagai admin, saya ingin menambah, mengedit, dan menghapus data loker | Form tambah/edit loker via modal; hapus dengan konfirmasi; data tersimpan di database | 12h | ✅ Done |
| **PBI-03** | Kanban Dashboard Admin | Sebagai admin, saya ingin melihat status loker dalam 3 kolom: Tersedia, Disewa, Selesai Hari Ini | Tiga kolom Kanban menampilkan data real-time dari database; countdown timer di kartu Disewa | 12h | ✅ Done |
| **PBI-04** | Sewa & Kembalikan Loker | Sebagai mahasiswa/admin, saya ingin menyewa loker dan menyelesaikan sewa | Form sewa (nama + durasi) → status loker berubah; tombol selesai → status kembali available | 9h | ✅ Done |
| **PBI-05** | Pendaftaran Biometrik | Sebagai mahasiswa baru, saya wajib mendaftarkan wajah sebelum bisa menyewa | Halaman upload foto + animasi progres; flag ace_registered tersimpan; gate membatasi akses | 12h | ✅ Done |
| **PBI-06** | Dashboard Mahasiswa | Sebagai mahasiswa, saya ingin melihat loker saya dan memilih loker yang tersedia | Tampilan loker aktif + countdown; grid loker tersedia; tombol buka pintu (simulasi) | 14h | ✅ Done |
| **PBI-07** | Keamanan Dasar | Sebagai sistem, saya harus terlindungi dari XSS, CSRF, clickjacking | Security Headers Middleware aktif; Laravel CSRF built-in; Blade escaping {{ }} | 5h | ✅ Done |
| **PBI-08** | CI/CD Pipeline | Sebagai developer, saya ingin testing dan build otomatis setiap commit | GitHub Actions: checkout → install → lint → test → build → deploy simulasi | 6h | ✅ Done |

### 🟡 Medium Priority (Next Release)

| ID | Epic / Feature | User Story | Acceptance Criteria | Est. | Status |
|----|---------------|------------|---------------------|------|--------|
| **PBI-09** | Halaman Riwayat Penyewaan | Sebagai admin, saya ingin melihat dan memfilter semua riwayat penyewaan | Tabel rental dengan filter tanggal, status, pencarian nama | 8h | 🔴 Todo |
| **PBI-10** | Manajemen User | Sebagai admin, saya ingin mengelola akun pengguna | Daftar user, ubah role (admin/student), nonaktifkan akun | 8h | 🔴 Todo |
| **PBI-11** | Perpanjang Sewa | Sebagai mahasiswa, saya ingin memperpanjang durasi sewa tanpa selesai dulu | Tombol perpanjang di dashboard mahasiswa; end_time bertambah | 4h | 🔴 Todo |
| **PBI-12** | Halaman Data Loker Detail | Sebagai admin, saya ingin melihat tabel lengkap data loker dengan filter | Tabel semua loker + search + filter status/lokasi | 6h | 🔴 Todo |
| **PBI-13** | Halaman Pengaturan Sistem | Sebagai admin, saya ingin mengatur konfigurasi aplikasi | Form: nama aplikasi, jam operasional, durasi maksimal sewa | 6h | 🔴 Todo |
| **PBI-14** | Grafik & Analitik | Sebagai admin, saya ingin melihat statistik penyewaan dalam bentuk grafik | ApexCharts: grafik batang harian, pie chart utilisasi loker | 6h | 🔴 Todo |
| **PBI-15** | Notifikasi Waktu Habis | Sebagai mahasiswa, saya ingin diberi tahu ketika sewa hampir habis | Toast/alert muncul saat sisa waktu < 15 menit | 3h | 🔴 Todo |
| **PBI-16** | Audit Log Sistem | Sebagai admin, saya ingin melacak aktivitas pengguna | Tabel log: timestamp, user, aksi, detail | 6h | 🔴 Todo |

### 🟢 Low Priority (Future)

| ID | Epic / Feature | User Story | Acceptance Criteria | Est. | Status |
|----|---------------|------------|---------------------|------|--------|
| **PBI-17** | Integrasi IoT Nyata | Sebagai mahasiswa, saya ingin membuka loker lewat aplikasi (bukan simulasi) | API endpoint /api/locker/{id}/unlock terhubung ke ESP32/Raspberry Pi | 8h | 🔴 Todo |
| **PBI-18** | Face Recognition Nyata | Sebagai mahasiswa, saya ingin verifikasi wajah sungguhan (bukan simulasi) | Integrasi Azure Face API / OpenCV untuk face matching | 12h | 🔴 Todo |
| **PBI-19** | WebSocket Real-Time | Sebagai admin, saya ingin status loker berubah otomatis tanpa refresh | Laravel Reverb / Pusher untuk update real-time Kanban | 10h | 🔴 Todo |
| **PBI-20** | Export CSV/PDF | Sebagai admin, saya ingin mengunduh laporan penyewaan | Tombol export di halaman riwayat penyewaan | 4h | 🔴 Todo |
| **PBI-21** | Harga & Pembayaran | Sebagai mahasiswa, saya ingin melihat tarif sewa sebelum menyewa | Konfigurasi harga per jam; tampil di modal sewa | 4h | 🔴 Todo |
| **PBI-22** | Status Maintenance Loker | Sebagai admin, saya ingin menandai loker rusak agar tidak bisa disewa | Enum maintenance di database; UI toggle status | 3h | 🔴 Todo |
| **PBI-23** | Bulk Operations | Sebagai admin, saya ingin menghapus / mengubah status banyak loker sekaligus | Checkbox multi-select + aksi bulk | 4h | 🔴 Todo |
| **PBI-24** | Backup Database Otomatis | Sebagai admin, saya ingin data aman dengan backup terjadwal | Laravel Scheduler dump database harian | 4h | 🔴 Todo |
| **PBI-25** | Health Check Endpoint | Sebagai DevOps, saya ingin memonitor kesehatan sistem | Endpoint /health cek DB, storage, cache | 2h | 🔴 Todo |

---

## 📊 Statistik Product Backlog

| Metrik | Nilai |
|--------|-------|
| **Total PBI** | 25 |
| **Done (MVP)** | 8 |
| **Todo** | 17 |
| **MVP Completion** | 100% |
| **Overall Completion** | 32% |

| Prioritas | Total | Done | % |
|-----------|-------|------|-----|
| 🔴 High (MVP) | 8 | 8 | 100% |
| 🟡 Medium | 8 | 0 | 0% |
| 🟢 Low | 9 | 0 | 0% |

---

## 🗺️ Product Roadmap

`
MVP (v1.0) ✅                     Next (v1.1) 🔜              Future (v2.0) 💭
┌──────────────────────┐  ┌──────────────────────┐  ┌──────────────────────┐
│ • Login & RBAC       │  │ • Riwayat Penyewaan   │  │ • IoT nyata          │
│ • CRUD Loker         │  │ • Manajemen User      │  │ • Face Recognition   │
│ • Kanban Dashboard   │  │ • Perpanjang Sewa     │  │ • WebSocket          │
│ • Sewa & Kembalikan  │  │ • Grafik & Analitik   │  │ • Export Laporan     │
│ • Biometrik (simulasi)│  │ • Notifikasi          │  │ • Pembayaran         │
│ • Security Headers   │  │ • Audit Log           │  │ • Backup Otomatis    │
│ • CI/CD Pipeline     │  │ • Pengaturan Sistem   │  │ • Bulk Operations    │
└──────────────────────┘  └──────────────────────┘  └──────────────────────┘
       8 PBI ✅                   8 PBI 🔴                   9 PBI 🔴
`

---

*Dokumen ini disusun sebagai bagian dari tugas mata kuliah Software Engineering — Program Studi Informatika, Universitas Pembangunan Jaya (UPJ).*
