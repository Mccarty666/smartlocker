# 📋 Sprint Backlog — SmartLocker

> **Produk:** SmartLocker — Sistem Manajemen Loker Kampus Berbasis IoT & Biometrik  
> **Framework:** Laravel 12 · PHP 8.2 · MySQL · Tailwind CSS · Alpine.js · ApexCharts  
> **Repositori:** [github.com/Mccarty666/smartlocker](https://github.com/Mccarty666/smartlocker)  
> **Tanggal Dokumen:** Juni 2026

---

## 🎯 Tujuan Produk (Product Goal)

Membangun sistem manajemen penyewaan loker kampus yang **mandiri (self-service)**, **aman**, dan **real-time** dengan dukungan biometrik wajah dan kontrol IoT, sehingga mahasiswa dapat menyewa loker secara otonom dan administrator dapat memonitor seluruh aktivitas dalam satu dasbor terpusat.

---

## 🗂️ Ringkasan Sprint

| Sprint | Fokus | Status |
|--------|-------|--------|
| **Sprint 1** | Fondasi & Autentikasi (Laravel Breeze, RBAC, Security Headers) | ✅ Selesai |
| **Sprint 2** | Manajemen Loker & Kanban Dashboard Admin | ✅ Selesai |
| **Sprint 3** | Alur Penyewaan Mahasiswa & Simulasi Biometrik | ✅ Selesai |
| **Sprint 4** | CI/CD, QA, Testing & Dokumentasi | ✅ Selesai |

---

## ✅ Sprint 1 — Fondasi & Autentikasi

**Goal:** Menyiapkan kerangka proyek Laravel, sistem login, role-based access, dan keamanan dasar.

| ID | Backlog Item | Story / Acceptance Criteria | Prioritas | Estimasi | Status |
|----|-------------|----------------------------|-----------|----------|--------|
| **SL-001** | Inisialisasi proyek Laravel 12 | Proyek Laravel terinstall dengan dependensi Composer dan NPM | 🔴 High | 3 jam | ✅ Done |
| **SL-002** | Instalasi Laravel Breeze | Scaffolding autentikasi (login, register, forgot password, verify email) berjalan | 🔴 High | 4 jam | ✅ Done |
| **SL-003** | Migrasi tabel `users` dengan kolom `role` | Tabel users memiliki kolom `role` enum/admin/student, default admin | 🔴 High | 2 jam | ✅ Done |
| **SL-004** | Implementasi RBAC Middleware | Admin melihat dashboard admin; student melihat dashboard student | 🔴 High | 4 jam | ✅ Done |
| **SL-005** | Security Headers Middleware | Header `X-Frame-Options`, `X-XSS-Protection`, `X-Content-Type-Options`, `CSP`, `Referrer-Policy` aktif di semua respons HTTP | 🔴 High | 3 jam | ✅ Done |
| **SL-006** | Unit test Security Headers | Tes otomatis memvalidasi setiap header keamanan ada dan bernilai benar | 🟡 Medium | 2 jam | ✅ Done |

---

## ✅ Sprint 2 — Manajemen Loker & Kanban Dashboard Admin

**Goal:** Admin dapat mengelola data loker (CRUD) dan melihat status real-time di dasbor bergaya Kanban.

| ID | Backlog Item | Story / Acceptance Criteria | Prioritas | Estimasi | Status |
|----|-------------|----------------------------|-----------|----------|--------|
| **SL-007** | Migrasi tabel `lockers` | Tabel lockers dengan kolom: id, locker_number, location, status (available/occupied/maintenance), timestamps | 🔴 High | 2 jam | ✅ Done |
| **SL-008** | Model `Locker` + relasi | Model Locker terhubung ke Rental via `hasMany` | 🔴 High | 1 jam | ✅ Done |
| **SL-009** | LockerController — CRUD lengkap | `index()`, `store()`, `update()`, `destroy()` berfungsi dengan validasi input | 🔴 High | 6 jam | ✅ Done |
| **SL-010** | Rute CRUD Loker | `POST /loker/simpan`, `PUT /loker/{locker}`, `DELETE /loker/{locker}` terdaftar di `routes/web.php` | 🔴 High | 1 jam | ✅ Done |
| **SL-011** | Kanban Dashboard Admin | Tampilan 3 kolom: **Tersedia**, **Disewa**, **Selesai Hari Ini** — dengan data real-time dari database | 🔴 High | 12 jam | ✅ Done |
| **SL-012** | Modal Tambah Loker | Form modal dengan field nomor_loker dan lokasi, submit via POST | 🔴 High | 3 jam | ✅ Done |
| **SL-013** | Modal Edit Loker | Form modal pre-filled dengan data loker yang dipilih, submit via PUT | 🟡 Medium | 3 jam | ✅ Done |
| **SL-014** | Hapus Loker dengan konfirmasi | Tombol hapus di dropdown menu dengan konfirmasi JavaScript `confirm()` | 🟡 Medium | 1 jam | ✅ Done |

---

## ✅ Sprint 3 — Alur Penyewaan Mahasiswa & Simulasi Biometrik

**Goal:** Mahasiswa dapat menyewa loker sendiri, melihat sisa waktu sewa, dan melakukan pendaftaran biometrik wajah (simulasi).

| ID | Backlog Item | Story / Acceptance Criteria | Prioritas | Estimasi | Status |
|----|-------------|----------------------------|-----------|----------|--------|
| **SL-015** | Migrasi tabel `rentals` | Tabel rentals dengan FK ke users & lockers, start_time, end_time, status (active/completed), renter_name | 🔴 High | 2 jam | ✅ Done |
| **SL-016** | Model `Rental` + relasi | Model Rental terhubung ke Locker dan User via `belongsTo` | 🔴 High | 1 jam | ✅ Done |
| **SL-017** | Fitur Sewa Loker (`loker.sewa`) | POST form: nama_penyewa + durasi_jam → Update status loker ke occupied, create rental record dengan `end_time = now + durasi_jam` | 🔴 High | 6 jam | ✅ Done |
| **SL-018** | Fitur Selesaikan Sewa (`rental.selesai`) | PUT request → Update status loker ke available, update status rental ke completed | 🔴 High | 3 jam | ✅ Done |
| **SL-019** | Dashboard Mahasiswa — Tampilan Loker Aktif | Jika mahasiswa sedang menyewa: tampilkan nomor loker, lokasi, countdown timer real-time | 🔴 High | 8 jam | ✅ Done |
| **SL-020** | Dashboard Mahasiswa — Pilih Loker Tersedia | Grid card loker tersedia dengan tombol "Sewa Sekarang" → buka modal sewa | 🔴 High | 6 jam | ✅ Done |
| **SL-021** | Live Countdown Timer (Alpine.js) | Timer mundur berbasis `end_time` Unix timestamp, diperbarui setiap detik, menampilkan HH:MM:SS | 🔴 High | 4 jam | ✅ Done |
| **SL-022** | Migrasi kolom `face_registered` di users | Boolean flag default false untuk menandai status pendaftaran biometrik | 🟡 Medium | 1 jam | ✅ Done |
| **SL-023** | Halaman Pendaftaran Biometrik | UI upload foto + animasi progres (scanning matriks, ekstraksi vektor) → submit form simpan biometrik | 🟡 Medium | 8 jam | ✅ Done |
| **SL-024** | Gate Biometrik: wajib daftar sebelum sewa | Mahasiswa dengan `face_registered = false` tidak bisa mengakses grid loker tersedia | 🔴 High | 3 jam | ✅ Done |
| **SL-025** | Tombol Simulasi Buka Pintu IoT | Tombol di dashboard mahasiswa yang memicu `alert()` simulasi API call ke perangkat IoT | 🟢 Low | 1 jam | ✅ Done |
| **SL-026** | Modal Sewa Loker (Global) | Modal reusable yang digunakan baik oleh admin (via Kanban) maupun mahasiswa (via grid card) | 🟡 Medium | 4 jam | ✅ Done |

---

## ✅ Sprint 4 — CI/CD, QA, Testing & Dokumentasi

**Goal:** Menjamin kualitas kode, keamanan, dan kesiapan deployment melalui pipeline otomatis.

| ID | Backlog Item | Story / Acceptance Criteria | Prioritas | Estimasi | Status |
|----|-------------|----------------------------|-----------|----------|--------|
| **SL-027** | Unit Test — Security Headers | Tes bahwa setiap header keamanan hadir di response HTTP | 🔴 High | 2 jam | ✅ Done |
| **SL-028** | Feature Test — Autentikasi | Tes login, register, password reset berfungsi | 🔴 High | 3 jam | ✅ Done |
| **SL-029** | Feature Test — Halaman Dashboard | Tes bahwa `/dashboard` mengembalikan 200 untuk user terautentikasi | 🟡 Medium | 1 jam | ✅ Done |
| **SL-030** | GitHub Actions CI/CD Pipeline | Pipeline: checkout → setup PHP 8.2 → composer install → npm ci/build → lint (Pint) → PHPUnit test → simulasi deploy | 🔴 High | 6 jam | ✅ Done |
| **SL-031** | Dokumentasi Threat Modeling | Dokumen STRIDE: identifikasi spoofing, tampering, repudiation, info disclosure, DoS, elevation of privilege | 🟡 Medium | 3 jam | ✅ Done |
| **SL-032** | Dokumentasi QA & Testing Plan | Dokumen rencana testing: testing pyramid, unit test, integration test, CI/CD, metrik kesuksesan | 🟡 Medium | 3 jam | ✅ Done |
| **SL-033** | Dokumentasi Sprint Backlog | Dokumen ini — backlog lengkap seluruh sprint | 🟡 Medium | 2 jam | ✅ Done |

---

## 📊 Statistik Backlog

| Metrik | Nilai |
|--------|-------|
| **Total Backlog Item** | 33 |
| **Selesai (Done)** | 33 |
| **Completion Rate** | 100% |

### Per Sprint:

| Sprint | Total | Selesai | % |
|--------|-------|---------|----|
| Sprint 1 | 6 | 6 | 100% |
| Sprint 2 | 8 | 8 | 100% |
| Sprint 3 | 12 | 12 | 100% |
| Sprint 4 | 7 | 7 | 100% |

---

## 🧑‍🤝‍🧑 Tim & Peran

| Peran | Nama | Tanggung Jawab |
|-------|------|---------------|
| **Product Owner** | *(Dosen Pengampu)* | Menentukan visi produk & prioritas fitur |
| **Developer / Full-Stack** | *(Mahasiswa)* | Implementasi frontend & backend, testing, deployment |
| **QA Tester** | *(Mahasiswa)* | Menulis dan menjalankan test case, melaporkan bug |

---

## 🔄 Definisi Selesai (Definition of Done)

Sebuah backlog item dinyatakan **DONE** apabila:

1. ✅ Kode sudah di-push ke branch dan lolos semua test (`php artisan test`)
2. ✅ Tidak ada error linting (`./vendor/bin/pint --test`)
3. ✅ Acceptance criteria terpenuhi sesuai deskripsi backlog item
4. ✅ Telah di-review (self-review atau peer-review)
5. ✅ Fitur berfungsi di environment local tanpa regresi
6. ✅ Dokumentasi terkait (jika ada) sudah diperbarui

---

## 📌 Catatan Tambahan

- **Prioritas:** 🔴 High = Harus ada di rilis, 🟡 Medium = Penting tapi bisa ditunda, 🟢 Low = Nice-to-have
- **Estimasi** menggunakan satuan jam kerja (1 hari ≈ 6 jam produktif)
- Sprint 1–4 telah diselesaikan dalam kerangka tugas mata kuliah *Software Engineering*

---

*Dokumen ini disusun sebagai bagian dari tugas mata kuliah Software Engineering — Program Studi Informatika, Universitas Pembangunan Jaya (UPJ).*