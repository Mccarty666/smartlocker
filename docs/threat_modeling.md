# Threat Modeling dan Identifikasi Risiko Keamanan

Dokumen ini berisi analisis *threat modeling* sederhana dan identifikasi risiko keamanan dasar untuk aplikasi berbasis kerangka kerja Laravel ini.

## 1. Identifikasi Risiko Keamanan Aplikasi

Secara umum, aplikasi web rentan terhadap berbagai risiko. Berikut adalah risiko-risiko utama yang relevan:

*   **Injection (SQL Injection & Command Injection)**
    *   *Deskripsi:* Serangan di mana data yang tidak terpercaya dikirimkan ke interpreter (misalnya database SQL).
    *   *Risiko:* Pencurian data, modifikasi data secara sepihak, hingga pengambilalihan server.
*   **Cross-Site Scripting (XSS)**
    *   *Deskripsi:* Serangan di mana skrip berbahaya disuntikkan ke halaman web yang dapat dilihat oleh pengguna lain.
    *   *Risiko:* Pencurian session token pengguna (Cookie), manipulasi halaman (defacement), dan phishing.
*   **Cross-Site Request Forgery (CSRF)**
    *   *Deskripsi:* Serangan yang memaksa pengguna terautentikasi untuk menjalankan aksi yang tidak mereka inginkan pada aplikasi yang mereka percayai.
    *   *Risiko:* Perubahan data akun, transaksi finansial ilegal atas nama korban.
*   **Broken Authentication & Session Management**
    *   *Deskripsi:* Kelemahan dalam implementasi login, manajemen *session*, atau otorisasi.
    *   *Risiko:* Pengambilalihan akun, *brute force login*.
*   **Kehilangan Konfidensialitas Data (Data Exposure)**
    *   *Deskripsi:* Informasi sensitif (seperti kredensial atau API key) bocor ke publik (misalnya via `.env` atau pesan *error* yang detail).

## 2. Threat Modeling Sederhana

Kami menggunakan model **STRIDE** sederhana untuk mengklasifikasikan ancaman:

| Tipe Ancaman | Ancaman (Threat) | Dampak (Impact) | Strategi Mitigasi Dasar |
| :--- | :--- | :--- | :--- |
| **S**poofing | Pengguna palsu (bot) mencoba login. | Kompromi akun pengguna. | Implementasi *rate limiting* dan *strong authentication* (Laravel Auth / Breeze). |
| **T**ampering | Peretas memanipulasi parameter URL atau form. | Elevasi *privilege* atau manipulasi data sistem. | *Form Validation* dan *Input Sanitization*. |
| **R**epudiation | Pengguna menyangkal telah melakukan transaksi/aksi. | Kesulitan audit dan forensik. | Implementasi *logging* yang memadai. |
| **I**nformation Disclosure | Detail *error* sistem terekspos. | Memberikan petunjuk bagi penyerang (*reconnaissance*). | Nonaktifkan `APP_DEBUG=true` di *Production* dan batasi akses ke file `.env`. |
| **D**enial of Service (DoS) | Sistem di-*flood* dengan *request* tinggi. | *Downtime* aplikasi. | Implementasi HTTP *Rate Limiting*. |
| **E**levation of Privilege | Akses tak sah ke halaman Admin. | Peretas mengambil alih sistem. | Implementasi *Role-Based Access Control* (RBAC) dan *Middleware*. |

## 3. Rencana Mitigasi Keamanan Dasar

Berdasarkan identifikasi di atas, langkah mitigasi yang diimplementasikan dalam kode:

1.  **Proteksi CSRF:** Menggunakan middleware bawaan Laravel (sudah default).
2.  **Proteksi SQL Injection:** Selalu menggunakan Eloquent ORM atau *Query Builder* untuk *parameterized query*.
3.  **Proteksi XSS (Keamanan Frontend):** Menggunakan fitur Blade `{{ }}` yang secara otomatis me-*render* teks dan mencegah injeksi skrip HTML, serta menambahkan **Security Headers**.
4.  **Menambahkan HTTP Security Headers:** Mengimplementasikan *middleware* untuk header keamanan standar (misal: `X-Frame-Options` untuk mencegah *Clickjacking*, `X-Content-Type-Options`).
5.  **Rate Limiting:** Menggunakan *ThrottleRequests* yang secara default telah disediakan Laravel di API dan rute autentikasi.

Dokumen ini merupakan kerangka keamanan mendasar yang wajib dikaji kembali apabila aplikasi menambahkan fitur-fitur yang lebih kompleks.
