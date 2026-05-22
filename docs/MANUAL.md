# 📖 Buku Panduan Pengguna (Manual Book)
# UPK Seaweed — Industrial Marine Hub
**Versi 1.0 | © 2026 UPK Seaweed. Seluruh hak cipta dilindungi.**

---

## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
2. [Akses Website](#2-akses-website)
3. [Halaman Publik (Frontend)](#3-halaman-publik-frontend)
   - [3.1 Beranda (Home)](#31-beranda-home)
   - [3.2 Statistik Produksi](#32-statistik-produksi)
   - [3.3 Trade Hub](#33-trade-hub)
   - [3.4 LMS / Edukasi](#34-lms--edukasi)
   - [3.5 Regulasi](#35-regulasi)
   - [3.6 Tentang Kami](#36-tentang-kami)
   - [3.7 Struktur Organisasi](#37-struktur-organisasi)
   - [3.8 Katalog Produk](#38-katalog-produk)
   - [3.9 Sertifikasi](#39-sertifikasi)
   - [3.10 Berita & Artikel](#310-berita--artikel)
   - [3.11 Galeri](#311-galeri)
   - [3.12 Kontak](#312-kontak)
4. [AI Chatbot — Seaweed Intelligence](#4-ai-chatbot--seaweed-intelligence)
5. [Panel Admin (Backend Filament)](#5-panel-admin-backend-filament)
   - [5.1 Login Admin](#51-login-admin)
   - [5.2 Manajemen Artikel](#52-manajemen-artikel)
   - [5.3 Manajemen Produk](#53-manajemen-produk)
   - [5.4 Manajemen Sertifikasi](#54-manajemen-sertifikasi)
   - [5.5 Manajemen Modul Edukasi](#55-manajemen-modul-edukasi)
   - [5.6 Manajemen Regulasi](#56-manajemen-regulasi)
   - [5.7 Manajemen Tim](#57-manajemen-tim)
   - [5.8 Manajemen Hero Slide](#58-manajemen-hero-slide)
   - [5.9 Manajemen Galeri](#59-manajemen-galeri)
   - [5.10 Konfigurasi Chatbot](#510-konfigurasi-chatbot)
   - [5.11 Pengaturan Sistem & SEO](#511-pengaturan-sistem--seo)
6. [Fitur Multibahasa](#6-fitur-multibahasa)
7. [Aplikasi Android](#7-aplikasi-android)
8. [Panduan Instalasi](#8-panduan-instalasi)
9. [Kontak & Dukungan](#9-kontak--dukungan)

---

## 1. Pendahuluan

**UPK Seaweed Industrial Hub** (upkseaweed.id) adalah platform digital milik **Ujungpangkah Kulon Marine** yang dirancang untuk mendigitalisasi industri rumput laut Indonesia. Platform ini menghubungkan petani lokal dengan pasar ekspor global, menyediakan informasi produk, edukasi, dan layanan perdagangan B2B secara terpadu.

### Tujuan Platform
- Memfasilitasi perdagangan rumput laut premium skala internasional
- Menyediakan portal edukasi bagi petani dan pemangku kepentingan
- Memberikan transparansi data produksi dan sertifikasi internasional
- Mengintegrasikan kecerdasan buatan (AI) untuk layanan informasi real-time

### Teknologi
| Komponen | Teknologi |
|---|---|
| Backend | Laravel 11 (PHP 8.2+) |
| Admin Panel | Filament v3 |
| AI Engine | OpenRouter API (Gemini/Mistral/Qwen) |
| Frontend | Tailwind CSS & Alpine.js |
| Database | MySQL / MariaDB |
| Bahasa | 15 bahasa internasional |

---

## 2. Akses Website

| Akses | URL |
|---|---|
| Website Utama | https://upkseaweed.id |
| Panel Admin | https://upkseaweed.id/admin |
| Sitemap | https://upkseaweed.id/sitemap.xml |

---

## 3. Halaman Publik (Frontend)

### 3.1 Beranda (Home)

**URL:** `/`

Halaman utama platform yang menampilkan gambaran lengkap tentang UPK Seaweed.

**Konten yang ditampilkan:**
- **Hero Slide Interaktif** — Banner utama dinamis yang dapat dikonfigurasi admin, menampilkan gambar dan teks promosi.
- **Statistik Produksi Real-time** — Angka produksi (ton), jumlah negara tujuan ekspor, jumlah petani mitra, dan total dampak ekonomi.
- **Produk Unggulan** — Daftar produk aktif (Gracilaria, Cottonii, dll) dengan gambar dan deskripsi singkat.
- **Sertifikasi** — Lencana sertifikasi internasional yang dimiliki (HACCP, Halal, Organik, dll).
- **Berita Terbaru** — 3 artikel terbaru dari portal berita.
- **AI Chatbot Widget** — Tombol akses cepat ke asisten AI di pojok kanan bawah.

---

### 3.2 Statistik Produksi

**URL:** `/statistics`

Halaman yang menyajikan data visual mendalam mengenai kinerja produksi UPK Seaweed.

**Data yang ditampilkan:**
- Total produksi rumput laut (ton/tahun)
- Jumlah negara tujuan ekspor
- Jumlah petani mitra aktif
- Total dampak ekonomi (USD)

> **Catatan:** Seluruh angka statistik bersifat dinamis dan dapat diperbarui oleh admin melalui menu **Pengaturan Sistem**.

---

### 3.3 Trade Hub

**URL:** `/trade-hub`

Terminal digital untuk transaksi perdagangan B2B (Business-to-Business) skala internasional.

**Fitur:**
- Informasi spesifikasi teknis produk (Moisture content, Impurity level, dll)
- Formulir permintaan penawaran (inquiry) untuk calon pembeli
- Informasi prosedur ekspor dan pengiriman
- Kontak langsung tim Sales via WhatsApp

**Cara Menggunakan:**
1. Buka halaman `/trade-hub`
2. Pilih produk yang diminati
3. Klik tombol **"Request a Quote"** atau **"Contact Sales"**
4. Anda akan diarahkan ke WhatsApp tim Sales

---

### 3.4 LMS / Edukasi

**URL:** `/education`

Portal **Learning Management System (LMS)** — Seaweed Academy — untuk memberdayakan petani rumput laut dengan pengetahuan budidaya berstandar global.

**Konten:**
- Modul edukasi tentang teknik budidaya rumput laut
- Panduan pasca-panen dan pengolahan
- Standar kualitas ekspor internasional
- Materi edukasi yang dikelola dan diperbarui oleh admin

**Cara Mengakses Modul:**
1. Buka halaman `/education`
2. Pilih modul yang ingin dipelajari
3. Klik kartu modul untuk melihat detail materi
4. Konten dapat berupa teks, tautan eksternal, atau dokumen

---

### 3.5 Regulasi

**URL:** `/regulations`

Pusat akses dokumen legal, kebijakan pemerintah, dan kerangka kerja koperasi yang relevan dengan industri rumput laut.

**Konten:**
- Peraturan pemerintah terkait ekspor hasil laut
- Standar SNI dan internasional
- Regulasi koperasi dan tata kelola UPK
- Dokumen kebijakan yang dapat diunduh

---

### 3.6 Tentang Kami

**URL:** `/about`

Halaman profil lengkap perusahaan UPK Seaweed.

**Konten:**
- **Sejarah Perusahaan** — Latar belakang berdirinya UPK Seaweed
- **Visi & Misi** — Arah dan tujuan strategis perusahaan
- **Nilai Perusahaan** — Prinsip-prinsip yang menjadi dasar operasional
- **Sambutan Pimpinan** — Pesan dari kepala UPK
- **Rencana Ekspansi** — Roadmap pengembangan ke depan

---

### 3.7 Struktur Organisasi

**URL:** `/structure`

Menampilkan profil pengurus dan struktur kepemimpinan UPK Seaweed secara transparan.

**Konten:**
- Foto dan nama anggota tim
- Jabatan dan peran masing-masing
- Informasi kontak (jika tersedia)

---

### 3.8 Katalog Produk

**URL:** `/products`

Halaman katalog lengkap seluruh produk rumput laut yang ditawarkan.

**Jenis Produk:**
| Jenis | Keterangan |
|---|---|
| Gracilaria | Rumput laut merah untuk industri agar-agar |
| Cottonii (Kappaphycus) | Bahan baku karagenan premium |
| Produk Olahan | Produk turunan siap ekspor |

**Informasi per Produk:**
- Nama dan deskripsi produk
- Spesifikasi teknis (kadar air, kadar kotoran, dll)
- Gambar produk
- Status ketersediaan

**Cara Memesan:**
1. Pilih produk yang diminati di halaman `/products`
2. Klik kartu produk untuk detail lengkap
3. Gunakan tombol **"Hubungi Sales"** atau kunjungi `/contact`

---

### 3.9 Sertifikasi

**URL:** `/certifications`

Halaman yang menampilkan seluruh sertifikasi internasional yang dimiliki UPK Seaweed sebagai bukti komitmen terhadap kualitas.

**Sertifikasi yang ditampilkan:**
- **HACCP** — Hazard Analysis Critical Control Points
- **Halal** — Sertifikasi MUI untuk produk halal
- **Organik** — Sertifikasi produk organik
- Sertifikasi internasional lainnya

Setiap sertifikat menampilkan nama, lembaga penerbit, dan masa berlaku.

---

### 3.10 Berita & Artikel

**URL:** `/news` | Detail: `/news/{slug}`

Portal informasi terkini seputar industri rumput laut, kebijakan, dan kegiatan UPK Seaweed.

**Fitur:**
- Daftar artikel terbaru (9 artikel per halaman)
- Halaman detail artikel lengkap
- **Penghitung Tampilan (View Counter)** — Otomatis bertambah setiap artikel dibuka
- **Fitur Like** — Pembaca dapat memberikan apresiasi pada artikel
- **Komentar & Balasan** — Sistem komentar bersarang (nested comments)

**Cara Berkomentar:**
1. Buka artikel di `/news/{slug}`
2. Scroll ke bagian bawah artikel
3. Isi formulir: Nama, Email (opsional), dan Komentar
4. Klik **"Kirim Komentar"**
5. Komentar akan langsung tampil (auto-approved)

**Cara Membalas Komentar:**
1. Klik tombol **"Balas"** di bawah komentar yang ingin dibalas
2. Isi formulir balasan yang muncul
3. Klik **"Kirim Balasan"**

---

### 3.11 Galeri

**URL:** `/gallery`

Halaman visual yang menampilkan foto-foto aktivitas produksi, fasilitas, dan kegiatan UPK Seaweed.

**Fitur:**
- Tampilan grid foto yang responsif
- Kategori foto (produksi, fasilitas, kegiatan, dll)
- Informasi caption dan deskripsi setiap foto

---

### 3.12 Kontak

**URL:** `/contact`

Halaman informasi kontak dan formulir komunikasi.

**Informasi Kontak:**
- **Alamat:** Jl. Setro Barat, Pangkahkulon, Ujungpangkah, Gresik, Jawa Timur
- **WhatsApp Sales:** +62 822-2821-4233
- **Website:** https://upkseaweed.id

**Cara Menghubungi:**
1. Buka halaman `/contact`
2. Isi formulir dengan nama, email, dan pesan Anda
3. Klik **"Kirim Pesan"**
4. Tim kami akan merespons dalam 1x24 jam

---

## 4. AI Chatbot — Seaweed Intelligence

Widget chatbot tersedia di **seluruh halaman** website, ditandai dengan ikon gelembung percakapan di pojok kanan bawah layar.

### Cara Menggunakan Chatbot

**Langkah 1:** Klik ikon chatbot (💬) di pojok kanan bawah layar.

**Langkah 2:** Pilih salah satu opsi menu yang tersedia, atau ketik pertanyaan secara bebas.

**Langkah 3:** Chatbot akan merespons dalam hitungan detik dalam bahasa yang sama dengan pertanyaan Anda.

### Kemampuan Chatbot
- Menjawab pertanyaan tentang produk dan spesifikasi
- Memberikan informasi harga dan cara pemesanan
- Menjelaskan proses ekspor dan sertifikasi
- Menjawab pertanyaan umum tentang UPK Seaweed
- Berkomunikasi dalam 15+ bahasa internasional

### Teknologi AI
| Model | Keterangan |
|---|---|
| `openrouter/free` | Model utama (fallback otomatis) |
| `mistralai/mistral-7b-instruct:free` | Model cadangan 1 |
| `microsoft/phi-3-mini-128k-instruct:free` | Model cadangan 2 |
| `qwen/qwen-2-7b-instruct:free` | Model cadangan 3 |

> Sistem menggunakan **fallback otomatis**: jika satu model tidak tersedia, sistem akan mencoba model berikutnya secara otomatis.

### Memori Percakapan
Chatbot menyimpan riwayat percakapan (maksimal 10 pesan terakhir) selama sesi berlangsung, sehingga dapat memahami konteks percakapan sebelumnya.

---

## 5. Panel Admin (Backend Filament)

Panel admin digunakan oleh administrator untuk mengelola seluruh konten website. Navigasi sidebar dikelompokkan menjadi beberapa grup:

| Grup Navigasi | Menu yang Tersedia |
|---|---|
| **Catalog** | Products, Certifications |
| **Management** | Regulations, Education Modules, Team Members |
| **AI Support** | Chatbot Options |
| **System** | Settings |
| *(Umum)* | Articles, Hero Slides, Galleries |

---

### 5.1 Login Admin

**URL:** `/admin`

**Langkah Login:**
1. Buka browser dan kunjungi `https://upkseaweed.id/admin`
2. Masukkan **Email** dan **Password** akun admin
3. Klik tombol **"Sign In"**
4. Anda akan masuk ke **Dashboard Admin**

> **Keamanan:** Jangan bagikan kredensial admin kepada pihak yang tidak berwenang. Gunakan password yang kuat (minimal 12 karakter, kombinasi huruf, angka, dan simbol).

---

### 5.2 Manajemen Artikel

**Menu:** Sidebar → Articles  
**Halaman frontend:** `/news`

**Field yang tersedia saat membuat/mengedit artikel:**

| Field | Wajib | Keterangan |
|---|---|---|
| `title` | ✅ | Judul artikel |
| `slug` | ✅ | URL artikel (auto-generate dari judul) |
| `excerpt` | - | Ringkasan singkat artikel |
| `content` | ✅ | Isi lengkap artikel |
| `image_path` | - | Gambar thumbnail |
| `author` | - | Nama penulis |
| `published_at` | - | Tanggal & waktu publikasi |
| SEO Title | - | Judul untuk mesin pencari |
| SEO Description | - | Deskripsi untuk mesin pencari |
| SEO Keywords | - | Kata kunci SEO |

**Membuat Artikel Baru:**
1. Klik **"New Article"**
2. Isi **Title** dan **Slug** (slug otomatis terisi dari judul)
3. Isi **Excerpt** (ringkasan) dan **Content** (isi lengkap)
4. Upload **gambar thumbnail** di field `image_path`
5. Isi **Author** dan atur **Published At**
6. Isi bagian **SEO Section** di bagian bawah form
7. Klik **"Save"**

**Fitur di halaman daftar artikel:**
- Pencarian berdasarkan judul
- Hapus massal (bulk delete)

**Catatan:** Komentar pembaca dapat dilihat langsung di artikel. Untuk moderasi, hapus dari database jika diperlukan (belum ada UI moderasi khusus).

---

### 5.3 Manajemen Produk

**Menu:** Sidebar → Catalog → Products  
**Halaman frontend:** `/products`

**Terdiri dari 3 seksi form:**

#### Seksi 1 — Product Information

| Field | Wajib | Keterangan |
|---|---|---|
| `title` | ✅ | Nama produk (slug auto-generate) |
| `slug` | ✅ | URL unik produk |
| `grade_type` | ✅ | Pilihan: Cottonii / Spinosum / Gracilaria / SRC / Other |
| `description` | - | Deskripsi singkat produk (maks. 1000 karakter) |

#### Seksi 2 — Quality Specifications

| Field | Keterangan |
|---|---|
| `moisture_content` | Kadar air (contoh: `≤38%`) |
| `impurity_content` | Kadar kotoran (contoh: `≤2%`) |
| `packaging_details` | Detail kemasan (contoh: `50kg compressed bale`) |

#### Seksi 3 — Media & Settings

| Field | Keterangan |
|---|---|
| `image_path` | Gambar produk (rasio 16:9, maks. 2MB, auto-crop ke 1200×675px) |
| `is_active` | Toggle aktif/nonaktif (default: aktif) |
| `sort_order` | Urutan tampil (angka kecil = muncul pertama) |

**Membuat Produk:**
1. Klik **"New Product"**
2. Isi semua field di seksi **Product Information**
3. Isi spesifikasi di seksi **Quality Specifications**
4. Upload foto dan atur status di seksi **Media & Settings**
5. Isi SEO Section (opsional) di bagian bawah
6. Klik **"Save"**

**Filter di tabel produk:**
- Filter berdasarkan **grade_type** (Cottonii, Spinosum, Gracilaria, SRC)
- Filter berdasarkan status aktif/nonaktif

---

### 5.4 Manajemen Sertifikasi

**Menu:** Sidebar → Catalog → Certifications  
**Halaman frontend:** `/certifications` dan Beranda

**Field yang tersedia:**

#### Seksi — Certification Details

| Field | Wajib | Keterangan |
|---|---|---|
| `name` | ✅ | Nama sertifikasi (contoh: `ISO 9001:2015`, `HACCP`) |
| `issuing_body` | - | Lembaga penerbit (contoh: `SGS`, `BSI`, `Bureau Veritas`) |
| `year_acquired` | - | Tahun diperoleh (contoh: `2020`) |
| `description` | - | Deskripsi singkat sertifikasi |

#### Seksi — Media & Settings

| Field | Keterangan |
|---|---|
| `logo_path` | Logo/badge sertifikat (maks. 1MB) |
| `is_active` | Toggle aktif/nonaktif (default: aktif) |
| `sort_order` | Urutan tampil |

**Membuat Sertifikasi:**
1. Klik **"New Certification"**
2. Isi **Name** dan **Issuing Body**
3. Masukkan **Year Acquired** dan **Description**
4. Upload **logo sertifikat** di field `logo_path`
5. Atur status dan urutan, lalu klik **"Save"**

---

### 5.5 Manajemen Modul Edukasi

**Menu:** Sidebar → Management → Education Modules  
**Halaman frontend:** `/education`

**Field yang tersedia:**

#### Seksi — Module Info

| Field | Wajib | Keterangan |
|---|---|---|
| `title` | ✅ | Judul modul |
| `description` | - | Deskripsi lengkap modul |

#### Seksi — Appearance & Link

| Field | Keterangan |
|---|---|
| `image_path` | Banner/gambar modul |
| `link` | URL tautan materi eksternal |
| `icon` | SVG string atau nama ikon |
| `color` | Kelas warna gradien Tailwind (contoh: `from-upkgreen/20 to-blue-500/20`) |
| `is_active` | Toggle aktif/nonaktif (default: aktif) |
| `sort_order` | Urutan tampil |

**Membuat Modul:**
1. Klik **"New Education Module"**
2. Isi **Title** dan **Description**
3. Upload **Banner Image** dan isi **Link** materi (jika ada)
4. Isi **Icon** dan **Color** untuk tampilan kartu (opsional)
5. Atur status dan urutan, lalu klik **"Save"**

---

### 5.6 Manajemen Regulasi

**Menu:** Sidebar → Management → Regulations  
**Halaman frontend:** `/regulations`

**Field yang tersedia:**

#### Seksi — Regulation Details

| Field | Wajib | Keterangan |
|---|---|---|
| `title` | ✅ | Judul regulasi/dokumen |
| `description` | - | Penjelasan isi regulasi |
| `category` | - | Kategori (contoh: `AD/ART`, `Policy`, `Export Regulation`) |

#### Seksi — Source & Status

| Field | Keterangan |
|---|---|
| `file_path` | Upload file PDF (maks. 10MB) |
| `external_link` | URL sumber eksternal (jika tidak upload PDF) |
| `is_active` | Toggle aktif/nonaktif (default: aktif) |
| `sort_order` | Urutan tampil |

**Membuat Regulasi:**
1. Klik **"New Regulation"**
2. Isi **Title**, **Description**, dan **Category**
3. Upload file **PDF** atau isi **External Link**
4. Atur status dan urutan, lalu klik **"Save"**

---

### 5.7 Manajemen Tim

**Menu:** Sidebar → Management → Team Members  
**Halaman frontend:** `/structure`

**Field yang tersedia:**

#### Seksi — Member Information

| Field | Wajib | Keterangan |
|---|---|---|
| `name` | ✅ | Nama lengkap anggota |
| `position` | ✅ | Jabatan |
| `address` | - | Alamat |
| `phone` | - | Nomor telepon |

#### Seksi — Media & Status

| Field | Keterangan |
|---|---|
| `photo_path` | Foto profil (disimpan di folder `team/`) |
| `sort_order` | Urutan tampil |
| `is_active` | Toggle aktif/nonaktif |

**Menambah Anggota Tim:**
1. Klik **"New Team Member"**
2. Isi **Name** dan **Position** (wajib)
3. Isi **Address** dan **Phone** (opsional)
4. Upload **Photo** di seksi Media & Status
5. Atur urutan dan status, lalu klik **"Save"**

---

### 5.8 Manajemen Hero Slide

**Menu:** Sidebar → Hero Slides  
**Halaman frontend:** Beranda (bagian atas/banner)

**Field yang tersedia:**

#### Seksi — Content

| Field | Wajib | Keterangan |
|---|---|---|
| `title` | ✅ | Teks judul besar pada slide (contoh: `INDONESIA SEAWEED INDUSTRIAL HUB`) |
| `subtitle` | - | Teks subjudul di bawah judul (maks. 500 karakter) |

#### Seksi — Media & CTA

| Field | Wajib | Keterangan |
|---|---|---|
| `image_path` | ✅ | Gambar latar slide (disimpan di folder `hero/`) |
| `cta_text` | - | Teks tombol CTA (contoh: `Explore Catalog`) |
| `cta_link` | - | URL tujuan tombol (contoh: `/products` atau `#contact`) |

#### Seksi — Settings

| Field | Keterangan |
|---|---|
| `sort_order` | Urutan tampil (angka kecil = muncul pertama) |
| `is_active` | Toggle aktif/nonaktif |

**Menambah Slide:**
1. Klik **"New Hero Slide"**
2. Isi **Hero Title** dan **Hero Subtitle**
3. Upload **Background Image** (disarankan 1920×1080px, format JPG/WebP)
4. Isi **Button Text** dan **Button Link** untuk CTA (opsional)
5. Atur **Sort Order** dan aktifkan, lalu klik **"Save"**

> **Tips:** Gunakan gambar landscape berkualitas tinggi. Hindari gambar terlalu terang agar teks tetap terbaca.

---

### 5.9 Manajemen Galeri

**Menu:** Sidebar → Galleries  
**Halaman frontend:** `/gallery`

**Field yang tersedia:**

| Field | Wajib | Keterangan |
|---|---|---|
| `title` | ✅ | Judul/caption foto |
| `category` | - | Kategori foto (contoh: `Production`, `Facility`, `Event`) |
| `description` | - | Deskripsi foto |
| `image_path` | ✅ | File gambar (disimpan di folder `gallery/`) |
| `is_active` | - | Toggle aktif/nonaktif (default: aktif) |
| `sort_order` | - | Urutan tampil |
| SEO Section | - | Alt text dan metadata SEO per foto |

**Menambah Foto Galeri:**
1. Klik **"New Gallery Item"**
2. Isi **Title** (caption foto) — wajib
3. Isi **Category** dan **Description** (opsional)
4. Upload **Foto** di field `image_path` — wajib
5. Atur **Sort Order** dan aktifkan
6. Isi **SEO Section** untuk alt text (sangat disarankan)
7. Klik **"Save"**

---

### 5.10 Konfigurasi Chatbot

**Menu:** Sidebar → AI Support → Chatbot Options

Mengelola menu pilihan yang ditampilkan dalam widget chatbot di semua halaman.

**Tipe opsi chatbot:**

| Tipe | Label di Form | Cara Kerja |
|---|---|---|
| `message` | Text Response | Menampilkan teks statis yang sudah diisi di field `response` |
| `link` | Direct Link | Mengarahkan pengguna ke URL tertentu |
| `gemini_prompt` | AI Prompt (Gemini) | Mengirimkan prompt ke AI dan menampilkan jawaban dinamis |

**Field yang tersedia:**

| Field | Wajib | Keterangan |
|---|---|---|
| `label` | ✅ | Teks menu yang muncul di chatbot (maks. 255 karakter) |
| `type` | ✅ | Pilih: `message`, `link`, atau `gemini_prompt` |
| `response` | Jika `message` | Teks balasan statis (hanya muncul jika tipe = message) |
| `value` | Jika `link`/`gemini_prompt` | URL atau teks prompt AI (muncul sesuai tipe) |
| `order` | - | Urutan tampil menu di chatbot (angka kecil = atas) |
| `is_active` | - | Toggle aktif/nonaktif (default: aktif) |

**Membuat Opsi Menu Chatbot:**
1. Klik **"New Chatbot Option"**
2. Isi **Label** — teks yang ditampilkan sebagai tombol di chatbot
3. Pilih **Type**:
   - `Text Response` → isi field **Response** dengan teks balasan
   - `Direct Link` → isi field **URL Link** 
   - `AI Prompt (Gemini)` → isi field **Custom AI Prompt**
4. Atur **Order** dan aktifkan
5. Klik **"Save"**

**Konfigurasi API Key OpenRouter:**
1. Buka **System → Settings**
2. Cari key `chatbot_openrouter_api_key`
3. Klik baris tersebut → ubah **Value** dengan API Key dari https://openrouter.ai
4. Klik **"Save"**

---

### 5.11 Pengaturan Sistem & SEO

**Menu:** Sidebar → System → Settings

Pusat konfigurasi utama seluruh aspek website. Setiap pengaturan disimpan sebagai pasangan `key` dan `value`.

**Daftar Key Pengaturan Penting:**

**Identitas Website:**
| Key | Keterangan | Contoh Value |
|---|---|---|
| `site_name` | Nama website | `UPK Seaweed Industrial Hub` |
| `site_description` | Deskripsi singkat website | `Platform ekspor rumput laut...` |
| `contact_address` | Alamat kantor | `Jl. Setro Barat, Gresik` |
| `whatsapp_number` | Nomor WhatsApp Sales (tidak diterjemahkan) | `6282228214233` |

**Statistik Beranda:**
| Key | Keterangan | Contoh Value |
|---|---|---|
| `stats_production` | Total produksi | `1,240` |
| `stats_countries` | Jumlah negara ekspor | `12` |
| `stats_farmers` | Jumlah petani mitra | `450+` |
| `stats_impact` | Dampak ekonomi | `$3.2M` |

**SEO Per Halaman:**
| Key | Keterangan |
|---|---|
| `seo_home_title` | Judul SEO halaman beranda |
| `seo_home_desc` | Deskripsi SEO beranda |
| `seo_home_keywords` | Kata kunci SEO beranda |
| `seo_products_title` | Judul SEO halaman produk |
| `seo_gallery_title` | Judul SEO halaman galeri |

**Profil Perusahaan:**
| Key | Keterangan |
|---|---|
| `compro_history` | Sejarah perusahaan |
| `compro_vision` | Visi perusahaan |
| `compro_mission` | Misi perusahaan |
| `compro_values` | Nilai-nilai perusahaan |
| `compro_foreword` | Sambutan pimpinan |
| `compro_expansion_plan` | Rencana ekspansi |

**AI Chatbot:**
| Key | Keterangan |
|---|---|
| `chatbot_openrouter_api_key` | API Key dari openrouter.ai |

**Cara Mengubah Pengaturan:**
1. Buka **System → Settings**
2. Gunakan kolom pencarian untuk menemukan key yang diinginkan
3. Klik baris pengaturan → ubah nilai di field **Value**
4. Klik **"Save"**

> **Catatan Lokalisasi:** Tambahkan sufiks bahasa untuk versi terlokalisasi. Contoh: `site_name_en` (Inggris), `site_name_ar` (Arab), `compro_vision_id` (Indonesia). Jika versi terlokalisasi tidak ada, sistem akan menerjemahkan otomatis dari value default.

---

## 6. Fitur Multibahasa

Website UPK Seaweed mendukung **15 bahasa internasional** untuk menjangkau pasar global:

| Kode | Bahasa | Kode | Bahasa |
|---|---|---|---|
| `id` | Bahasa Indonesia | `ar` | Arab |
| `en` | Inggris | `ja` | Jepang |
| `zh` | Mandarin | `ko` | Korea |
| `de` | Jerman | `nl` | Belanda |
| `fr` | Prancis | `pt` | Portugis |
| `es` | Spanyol | `ru` | Rusia |
| `it` | Italia | `tr` | Turki |
| `vi` | Vietnam | | |

**Cara Mengganti Bahasa:**
- Pilih bahasa dari menu dropdown bahasa di navigasi website
- Website akan otomatis menyesuaikan seluruh konten

**Sistem Penerjemahan Otomatis:**
- Konten yang belum diterjemahkan secara manual akan diterjemahkan otomatis menggunakan **TranslationService** bawaan
- Kolom seperti nomor WhatsApp dan email tidak diterjemahkan untuk menjaga integritas data

---

## 7. Aplikasi Android

Platform UPK Seaweed tersedia dalam versi **aplikasi Android** untuk memudahkan akses mobile.

- **Link Download:** https://upkseaweed.id/upk.apk

**Cara Instalasi:**
1. Buka tautan download di perangkat Android Anda
2. Setelah file APK terunduh, buka file tersebut
3. Jika muncul peringatan, pilih **"Pengaturan"** → aktifkan **"Instalasi dari Sumber Tidak Dikenal"**
4. Kembali dan ketuk **"Install"**
5. Tunggu proses instalasi selesai
6. Buka aplikasi dari layar utama ponsel Anda

> **Persyaratan:** Android 7.0 (Nougat) atau lebih baru.

---

## 8. Panduan Instalasi

### Pengembangan Lokal

**Persyaratan Sistem:**
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL / MariaDB

**Langkah Instalasi:**

```bash
# 1. Clone repository
git clone https://github.com/esnpendosa/upkseaweed.git
cd upkseaweed

# 2. Install dependensi PHP
composer install

# 3. Install dependensi Node.js
npm install

# 4. Salin file konfigurasi
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Sesuaikan konfigurasi di file .env
# DB_DATABASE, DB_USERNAME, DB_PASSWORD
# OPENROUTER_API_KEY (untuk AI Chatbot)

# 7. Migrasi database dan isi data awal
php artisan migrate --seed

# 8. Buat symbolic link storage
php artisan storage:link

# 9. Jalankan aplikasi
php artisan serve
npm run dev
```

### Konfigurasi .env Penting

```env
APP_URL=http://localhost
DB_DATABASE=upkseaweed
DB_USERNAME=root
DB_PASSWORD=

OPENROUTER_API_KEY=sk-or-xxxxxxxxxxxx
```

### Deployment (Shared Hosting)

1. Upload seluruh file ke hosting (arahkan document root ke folder `public/`)
2. Import database dan jalankan migrasi
3. Sesuaikan `.env` dengan kredensial hosting
4. Akses `https://yourdomain.com/storage-link` sekali untuk membuat symlink storage
5. Pastikan PHP versi minimal **8.2** aktif di hosting

---

## 9. Kontak & Dukungan

Untuk pertanyaan teknis, pemesanan skala besar, atau kemitraan bisnis:

| Saluran | Informasi |
|---|---|
| 🌐 Website | https://upkseaweed.id |
| 📱 WhatsApp | [+62 822-2821-4233](https://wa.me/6282228214233) |
| 📍 Lokasi | Jl. Setro Barat, Pangkahkulon, Ujungpangkah, Gresik, Jawa Timur |

---

<p align="center">
  <strong>Industrializing the Blue Economy with ❤️ from Indonesia</strong><br>
  © 2026 UPK Seaweed Industrial Hub. Seluruh hak cipta dilindungi.
</p>
