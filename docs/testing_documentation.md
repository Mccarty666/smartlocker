# Dokumentasi Pengujian (Testing Documentation)

Dokumen ini menjabarkan seluruh strategi, struktur, dan daftar pengujian otomatis pada aplikasi **SmartLocker**.

---

## 1. Ringkasan

Pengujian menggunakan **PHPUnit** yang terintegrasi dengan Laravel, diotomatisasi melalui **GitHub Actions** (CI/CD pipeline). Setiap kali ada `push` atau `pull request` ke branch `main`, seluruh suite test dijalankan otomatis.

| Aspek | Detail |
| :--- | :--- |
| **Framework Testing** | PHPUnit 11+ (bawaan Laravel) |
| **Lokasi Test** | `tests/Unit/` dan `tests/Feature/` |
| **CI/CD** | GitHub Actions (`.github/workflows/ci-cd.yml`) |
| **Environment Testing** | SQLite in-memory (`:memory:`) |
| **Linting** | Laravel Pint (`./vendor/bin/pint --test`) |

---

## 2. Struktur Pengujian

```
tests/
├── TestCase.php                     # Base TestCase Laravel
├── Unit/
│   ├── ExampleTest.php              # Unit test dasar
│   └── SecurityHeadersTest.php      # Unit test middleware SecurityHeaders
└── Feature/
    ├── ExampleTest.php              # Feature test dasar (HTTP)
    ├── ProfileTest.php              # Test manajemen profil user
    ├── SecurityHeadersFeatureTest.php # Feature test HTTP header keamanan
    └── Auth/
        ├── AuthenticationTest.php   # Test login & logout
        ├── RegistrationTest.php     # Test registrasi user
        ├── PasswordResetTest.php    # Test reset password
        ├── PasswordConfirmationTest.php # Test konfirmasi password
        ├── PasswordUpdateTest.php   # Test update password
        └── EmailVerificationTest.php # Test verifikasi email
```

---

## 3. Cara Menjalankan Test

### 3.1 Lokal (Development)

```bash
# Menjalankan seluruh suite test
php artisan test

# Menjalankan hanya Unit test
php artisan test --testsuite=Unit

# Menjalankan hanya Feature test
php artisan test --testsuite=Feature

# Menjalankan satu file test
php artisan test --filter=SecurityHeadersTest

# Menjalankan test dengan output lebih detail
php artisan test -v

# Menjalankan Lint (Laravel Pint)
./vendor/bin/pint --test
```

### 3.2 CI/CD (GitHub Actions)

Test otomatis berjalan saat:
- **Push** ke branch `main`
- **Pull Request** ke branch `main`

Langkah-langkah pipeline:
1. Checkout kode
2. Setup PHP 8.2 + extension (`mbstring`, `bcmath`, `intl`, `zip`, `sqlite`, `pdo_sqlite`)
3. Copy `.env.example` → `.env`
4. `composer install`
5. `php artisan key:generate`
6. Setup Node.js 20 + `npm ci` + `npm run build`
7. **Laravel Pint** (lint check): `./vendor/bin/pint --test`
8. **PHPUnit**: `php artisan test`

Jika semua test lulus, pipeline lanjut ke job **Deploy (Simulasi)**.

---

## 4. Konfigurasi Environment Testing

Pengaturan environment testing ada di file `phpunit.xml`:

| Environment Variable | Value | Keterangan |
| :--- | :--- | :--- |
| `APP_ENV` | `testing` | Mode testing |
| `DB_CONNECTION` | `sqlite` | Gunakan SQLite (ringan & cepat) |
| `DB_DATABASE` | `:memory:` | Database di dalam RAM |
| `CACHE_STORE` | `array` | Cache tidak persisten |
| `MAIL_MAILER` | `array` | Email tidak benar-benar dikirim |
| `SESSION_DRIVER` | `array` | Session tidak persisten |
| `QUEUE_CONNECTION` | `sync` | Queue langsung diproses (tidak async) |
| `BCRYPT_ROUNDS` | `4` | Hash Bcrypt lebih cepat untuk testing |

---

## 5. Daftar Test Case

### 5.1 Unit Tests

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 1 | `Unit/ExampleTest.php` | `test_that_true_is_true` | Memastikan `assertTrue(true)` berfungsi — test validasi setup PHPUnit |
| 2 | `Unit/SecurityHeadersTest.php` | `test_it_adds_security_headers` | Memastikan middleware `SecurityHeaders` menyisipkan 5 header keamanan HTTP: `X-Frame-Options`, `X-XSS-Protection`, `X-Content-Type-Options`, `Referrer-Policy`, `Content-Security-Policy` |

### 5.2 Feature Tests — Umum

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 3 | `Feature/ExampleTest.php` | `test_the_application_returns_a_successful_response` | Memastikan halaman utama (`/`) mengembalikan HTTP 200 |
| 4 | `Feature/SecurityHeadersFeatureTest.php` | `test_homepage_has_security_headers` | Memastikan halaman utama (`/`) menyertakan 4 security header dalam response HTTP |

### 5.3 Feature Tests — Autentikasi

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 5 | `Auth/AuthenticationTest.php` | `test_login_screen_can_be_rendered` | Halaman `/login` dapat dirender (HTTP 200) |
| 6 | `Auth/AuthenticationTest.php` | `test_users_can_authenticate_using_the_login_screen` | User valid dapat login dan diarahkan ke dashboard |
| 7 | `Auth/AuthenticationTest.php` | `test_users_can_not_authenticate_with_invalid_password` | Login dengan password salah ditolak (tetap guest) |
| 8 | `Auth/AuthenticationTest.php` | `test_users_can_logout` | User dapat logout dan diarahkan ke `/` |

### 5.4 Feature Tests — Registrasi

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 9 | `Auth/RegistrationTest.php` | `test_registration_screen_can_be_rendered` | Halaman `/register` dapat dirender (HTTP 200) |
| 10 | `Auth/RegistrationTest.php` | `test_new_users_can_register` | User baru dapat registrasi, langsung login, dan diarahkan ke dashboard |

### 5.5 Feature Tests — Reset Password

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 11 | `Auth/PasswordResetTest.php` | `test_reset_password_link_screen_can_be_rendered` | Halaman `/forgot-password` dapat dirender |
| 12 | `Auth/PasswordResetTest.php` | `test_reset_password_link_can_be_requested` | Notifikasi reset password terkirim saat email valid dimasukkan |
| 13 | `Auth/PasswordResetTest.php` | `test_reset_password_screen_can_be_rendered` | Halaman `/reset-password/{token}` dapat dirender dengan token valid |
| 14 | `Auth/PasswordResetTest.php` | `test_password_can_be_reset_with_valid_token` | Password berhasil direset dengan token valid dan diarahkan ke `/login` |

### 5.6 Feature Tests — Konfirmasi Password

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 15 | `Auth/PasswordConfirmationTest.php` | `test_confirm_password_screen_can_be_rendered` | Halaman `/confirm-password` dapat dirender |
| 16 | `Auth/PasswordConfirmationTest.php` | `test_password_can_be_confirmed` | Password valid berhasil dikonfirmasi |
| 17 | `Auth/PasswordConfirmationTest.php` | `test_password_is_not_confirmed_with_invalid_password` | Password salah ditolak dengan session error |

### 5.7 Feature Tests — Update Password

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 18 | `Auth/PasswordUpdateTest.php` | `test_password_can_be_updated` | Password berhasil diupdate dengan current password yang benar |
| 19 | `Auth/PasswordUpdateTest.php` | `test_correct_password_must_be_provided_to_update_password` | Update password gagal jika current password salah |

### 5.8 Feature Tests — Verifikasi Email

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 20 | `Auth/EmailVerificationTest.php` | `test_email_verification_screen_can_be_rendered` | Halaman `/verify-email` dapat dirender oleh user yang belum verifikasi |
| 21 | `Auth/EmailVerificationTest.php` | `test_email_can_be_verified` | Email berhasil diverifikasi dengan signed URL yang valid |
| 22 | `Auth/EmailVerificationTest.php` | `test_email_is_not_verified_with_invalid_hash` | Verifikasi gagal dengan hash email yang tidak valid |

### 5.9 Feature Tests — Profil

| # | File | Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| 23 | `Feature/ProfileTest.php` | `test_profile_page_is_displayed` | Halaman `/profile` dapat dirender oleh user login |
| 24 | `Feature/ProfileTest.php` | `test_profile_information_can_be_updated` | Nama & email berhasil diperbarui, `email_verified_at` jadi null |
| 25 | `Feature/ProfileTest.php` | `test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged` | `email_verified_at` tidak berubah jika email tidak diganti |
| 26 | `Feature/ProfileTest.php` | `test_user_can_delete_their_account` | User dapat menghapus akunnya dengan password valid |
| 27 | `Feature/ProfileTest.php` | `test_correct_password_must_be_provided_to_delete_account` | Hapus akun gagal jika password salah |

---

## 6. Cakupan Keamanan (Security Test Coverage)

Test keamanan yang sudah diimplementasikan mencakup mitigasi berikut:

| Mitigasi Keamanan | Test Terkait |
| :--- | :--- |
| **HTTP Security Headers** | `SecurityHeadersTest::test_it_adds_security_headers` (Unit) + `SecurityHeadersFeatureTest::test_homepage_has_security_headers` (Feature) |
| **X-Frame-Options (Clickjacking)** | Header `SAMEORIGIN` diverifikasi |
| **X-XSS-Protection** | Header `1; mode=block` diverifikasi |
| **X-Content-Type-Options (MIME Sniffing)** | Header `nosniff` diverifikasi |
| **Referrer-Policy** | Header `strict-origin-when-cross-origin` diverifikasi |
| **Content-Security-Policy** | Default CSP rules diverifikasi (Unit test) |
| **CSRF Protection** | Otomatis oleh Laravel middleware |
| **SQL Injection** | Dicegah oleh Eloquent ORM (parameterized queries) |
| **XSS (Blade)** | Dicegah oleh escaping otomatis `{{ }}` |

---

## 7. Total Test Count

| Kategori | Jumlah Test |
| :--- | :--- |
| Unit Tests | 2 |
| Feature Tests (Umum) | 2 |
| Feature Tests (Auth) | 18 |
| **Total** | **22 test cases** |

---

## 8. Metrik Kesuksesan

1. **Pass Rate:** 100% test harus **hijau** (passed) sebelum merge ke `main`.
2. **Security Coverage:** Setiap security header yang diterapkan memiliki test eksplisit.
3. **Auth Coverage:** Seluruh alur autentikasi (register, login, logout, reset password, verifikasi email, update profil, hapus akun) tertutup test.

---

_Dokumentasi terakhir diperbarui: 2026_
