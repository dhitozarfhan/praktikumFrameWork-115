# Modul Praktikum Pemrograman Web Framework (Laravel)
## Pertemuan 2: Arsitektur MVC, Routing, dan Autentikasi Breeze

### 1. Pendahuluan
Pada pertemuan kali ini, kita akan mempelajari konsep dasar arsitektur MVC (Model-View-Controller) yang merupakan fondasi utama Laravel. Kita juga akan belajar cara mengatur rute (routing) dan menginstalasi sistem autentikasi instan menggunakan Laravel Breeze.

**Kompetensi yang Harus Dicapai:**
- Memahami konsep dan alur kerja MVC di Laravel.
- Mampu mendaftarkan route baru pada `routes/web.php`.
- Mahir menggunakan Artisan command untuk membuat Controller.
- Berhasil menginstalasi dan mengonfigurasi Laravel Breeze.

---

### 2. Pengenalan MVC (Model-View-Controller)
MVC adalah pola arsitektur yang memisahkan logika aplikasi menjadi tiga komponen:
- **Model**: Menangani data dan logika database (`app/Models`).
- **View**: Menangani tampilan UI/HTML (`resources/views`).
- **Controller**: Jembatan antara Model dan View (`app/Http/Controllers`).

**Alur Kerja MVC:**
User mengakses URL (Route) -> Route memanggil Controller -> Controller mengambil data dari Model (jika ada) -> Controller mengirim data ke View -> View ditampilkan di browser.

---

### 3. Pengenalan Routing
Routing menentukan bagaimana aplikasi merespons permintaan URL. Pada Laravel, route utama berada di `routes/web.php`.
Contoh sederhana:
```php
Route::get('/about', function () {
    return view('about');
});
```

---

### 4. Instalasi Laravel Breeze
Laravel Breeze menyediakan scaffolding untuk fitur Login, Register, dan Dashboard.

**Langkah Instalasi:**
1. **Konfigurasi Database**: Pastikan `.env` sudah menggunakan `DB_CONNECTION=sqlite`.
2. **Download Package**:
   ```bash
   composer require laravel/breeze --dev
   ```
3. **Instalasi Blade Stack**:
   ```bash
   php artisan breeze:install blade
   ```
4. **Migrasi Database**:
   ```bash
   php artisan migrate
   ```
5. **Kompilasi Aset**:
   ```bash
   npm install && npm run dev
   ```

---

### 5. Penugasan Praktikum
Lengkapi project Anda dengan langkah-langkah berikut:
1. **Instalasi Breeze** hingga fitur Login dan Register dapat digunakan.
2. **Setup Route**: Buat route `/about` di `web.php`.
3. **Setup Controller**: Buat `AboutController` menggunakan perintah:
   ```bash
   php artisan make:controller AboutController
   ```
4. **Setup View**: Buat file `about.blade.php` yang menampilkan:
   - Nama: **Erindhito Nur Fauzan**
   - NIM: **20230140115**
   - Program Studi: Teknologi Informasi
   - Hobi: Coding / Ngoding
5. **Navigasi**: Tambahkan menu "About" pada file `resources/views/layouts/navigation.blade.php`.

---

### 6. Instruksi Pengumpulan (Screenshot)
Kumpulkan hasil praktikum dalam format PDF yang berisi screenshot:
1. Halaman Login
2. Halaman Register
3. Dashboard User
4. Halaman /about (Hasil akhir)

---

### Referensi
- Dokumentasi Laravel: [Laravel Breeze](https://laravel.com/docs/breeze)
- Dokumentasi Laravel: [Controllers](https://laravel.com/docs/controllers)
- Dokumentasi Laravel: [Blade Templates](https://laravel.com/docs/blade)
