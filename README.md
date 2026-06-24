# 🔐 SmartLocker - Sistem Manajemen Loker Kampus Berbasis IoT & Biometrik

SmartLocker adalah prototipe aplikasi sistem manajemen penyewaan loker pintar (Self-Service) yang dikembangkan untuk memfasilitasi mahasiswa di lingkungan kampus. Sistem ini dilengkapi dengan dasbor interaktif (*Command Center*) untuk Administrator dan antarmuka ramah pengguna bagi Mahasiswa, lengkap dengan simulasi ekstraksi biometrik wajah (*Face Recognition*) dan integrasi perangkat IoT.

Proyek ini dikembangkan sebagai pemenuhan tugas mata kuliah *Software Engineering* di program studi Informatika, Universitas Pembangunan Jaya (UPJ).

---

## ✨ Fitur Utama

- **Role-Based Access Control (RBAC):** Pemisahan hak akses antara `admin` dan `student`.
- **Admin Command Center:** Dasbor berkonsep *Kanban Board* untuk melacak status loker secara *real-time* (Tersedia, Sedang Disewa, Selesai Hari Ini).
- **Statistik Interaktif:** Grafik batang visual untuk memantau frekuensi penyewaan loker harian.
- **Simulasi Biometrik (Face Enrollment):** Alur validasi yang mewajibkan pendaftaran data vektor wajah mahasiswa baru sebelum dapat menyewa loker.
- **Student Self-Service:** Mahasiswa dapat memilih dan menyewa loker secara mandiri tanpa campur tangan admin.
- **Live Countdown Timer:** Penghitung waktu mundur penyewaan berbasis Unix Timestamp yang akurat hingga hitungan detik.
- **Simulasi Kontrol IoT:** Eksekusi virtual untuk membuka kunci pintu elektrik loker dari jarak jauh melalui antarmuka web.

---

## 🛠️ Tech Stack

- **Framework:** [Laravel 12.x](https://laravel.com/)
- **Bahasa Server:** PHP 8.2+
- **Database:** MySQL
- **Styling:** [Tailwind CSS](https://tailwindcss.com/)
- **Interaktivitas UI:** [Alpine.js](https://alpinejs.dev/)
- **Charting:** [ApexCharts](https://apexcharts.com/)

---

## 🚀 Panduan Instalasi (Development)

Ikuti langkah-langkah berikut untuk menjalankan proyek SmartLocker di mesin lokal (Localhost):

### 1. Prasyarat Sistem
Pastikan perangkat Anda sudah terinstal:
- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL (XAMPP / Laragon)

### 2. Kloning Repositori
```bash
git clone [https://github.com/Mccarty666/smartlocker.git](https://github.com/Mccarty666/smartlocker.git)
cd smartlocker
