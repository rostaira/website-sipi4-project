# Sistem Informasi Peminjaman Tempat - Politeknik Negeri Cilacap (SIPI4)

Sistem berbasis web ini dirancang untuk mengelola dan memfasilitasi proses peminjaman tempat/fasilitas di lingkungan Politeknik Negeri Cilacap secara terstruktur dan efisien.

## Hak Akses (Role) & Fitur Login

Sistem ini mendukung 3 role pengguna dengan alur masuk (login) tersendiri:

*   **Admin**: Pengelola utama sistem yang bertugas mengontrol data tempat, serta mengelola akun pengguna.
*   **Pengguna Internal (Mahasiswa & Satpam)**:
    *   Mengakses sistem melalui **jalur login internal**.
    *   Menggunakan akun yang **telah dibuatkan dan didaftarkan langsung oleh Admin**.
*   **Pengguna Eksternal (Pihak Luar)**:
    *   Mengakses sistem melalui **jalur login eksternal**.
    *   Wajib melakukan **registrasi akun terlebih dahulu** sebelum dapat mengajukan peminjaman.

---

## Fitur Utama

*   **Form Peminjaman Tempat**: Pengisian formulir pengajuan peminjaman lokasi secara online beserta detail keperluan dan tanggal peminjaman.
*   **Jadwal Peminjaman**: Modul untuk mengecek ketersediaan tempat dan jadwal peminjaman yang sedang/akan berlangsung agar tidak terjadi *clash* atau peminjaman ganda.
*   **Pemisahan Alur Login**: Halaman login yang terpisah antara pengguna internal dan pihak eksternal untuk menjaga keamanan serta validasi data.

---

## Teknologi yang Digunakan

*   **Framework**: [CodeIgniter 4](https://codeigniter.com)
*   **Bahasa Pemrograman**: PHP (v8.1+)
*   **Database**: MySQL / MariaDB

---

## Cara Instalasi & Menjalankan Proyek

1. **Clone Repository**
   ```bash
   git clone [https://github.com/rostaira/website-sipi4-project.git](https://github.com/rostaira/website-sipi4-project.git)
   cd website-sipi4-project
