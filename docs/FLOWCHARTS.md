# Flowcharts - UPK Seaweed Industrial Hub

Dokumen ini menjelaskan alur logika sistem dalam menangani interaksi pengguna dan manajemen konten.

## 1. Alur Interaksi AI Chatbot
Alur ini menjelaskan bagaimana pesan pengguna diproses oleh sistem, apakah melalui opsi menu statis atau melalui kecerdasan buatan (Gemini/Mistral).

```mermaid
graph TD
    A[Mulai] --> B{Pengguna Kirim Pesan}
    B -->|Klik Menu Opsi| C{Tipe Opsi?}
    B -->|Ketik Pesan Bebas| D[Panggil AI OpenRouter]
    
    C -->|Pesan Teks| E[Tampilkan Jawaban Statis]
    C -->|Prompt AI| F[Panggil AI OpenRouter]
    
    D --> G[Cek Riwayat Chat/Memory]
    F --> G
    G --> H[Kirim ke API OpenRouter]
    H --> I{Berhasil?}
    I -->|Ya| J[Tampilkan Jawaban AI]
    I -->|Tidak| K[Tampilkan Pesan Fallback/Error]
    
    E --> L[Selesai]
    J --> L
    K --> L
```

## 2. Alur Manajemen Konten (Admin)
Alur proses pembuatan hingga publikasi konten oleh administrator.

```mermaid
graph LR
    Admin[Administrator] --> Login[Login Panel Filament]
    Login --> Resource[Pilih Resource: Produk/Artikel/Tim]
    Resource --> Form[Isi Data/Upload Gambar]
    Form --> Validasi{Validasi Data?}
    Validasi -->|Gagal| Form
    Validasi -->|Berhasil| Simpan[Simpan ke Database]
    Simpan --> Publikasi[Tampil Otomatis di Halaman Publik]
```

## 3. Alur Navigasi Pengguna (Frontend)
Bagaimana pengguna berpindah dari satu halaman ke halaman lainnya.

```mermaid
graph TD
    Home[Beranda] --> Stats[Statistik]
    Home --> Trade[Trade Hub]
    Home --> LMS[Edukasi/LMS]
    Home --> News[Portal Berita]
    News --> Detail[Detail Artikel]
    Detail --> LikeComment[Like/Komentar]
    
    Home --> Chat[AI Chatbot]
    Chat --> Support[Bantuan Produk]
```
