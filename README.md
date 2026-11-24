# Lab9Web - PHP Modular

Praktikum 9 Pemrograman Web: modularisasi program, function, template, dan routing sederhana
pada aplikasi CRUD pengguna.

## Tujuan Project
- Memisahkan aplikasi PHP ke dalam file/direktori sesuai tanggung jawab.
- Menggunakan template (header/footer) bersama.
- Menyusun function helper yang dapat dipakai ulang.
- Menerapkan router berbasis parameter `page` dengan whitelist dan halaman 404.
- Mengintegrasikan struktur modular dengan aplikasi CRUD database.

## Kebutuhan Perangkat
- PHP 8.0+
- Apache + MySQL/MariaDB (XAMPP / Laragon)
- Browser
- Visual Studio Code
- Git

## Cara Menjalankan
1. Salin folder `Lab9Web` ke `htdocs` (XAMPP) atau `www` (Laragon).
2. Jalankan Apache dan MySQL.
3. Import `database/db_latihan.sql` melalui phpMyAdmin.
4. Sesuaikan kredensial di `config/database.php` bila perlu.
5. Buka `http://localhost/Lab9Web/index.php`.

## Struktur Direktori
```
Lab9Web/
├── index.php            # router / titik masuk
├── .htaccess            # URL rewrite (opsional)
├── config/database.php  # koneksi database (PDO)
├── views/               # header, footer, dashboard, 404
├── helpers/functions.php
├── modules/
│   ├── page/            # profil, kontak, helper
│   └── user/            # list, add, edit, delete
├── assets/css, assets/js
├── database/db_latihan.sql
└── latihan/             # percobaan include/require & function
```

## Daftar Rute
| Rute | File | Keterangan |
|------|------|------------|
| `dashboard` (default) | views/dashboard.php | Ringkasan aplikasi |
| `profil` | modules/page/profil.php | Halaman profil |
| `kontak` | modules/page/kontak.php | Halaman kontak |
| `helper` | modules/page/helper.php | Demo function helper |
| `user/list` | modules/user/list.php | Daftar pengguna |
| `user/add` | modules/user/add.php | Tambah pengguna |
| `user/edit` | modules/user/edit.php | Ubah pengguna (`&id=`) |
| `user/delete` | modules/user/delete.php | Hapus pengguna (hanya POST) |

Rute yang tidak terdaftar menampilkan halaman 404 dengan status HTTP 404.

## Fitur Keamanan
- Whitelist rute (input `page` tidak dipakai langsung sebagai path file).
- `htmlspecialchars` melalui helper `e()` untuk mencegah XSS.
- Prepared statement PDO untuk mencegah SQL Injection.
- Hapus/ubah data lewat POST + token CSRF.

## Langkah Praktikum
1. Percobaan include vs require (`latihan/uji-include.php`).
2. Membuat template header/footer dan beberapa halaman (Latihan 1).
3. Membuat function dan memindahkannya ke `helpers/functions.php` (Latihan 2).
4. Menyusun struktur direktori modular.
5. Membuat router dengan whitelist dan halaman 404 (Latihan 3).
6. Refactoring CRUD ke struktur modular (Latihan 4).
7. Menambahkan menu aktif, flash message, dan `.htaccess` (tantangan).

## Kendala dan Solusi
| Kendala | Solusi |
Kendala yang Ditemukan dan Cara Mengatasinya pada Pembuatan Website PHP Modular
Dalam proses pembuatan website PHP Modular menggunakan PHP, MySQL, dan XAMPP, terdapat beberapa kendala yang ditemukan. Kendala tersebut dapat diatasi melalui pemeriksaan kode program, perbaikan struktur folder, dan pengujian secara bertahap.
1. Kendala koneksi database
Kendala:
Pada awal pembuatan website, terjadi kendala ketika PHP mencoba menghubungkan aplikasi dengan database MySQL. Kesalahan konfigurasi nama database, username, atau koneksi dapat menyebabkan data tidak dapat ditampilkan.

Cara mengatasi:
Memeriksa konfigurasi koneksi pada file config/database.php, memastikan Apache dan MySQL pada XAMPP berjalan, serta memastikan nama database yang digunakan sesuai dengan database yang tersedia di phpMyAdmin.
2. Kendala tabel database tidak ditemukan
Kendala:
Website mengalami error ketika mengambil data pengguna karena tabel users belum tersedia atau nama tabel tidak sesuai dengan query yang digunakan.

Cara mengatasi:
Membuat database dan tabel yang diperlukan melalui phpMyAdmin, kemudian menyesuaikan query SQL pada program PHP agar sesuai dengan struktur database.
3. Kendala struktur folder dan pemanggilan file
Kendala:
Terjadi kesalahan ketika memanggil file PHP dari folder yang berbeda, seperti file header.php, footer.php, modul halaman, dan file helper. Kesalahan lokasi file menyebabkan halaman tidak dapat ditampilkan dengan benar.

Cara mengatasi:
Menyusun struktur folder secara teratur dan menggunakan include atau require dengan lokasi file yang sesuai agar setiap file dapat dipanggil dengan benar.
4. Kendala routing halaman
Kendala:
Ketika berpindah halaman seperti Dashboard, Profil, Kontak, Helper, dan Pengguna, terkadang halaman tidak ditemukan atau tidak menampilkan konten yang sesuai.

Cara mengatasi:
Memeriksa sistem routing pada index.php, memastikan parameter halaman yang dikirim melalui URL sesuai dengan modul yang tersedia, serta memastikan setiap halaman sudah terdaftar pada sistem routing.
5. Kendala fungsi helper
Kendala:
Beberapa fungsi helper tidak dapat berjalan dengan baik ketika dipanggil karena kesalahan penulisan nama fungsi, parameter yang tidak sesuai, atau file helper belum dimuat.

Cara mengatasi:
Memeriksa kembali deklarasi fungsi pada helpers/functions.php, memastikan file tersebut dipanggil sebelum fungsi digunakan, serta menguji setiap fungsi secara terpisah.
6. Kendala tampilan website (CSS)
Kendala:
Tampilan website awalnya masih sederhana dan kurang menarik. Selain itu, perubahan CSS yang dilakukan tidak langsung terlihat pada browser, sehingga menyebabkan kebingungan saat memperbaiki tampilan.

Cara mengatasi:
Memperbarui desain CSS dengan menyesuaikan warna, ukuran teks, jarak antar elemen, card, tabel, tombol, dan navigasi. Selain itu, melakukan refresh browser menggunakan Ctrl + F5 untuk memastikan browser memuat CSS terbaru.
7. Kendala pengujian website
Kendala:
Pada saat melakukan pengujian, terdapat beberapa halaman yang belum menampilkan hasil sesuai dengan yang diharapkan, baik dari segi data, navigasi, maupun tampilan.

Cara mengatasi:
Melakukan pengujian setiap halaman secara bertahap melalui browser, memeriksa pesan error, memastikan link berfungsi, serta mengecek kembali kode PHP, CSS, dan database apabila terjadi kesalahan.

Kesimpulan
Dalam pembuatan website PHP Modular, kendala yang ditemukan meliputi koneksi database, struktur folder, routing, penggunaan fungsi helper, tampilan CSS, dan pengujian program. Kendala tersebut dapat diatasi dengan melakukan pengecekan kode secara teliti, memperbaiki konfigurasi, menyusun file secara terstruktur, serta menguji setiap fitur secara bertahap. Dengan proses tersebut, website dapat berjalan lebih baik, mudah dipelihara, dan memiliki struktur program yang lebih terorganisir.

Jika ini untuk laporan praktikum, bagian ini sudah bisa kamu masukkan ke laporan sebagai “Kendala yang Ditemukan dan Solusi”.

## Screenshot

<img width="1920" height="1080" alt="Screenshot (227)" src="https://github.com/user-attachments/assets/5308a35f-5569-476b-b2a0-b417417d4df0" />
<img width="1920" height="1080" alt="Screenshot (228)" src="https://github.com/user-attachments/assets/424c8d41-91a6-42e8-bf91-fcdb8bbcd9bd" />
<img width="1920" height="1080" alt="Screenshot (229)" src="https://github.com/user-attachments/assets/ddc32dc4-d49a-4765-9444-07586391d060" />
<img width="1920" height="1080" alt="Screenshot (230)" src="https://github.com/user-attachments/assets/af56117c-e1e8-44d8-a3aa-39ab4bf116d4" />
<img width="1920" height="1080" alt="Screenshot (237)" src="https://github.com/user-attachments/assets/4aaa2066-3c96-4d45-ac5b-9e6a94ce0d06" />
<img width="1920" height="1080" alt="Screenshot (238)" src="https://github.com/user-attachments/assets/749fde1e-e9e5-4504-8f6a-6f9a34eb8715" />
<img width="1920" height="1080" alt="Screenshot (239)" src="https://github.com/user-attachments/assets/c74c52de-9cab-4307-b3d8-fce9babc8c7e" />
<img width="1920" height="1080" alt="Screenshot (240)" src="https://github.com/user-attachments/assets/d5750f38-b00e-4d90-be80-5aad14e6bc9d" />
<img width="1920" height="1080" alt="Screenshot (241)" src="https://github.com/user-attachments/assets/4728a4a5-b5b1-4682-b90b-5e62b594e35a" />

1. Jelaskan pengertian modularisasi program dan minimal tiga manfaatnya.
Modularisasi program adalah teknik membagi program menjadi beberapa bagian atau modul berdasarkan fungsi dan tugas masing-masing, sehingga program lebih terstruktur dan mudah dikelola.

Manfaat modularisasi antara lain:
- Memudahkan pemeliharaan: kode lebih mudah diperbaiki ketika terjadi kesalahan.
- Mengurangi pengulangan kode: fungsi atau komponen dapat digunakan kembali.
- Mempermudah pengembangan: setiap modul dapat dikembangkan secara terpisah tanpa harus mengubah seluruh program.
2. Apa perbedaan include dan require ketika file yang dipanggil tidak ditemukan?
- include: menghasilkan peringatan (warning) jika file tidak ditemukan, tetapi program masih dapat melanjutkan eksekusi.
- require: menghasilkan kesalahan fatal sehingga eksekusi program dihentikan jika file yang dipanggil tidak ditemukan.
3. Mengapa require_once sesuai digunakan untuk memuat konfigurasi database?
require_once digunakan agar file konfigurasi database hanya dimuat satu kali, sehingga mencegah deklarasi ulang variabel, koneksi, atau fungsi yang dapat menyebabkan error. Hal ini penting karena konfigurasi database biasanya digunakan oleh banyak halaman dalam aplikasi.
4. Jelaskan perbedaan parameter, argumen, dan nilai return pada function.
- Parameter: variabel yang ditentukan dalam deklarasi function untuk menerima data.
- Argumen: nilai yang diberikan ketika function dipanggil.
- Return: nilai hasil yang dikembalikan oleh function kepada pemanggil.
Contoh:
function hitungTotal($harga, $jumlah)
{
    return $harga * $jumlah;
}

$total = hitungTotal(25000, 4);
echo $total;


Penjelasan:
- $harga dan $jumlah adalah parameter.
- 25000 dan 4 adalah argumen.
- return $harga * $jumlah adalah nilai yang dikembalikan.
- Hasilnya adalah 100000.
5. Mengapa header dan footer sebaiknya dipisahkan dari konten halaman?
Header dan footer sebaiknya dipisahkan agar komponen yang sama dapat digunakan di berbagai halaman tanpa harus menulis ulang kode. Pemisahan ini juga membuat struktur website lebih konsisten, mempermudah perubahan tampilan, dan mengurangi duplikasi kode.
6. Apa fungsi index.php pada pola routing yang dipraktikkan?
index.php berfungsi sebagai pusat pengendali aplikasi atau front controller. File ini menerima permintaan dari pengguna, membaca parameter halaman, menentukan halaman yang akan ditampilkan, memuat komponen yang diperlukan, dan mengatur alur navigasi aplikasi.
7. Mengapa router sebaiknya menggunakan whitelist rute?
Whitelist rute digunakan untuk membatasi halaman yang boleh diakses hanya pada rute yang telah ditentukan. Hal ini meningkatkan keamanan aplikasi, mencegah akses ke file yang tidak seharusnya, dan memastikan pengguna hanya dapat membuka halaman yang tersedia dalam sistem.
8. Apa risiko jika input page langsung digabungkan menjadi path file yang di-require?
Risikonya adalah Path Traversal, yaitu pengguna dapat memanipulasi parameter page untuk mencoba mengakses file di luar direktori aplikasi. Hal ini dapat menyebabkan file sensitif terbaca atau file PHP yang tidak seharusnya dijalankan. Oleh karena itu, input halaman harus divalidasi menggunakan whitelist sebelum file dipanggil.
9. Apa fungsi aturan RewriteCond dan RewriteRule pada .htaccess?
- RewriteCond berfungsi menentukan kondisi yang harus terpenuhi sebelum aturan pengalihan URL dijalankan.
- RewriteRule berfungsi mengubah atau mengarahkan URL yang diminta berdasarkan pola tertentu.
Keduanya digunakan untuk mengatur URL agar lebih sederhana, mengarahkan permintaan ke file tertentu, dan mendukung sistem routing pada aplikasi web.
10. Sebutkan bagian aplikasi CRUD yang paling tepat dipindahkan ke config, views, helpers, dan modules.
Folder	Bagian aplikasi yang ditempatkan	Fungsi
config	Konfigurasi database dan pengaturan aplikasi	Mengatur koneksi dan konfigurasi sistem
views	Header, footer, dashboard, template tampilan	Menampilkan antarmuka kepada pengguna
helpers	Fungsi format Rupiah, validasi, URL, dan fungsi umum	Membantu proses aplikasi agar kode dapat digunakan kembali
modules	CRUD pengguna: list, add, edit, delete	Menangani fitur dan proses utama aplikasi

Dengan pembagian tersebut, aplikasi menjadi lebih modular, terstruktur, aman, dan mudah dikembangkan.


## Identitas
- Nama : Albert Maulana
- NIM  :312510162
  
