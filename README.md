# Web Profile - Naufal Arsyaputra Pradana

Sebuah website portofolio profesional dan interaktif yang dibangun menggunakan **Laravel 11**, **Tailwind CSS**, dan **Blade**. Website ini berfungsi sebagai CV Digital yang dapat dikelola sepenuhnya (Data-Driven) melalui Panel Admin. 

## 🚀 Fitur Utama

### 1. Front-End (Tampilan Pengunjung)
* **Desain Modern & Premium**: Menggunakan tema gelap (Dark Theme) dengan sentuhan gaya *Glassmorphism*, gradasi warna yang elegan, serta animasi *micro-interactions* (AOS Animations) yang memberikan kesan mewah dan hidup.
* **Responsive Layout**: Tampilan sempurna dan nyaman diakses dari berbagai ukuran layar (Desktop, Tablet, maupun Mobile).
* **CV Download**: Fitur unduh *Curriculum Vitae* dalam dua format: Kreatif dan ATS (Applicant Tracking System), dengan tombol yang estetik.
* **Dynamic Sections**: Terdiri dari bagian Hero, About, Skills, Experiences, Educations, Certifications, Trainings, Projects, dan Certificates Gallery.
* **Promo Page (Other Projects)**: Halaman khusus yang ditujukan untuk promosi silang (cross-promotion) ke proyek-proyek lain milik Naufal.

### 2. Back-End (Panel Admin)
* **Authentication**: Sistem Login yang aman untuk mengelola website.
* **Manajemen Konten Statis (Singleton)**: Pengaturan Hero Section, About Section (termasuk unggah file CV), dan Contact Section tanpa harus menyentuh kode.
* **Full CRUD Management**: Pengelolaan dinamis untuk Skills, Pengalaman Kerja, Pendidikan, Organisasi, Sertifikasi, Pelatihan, Portofolio Proyek, dan Galeri Sertifikat. Dilengkapi dengan validasi lengkap dan unggah gambar yang aman.
* **Desain Panel Admin Elegan**: UI/UX Admin yang rapi, responsif, dan senada dengan tema utama.

## 🛠️ Teknologi yang Digunakan

* **Backend**: Laravel 11 (PHP 8.2+)
* **Frontend**: Blade Templating, Tailwind CSS, Alpine.js (untuk komponen interaktif ringan)
* **Database**: MySQL
* **Animasi & Ikon**: AOS (Animate On Scroll), FontAwesome

## 💻 Instalasi & Menjalankan Proyek Secara Lokal

1. **Clone Repository**
   ```bash
   git clone <url-repo>
   cd web-profile
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   Salin file `.env.example` menjadi `.env`, lalu konfigurasi database Anda.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrate & Seed Database**
   Jalankan migrasi beserta seeder untuk memuat data *dummy* dan akun Admin.
   ```bash
   php artisan migrate:fresh --seed
   ```
   > **Catatan**: Akun admin bawaan adalah `admin@admin.com` dengan password `password`.

5. **Storage Link**
   Hubungkan *storage* publik agar gambar/foto/CV bisa diakses.
   ```bash
   php artisan storage:link
   ```

6. **Build Aset Frontend**
   ```bash
   npm run build
   ```
   *Atau gunakan `npm run dev` untuk pengembangan.*

7. **Jalankan Server**
   ```bash
   php artisan serve
   ```
   Website dapat diakses di `http://127.0.0.1:8000`.

---
*Didesain dan dikembangkan sebagai bagian dari personal branding profesional.*
