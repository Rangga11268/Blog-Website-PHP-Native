
<p align="center">
<img src="assets/icon/logo bg.png" alt="Project Logo" width="150">
</p>

<h1 align="center">Blog Website PHP Native</h1>

<p align="center">
Sebuah platform blog yang dinamis dan kaya fitur, dibangun dari awal menggunakan PHP native. Proyek ini mencakup semua fungsionalitas penting dari sistem manajemen konten (CMS) modern, mulai dari manajemen pengguna hingga pembuatan dan kategorisasi postingan.
</p>

<p align="center">
<img src="https://img.shields.io/badge/PHP-Native-blueviolet" alt="PHP Native">
<img src="https://img.shields.io/badge/MySQL-Database-orange" alt="MySQL">
<img src="https://img.shields.io/badge/Frontend-HTML%2FCSS%2FJS-brightgreen" alt="Frontend">
</p>

## 🌟 Fitur Utama

Situs web ini dilengkapi dengan berbagai fitur untuk memberikan pengalaman blogging yang lengkap bagi pengguna dan administrator:

  * **👨‍💼 Autentikasi Pengguna:**

      * Sistem pendaftaran (`Sign Up`) dan masuk (`Sign In`) yang aman.
      * Validasi input dan hashing kata sandi untuk keamanan.
      * Sistem sesi untuk melacak status login pengguna.

  * **🖥️ Dasbor Admin yang Kuat:**

      * Antarmuka terpusat untuk mengelola semua aspek situs.
      * Peran pengguna yang berbeda (Admin dan Author) dengan hak akses yang sesuai.

  * **✍️ Manajemen Postingan (CRUD):**

      * **Create:** Menambahkan postingan baru dengan judul, isi, gambar thumbnail, dan kategori.
      * **Read:** Menampilkan semua postingan di halaman utama dan halaman blog.
      * **Update:** Mengedit postingan yang ada, termasuk memperbarui gambar thumbnail.
      * **Delete:** Menghapus postingan dari database beserta gambar terkait.

  * **🗂️ Manajemen Kategori (CRUD):**

      * Kemampuan untuk menambah, mengedit, dan menghapus kategori postingan.
      * Postingan secara otomatis dikategorikan ulang saat kategori induknya dihapus.

  * **👥 Manajemen Pengguna (CRUD oleh Admin):**

      * Admin dapat menambah, mengedit (nama depan, nama belakang, peran), dan menghapus pengguna.
      * Saat pengguna dihapus, semua postingan dan thumbnail terkait juga akan terhapus.

  * **🔍 Fungsionalitas Pencarian:**

      * Pengguna dapat mencari postingan berdasarkan judul.

  * **⭐ Postingan Unggulan:**

      * Admin dapat menandai satu postingan sebagai "Unggulan" untuk ditampilkan secara menonjol di halaman utama.

  * **📱 Desain Responsif:**

      * Tampilan situs web beradaptasi dengan baik di berbagai perangkat, dari desktop hingga seluler.

-----

## 🗃️ Skema Database

Struktur database dirancang untuk menjadi efisien dan skalabel, menghubungkan pengguna, postingan, dan kategori secara relasional.

\<p align="center"\>
\<img src="images/blog\_db.png" alt="Relasi Database Blog" width="600"\>
\</p\>

-----

## 🛠️ Teknologi yang Digunakan

  * **Backend:** PHP (Native)
  * **Database:** MySQL
  * **Frontend:**
      * HTML5
      * CSS3 (dengan variabel untuk tema)
      * JavaScript (untuk interaktivitas UI seperti navigasi dan sidebar)
  * **Server Lokal (Rekomendasi):** XAMPP

-----

## 🚀 Panduan Instalasi

Ikuti langkah-langkah ini untuk menjalankan proyek secara lokal:

1.  **Clone Repositori:**

    ```bash
    git clone https://github.com/rangga11268/blog-website-php-native.git
    cd blog-website-php-native
    ```

2.  **Impor Database:**

      * Buka `phpMyAdmin` atau klien database pilihan Anda.
      * Buat database baru dengan nama `blog`.
      * Pilih database `blog`, lalu impor file `blog.sql` yang ada di direktori root proyek.

3.  **Konfigurasi Koneksi:**

      * Buka file `config/constants.php`.
      * Sesuaikan nilai `ROOT_URL` agar sesuai dengan URL proyek lokal Anda (misalnya, `http://localhost/blog-website-php-native/`).
      * Pastikan detail koneksi database (`DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`) sudah benar.

4.  **Jalankan Proyek:**

      * Pindahkan seluruh folder proyek ke direktori `htdocs` di dalam instalasi XAMPP Anda.
      * Jalankan Apache dan MySQL dari panel kontrol XAMPP.
      * Buka browser dan akses `ROOT_URL` yang telah Anda konfigurasikan. Selesai\!

-----

## 📂 Struktur Proyek

```
/
├── admin/                # Dasbor Admin dan logika terkait
│   ├── config/           # Koneksi database khusus admin
│   ├── partials/         # Header untuk halaman admin
│   └── ...               # File CRUD untuk postingan, pengguna, kategori
├── assets/               # Ikon dan aset lainnya
├── config/               # Koneksi database utama dan konstanta
├── dist/                 # File CSS yang sudah jadi
├── images/               # Gambar yang diunggah (thumbnail & avatar)
├── js/                   # File JavaScript
├── partials/             # Komponen header & footer
├── singup-logic.php      # Logika untuk pendaftaran pengguna
├── signin-logic.php      # Logika untuk masuk pengguna
├── index.php             # Halaman utama
└── ...                   # Halaman publik lainnya (blog, about, dll.)
```
