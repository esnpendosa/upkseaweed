# 🌊 UPK Seaweed — Industrial Marine Hub

![UPK Seaweed Banner](public/assets/img/logo-upkseaweed.png)

## 🏢 Tentang [upkseaweed.id](https://upkseaweed.id)

**UPK Seaweed (Ujungpangkah Kulon Marine)** adalah pusat pengolahan dan ekspor rumput laut terkemuka di Indonesia. Platform ini dirancang untuk menghubungkan petani lokal dengan pasar global, menyediakan produk rumput laut berkualitas tinggi yang berkelanjutan untuk berbagai industri di seluruh dunia.

---

## 🚀 Fitur Utama & Keunggulan

### 1. 🤖 Seaweed Intelligence (AI Chatbot)
Asisten AI canggih yang dirancang untuk melayani mitra dagang global secara real-time.
- **Teknologi**: Didukung oleh **OpenRouter API** (model Gemini atau Llama).
- **Multilingual**: Secara otomatis mendeteksi dan merespons dalam **18+ bahasa**.
- **Context-Aware**: Chatbot memahami spesifikasi produk, logistik pengiriman, lokasi perusahaan, dan sejarah UPK Seaweed.
- **Menu Dinamis**: Integrasi database yang memungkinkan admin mengatur opsi menu chat langsung dari panel admin.

### 2. 🌍 Localization Engine (Global Ready)
Platform ini dioptimalkan untuk audiens internasional dengan fitur lokalisasi otomatis.
- **Dukungan 18+ Bahasa**: Termasuk Arab (RTL), Mandarin, Jepang, Rusia, dan bahasa-bahasa Eropa.
- **Deteksi Lokasi Otomatis**: Mendeteksi negara asal pengunjung via IP dan menyajikan bahasa yang sesuai.
- **Auto-Translate**: Konten dinamis seperti Produk dan Artikel dapat diterjemahkan secara otomatis menggunakan integrasi **Google Translate**.

### 3. 💼 Katalog Produk & Ekspor
Terminal khusus untuk transaksi B2B global.
- **Spesifikasi Industri**: Menampilkan detail teknis seperti ambang batas kadar air (*Moisture*) dan kotoran (*Impurity*).
- **Integrasi WhatsApp**: Hubungkan pembeli langsung dengan pakar perdagangan kami dalam satu klik.
- **Sertifikasi**: Menampilkan standar internasional (ISO, HACCP, & Halal Indonesia).

### 4. 🎓 Seaweed Academy (LMS)
Portal edukasi yang bertujuan untuk memberdayakan petani lokal dan anggota koperasi dengan pengetahuan standar global mengenai budidaya dan praktik berkelanjutan.

### 5. 📝 Manajemen Konten (CMS)
- **Filament v3**: Panel admin modern dan intuitif untuk mengelola seluruh aspek website.
- **Artikel & Berita**: Sistem manajemen berita lengkap dengan fitur komentar untuk interaksi komunitas.
- **Regulasi & Kepatuhan**: Halaman khusus untuk menampilkan regulasi ekspor dan standar kepatuhan industri.

---

## 🛠️ Tech Stack

- **Framework**: Laravel 11 (PHP 8.2+)
- **Admin Panel**: Filament v3 (Professional CMS)
- **AI Engine**: OpenRouter API Integration
- **Frontend**: Tailwind CSS + Alpine.js
- **Database**: MySQL / MariaDB
- **Tools**: Vite, Composer, NPM

---

## 💻 Panduan Instalasi & Server

### 1. Pengembangan Lokal (Local Server)
Jika menggunakan **Laragon** (direkomendasikan) atau server lokal lainnya:

1. **Clone & Setup**:
   ```bash
   git clone https://github.com/esnpendosa/upkseaweed.git
   composer install
   npm install
   cp .env.example .env
   php artisan key:generate
   ```

2. **Konfigurasi Database & AI**:
   Atur kredensial database di `.env` dan tambahkan API Key OpenRouter:
   ```env
   OPENROUTER_API_KEY=your_api_key_here
   ```

3. **Migrasi & Seed**:
   ```bash
   php artisan migrate --seed
   ```

4. **Jalankan Aplikasi**:
   ```bash
   php artisan serve
   npm run dev
   ```

### 2. Deployment di Hostinger Shared Hosting
Platform ini sudah dioptimalkan untuk lingkungan **Shared Hosting**. Berikut langkah-langkahnya:

- **Konfigurasi Root**: Website ini dilengkapi dengan file `.htaccess` di root directory yang secara otomatis mengarahkan traffic ke folder `/public`. Anda **tidak perlu** memindahkan folder `public` atau mengubah struktur folder Laravel.
- **Versi PHP**: Pastikan akun Hostinger Anda menggunakan **PHP 8.2** atau lebih tinggi (dapat diatur di hPanel > Advanced > PHP Configuration).
- **Storage Link**: Karena akses SSH mungkin terbatas, Anda dapat membuat *symbolic link* untuk storage dengan menjalankan perintah ini melalui cron job atau Terminal di hPanel:
  ```bash
  php artisan storage:link
  ```
- **File .env**: Sesuaikan `APP_URL` ke `https://upkseaweed.id` dan masukkan detail database yang dibuat di hPanel Hostinger.
- **SSL**: Pastikan SSL (HTTPS) aktif di hPanel agar AI Chatbot dan fitur lainnya berjalan lancar.

---

## 📞 Kontak & Dukungan

- **Situs Resmi**: [upkseaweed.id](https://upkseaweed.id)
- **WhatsApp**: [+62 822-2821-4233](https://wa.me/6282228214233)
- **Lokasi**: Pangkahkulon, Ujungpangkah, Gresik, Jawa Timur, Indonesia.

<p align="center">Industrializing the Blue Economy with ❤️ from Indonesia</p>
