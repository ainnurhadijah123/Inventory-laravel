# Product Manager (Sistem Inventaris Barang)

Aplikasi manajemen produk dan inventaris berbasis Laravel. Sistem ini dirancang untuk memudahkan pengelolaan stok barang, pencatatan transaksi, dan dilengkapi dengan pembatasan hak akses pengguna yang aman.

## 🌟 Fitur Utama

* **Manajemen Produk (CRUD Lengkap)**: Tambah, edit, dan kelola produk beserta rincian kategori, harga, dan unggah gambar produk.
* **Pembatasan Hak Akses Berbasis Nama**:
  * **Admin**: Memiliki kontrol penuh, termasuk hak istimewa untuk menghapus data produk beserta riwayat transaksinya secara permanen.
  * **Staff**: Dapat mengelola operasional harian (tambah dan edit barang), namun rute dan tombol untuk menghapus barang diblokir secara sistem.
* **Manajemen Transaksi**: Pencatatan riwayat barang (masuk/keluar) yang terelasi langsung dengan data produk dan akun pencatat transaksi.
* **Sistem Keamanan Terintegrasi**: Fitur *login*, *logout*, dan perubahan *password* mandiri yang dilindungi oleh validasi (Hash) dan *middleware auth* Laravel.
* **Antarmuka Kustom**: Desain UI modern menggunakan Custom CSS, menu navigasi *dropdown* untuk profil, indikator stok dinamis, dan integrasi Google Fonts (Poppins).

## 🛠️ Teknologi yang Digunakan

* **Backend**: Laravel Framework, PHP
* **Database**: MySQL (Eloquent ORM)
* **Frontend**: HTML5, Custom CSS, Blade Templating

## 🚀 Panduan Instalasi

1. **Siapkan Direktori Proyek**
   Buka terminal/CMD dan arahkan ke dalam folder proyek Anda.

2. **Install Dependensi PHP**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**
   Salin file pengaturan bawaan lalu sesuaikan dengan database Anda:
   ```bash
   cp .env.example .env
   ```
   Buka file `.env` di editor kode Anda dan ubah bagian database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_anda
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database**
   Bangun struktur tabel database ke dalam MySQL:
   ```bash
   php artisan migrate
   ```

6. **Tautkan Direktori Penyimpanan Gambar**
   Agar gambar produk yang diunggah dapat diakses oleh publik:
   ```bash
   php artisan storage:link
   ```

7. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```
   Aplikasi kini dapat diakses melalui browser di: `http://127.0.0.1:8000`

## 🔐 Pembuatan Akun Default

Untuk masuk ke dalam aplikasi pertama kali, Anda dapat membuat akun secara manual melalui terminal (Tinker):

1. Masuk ke mode Tinker:
   ```bash
   php artisan tinker
   ```
2. Buat akun Admin:
   ```php
   App\Models\User::create(['name' => 'admin', 'email' => 'admin@toko.com', 'password' => Hash::make('12345678')]);
   ```
3. Buat akun Staff:
   ```php
   App\Models\User::create(['name' => 'staff', 'email' => 'staff@toko.com', 'password' => Hash::make('12345678')]);
   ```
4. Ketik `exit` untuk keluar dari Tinker. Anda kini dapat *login* menggunakan akun tersebut.