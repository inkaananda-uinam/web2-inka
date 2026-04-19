<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Dokumentasi Penggunaan

Dokumentasi ini menjelaskan cara menjalankan aplikasi Laravel Sistem Manajemen Buku pada lingkungan lokal.

## 1. Prasyarat

Pastikan perangkat sudah terpasang:

- PHP 8.3 atau lebih baru
- Composer
- Node.js dan npm
- Database (MySQL/MariaDB/PostgreSQL) atau SQLite

## 2. Persiapan Proyek

Masuk ke folder proyek:

```bash
cd web2-inka
```

Install dependency backend:

```bash
composer install
```

Install dependency frontend:

```bash
npm install
```

## 3. Konfigurasi Environment

Jika file .env belum ada, buat dari template:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur koneksi database di file .env sesuai database lokal Anda.

Contoh untuk MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

## 4. Migrasi Database

Jalankan migrasi agar tabel termasuk tabel books dibuat:

```bash
php artisan migrate
```

## 5. Menjalankan Aplikasi

Buka dua terminal terpisah.

Terminal 1 (Vite frontend):

```bash
npm run dev
```

Terminal 2 (Laravel server):

```bash
php artisan serve
```

Akses aplikasi di browser:

- http://127.0.0.1:8000/books

## 6. Menjalankan dengan Satu Perintah

Alternatif cepat (menjalankan server, queue, log, dan vite sekaligus):

```bash
composer run dev
```

Lalu buka:

- http://127.0.0.1:8000/books

## 7. Fitur yang Tersedia

- Tambah data buku
- Tampilkan semua buku
- Ubah data buku
- Hapus data buku
- Validasi input saat tambah/ubah data

Atribut buku yang dikelola:

- Judul buku
- Penulis
- Penerbit
- Tahun terbit
- Stok buku

## 8. Troubleshooting

### Vite manifest not found

Jika muncul error Vite manifest not found:

```bash
npm run dev
```

Jika masih bermasalah, build asset manual:

```bash
npm run build
```

### Gagal koneksi database

- Periksa konfigurasi DB di file .env
- Pastikan service database menyala
- Pastikan database tujuan sudah dibuat

## 9. Menjalankan Pengujian

Untuk memastikan fitur berjalan baik:

```bash
php artisan test
```

Jika semua normal, hasil test akan menunjukkan status PASS.

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
