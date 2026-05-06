# Libro — Minimalist Library CRUD

Aplikasi Manajemen Buku dan Peminjaman, cocok sebagai bahan pembelajaran CRUD dasar.


## 🛠️ Teknologi
- **Framework**: Laravel 13
- **Database**: MySQL
- **Frontend**: Blade, Bootstrap 5, Inter Font
- **Dev Tools**: Laravel Boost, Artisan Dev

## 🚀 Cara Menjalankan

Untuk menjalankan proyek **Libro** di mesin lokal Anda, gunakan perintah ringkas berikut:

### 1. Inisiasi Database
Buat database baru dengan nama `db_perpus` atau sesuai dengan konfigurasi yang digunakan pada file `.env`

### 2. Instalasi & Setup
Setelah mengunduh proyek, jalankan perintah ini untuk menginstal dependensi, membuat file `.env`, generate key, dan migrasi database secara otomatis:
```bash
composer install
npm install
composer run setup
```
*Catatan: Pastikan Anda telah membuat database (default: `db_perpus`) atau sesuaikan nama database di `.env` setelah perintah ini selesai.*

### 3. Jalankan Aplikasi
Gunakan perintah resmi Laravel untuk mulai menjalankan server:
```bash
composer run dev
```

Akses di: `http://localhost:8000`
