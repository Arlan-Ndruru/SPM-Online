# SPM-Online (Sistem Pendaftaran Mustahik Online)

SPM-Online adalah sebuah sistem berbasis web yang dibangun menggunakan framework Laravel untuk mendukung proses pendaftaran mustahik secara online di Baznas. Sistem ini menyediakan fitur multi-authentication dengan peran yang berbeda sesuai kebutuhan operasional Baznas.

## Fitur Utama
- **Multi-Authentication dengan Role Berbeda:**
  - **Admin:** Mengontrol alur dan mengelola pengguna dalam sistem.
  - **Ketua Baznas:** Memantau seluruh aktivitas dan proses pendaftaran di sistem.
  - **Staf Distributor:** Menyeleksi calon mustahik sesuai ketentuan Baznas.
  - **Resepsionis:** Mendaftarkan calon mustahik ke dalam sistem.
  - **Calon Mustahik:** Melakukan pendaftaran secara mandiri melalui sistem.

## Alur Sistem
1. **Pendaftaran:** Calon mustahik dapat mendaftar secara mandiri atau didaftarkan oleh resepsionis.
2. **Seleksi:** Staf distributor melakukan seleksi terhadap calon mustahik untuk menentukan kelayakan penerimaan sesuai ketentuan Baznas.
3. **Monitoring:** Ketua Baznas dapat memantau seluruh aktivitas dan proses seleksi di dalam sistem.
4. **Pengelolaan:** Admin memiliki hak penuh dalam mengontrol alur sistem dan mengelola data pengguna.

## Teknologi yang Digunakan
- **Laravel:** Sebagai framework backend utama.
- **Bootstrap:** Untuk mempercantik tampilan frontend.
- **Laratrust:** Sebagai package untuk mengatur role dan permission dalam multi-authentication.
- **Breeze:** Sebagai package untuk autentikasi sederhana di Laravel.

##Tampilan Sistem

-- **Dashboard**
![Dasboard](./public/Screenshot%2025-03-10%114413.png)
-- **Halaman Register**
![Register](./public/Screenshot%2025-03-10%114430.png)
-- **Data Mustahik**
![Data Mustahik](./public/Screenshot%2025-03-10%114605.png)

## Instalasi dan Konfigurasi
1. Clone repository ini:
   ```bash
   git clone git@github.com:username/SPM-Online.git
   ```
2. Masuk ke direktori proyek:
   ```bash
   cd SPM-Online
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Copy file environment:
   ```bash
   cp .env.example .env
   ```
5. Generate key aplikasi:
   ```bash
   php artisan key:generate
   ```
6. Jalankan migrasi dan seeder:
   ```bash
   php artisan migrate --seed
   ```
7. Jalankan server lokal:
   ```bash
   php artisan serve
   ```

## Kontak
Untuk informasi lebih lanjut, silakan hubungi saya melalui email: **arlan.j.ndr@gmail.com**

---

Terima kasih telah mengunjungi repository ini! Semoga proyek ini bermanfaat. 🙌

