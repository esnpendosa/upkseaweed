# Use Case - UPK Seaweed Industrial Hub

Dokumen ini menjelaskan interaksi antara aktor (pengguna) dan sistem UPK Seaweed.

## 1. Aktor
1.  **Pengunjung Publik**: Pengguna yang mengakses situs tanpa login.
2.  **Administrator**: Pengguna dengan hak akses khusus untuk mengelola konten melalui Panel Admin.

## 2. Use Case Diagram

```mermaid
usecaseDiagram
    actor "Pengunjung Publik" as User
    actor "Administrator" as Admin

    package "UPK Seaweed Platform" {
        usecase "Melihat Berita & Produk" as UC1
        usecase "Berinteraksi dengan AI Chatbot" as UC2
        usecase "Membaca Modul Edukasi" as UC3
        usecase "Memberi Like & Komentar" as UC4
        usecase "Mengelola Artikel & Produk" as UC5
        usecase "Mengatur Opsi Chatbot" as UC6
        usecase "Mengelola Anggota Tim" as UC7
        usecase "Mengatur SEO & Statistik" as UC8
    }

    User --> UC1
    User --> UC2
    User --> UC3
    User --> UC4

    Admin --> UC5
    Admin --> UC6
    Admin --> UC7
    Admin --> UC8
    Admin --|> User
```

## 3. Penjelasan Use Case

### A. Pengunjung Publik
| ID | Use Case | Deskripsi |
|---|---|---|
| UC1 | Melihat Berita & Produk | Pengguna menjelajahi katalog produk rumput laut dan membaca artikel berita terbaru. |
| UC2 | Berinteraksi dengan AI Chatbot | Pengguna menanyakan informasi produk atau bantuan teknis melalui chatbot "Seaweed Intelligence". |
| UC3 | Membaca Modul Edukasi | Pengguna mengakses materi pembelajaran seputar budidaya rumput laut di halaman LMS. |
| UC4 | Memberi Like & Komentar | Pengguna memberikan respon pada artikel berita untuk berpartisipasi dalam diskusi. |

### B. Administrator
| ID | Use Case | Deskripsi |
|---|---|---|
| UC5 | Mengelola Artikel & Produk | Menambah, mengubah, atau menghapus data produk dan artikel dari sistem. |
| UC6 | Mengatur Opsi Chatbot | Mengonfigurasi menu bantuan yang akan tampil pada chatbot serta mengelola API Key AI. |
| UC7 | Mengelola Anggota Tim | Memperbarui profil pengurus koperasi agar tetap akurat di halaman publik. |
| UC8 | Mengatur SEO & Statistik | Memperbarui metadata pencarian dan angka statistik produksi secara manual. |
