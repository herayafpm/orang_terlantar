#######################
Website Orang Terlantar
#######################

Website orang terlantar adalah, sebuah website pelayanan untuk pendaftaran orang terlantar, yang nantinya data tersebut dapat digunakan untuk diberikan bantuan kepada orang terlantar yang telah terdaftar

########################
Pengembangan selanjutnya
########################

- Fungsi input data orang terlantar otomatis berdasarkan NIK atau foto
- Fungsi perhitungan untuk menentukan apakah data orang terlantar valid dan berhak mendapatkan bantuan

**************************
Fitur User Biasa
**************************

- Pendaftaran Akun untuk mendaftarkan orang terlantar
- Login Website
- Pendaftaran Orang Terlantar
- Riwayat Orang terlantar yang telah didaftarkan
- Ubah Password Akun

**************************
Fitur Admin
**************************

- Login Admin
- Verifikasi pendaftaran akun
- Verifikasi data orang terlantar yang didaftarkan
- Laporan dalam bentuk print maupun excel
- Ubah profile akun admin
- Catatan Login

**************************
Fitur Superadmin
**************************

- Semua fitur admin
- Manajemen data admin
- Manajemen data master

*******************
Kebutuhan Server
*******************

- PHP versi 7
- Database Mysql / PostgreSql


************
Instalasi
************

1. Ubah username, password, dan database di file application/config/database.php dan ubah dbdrivernya menjadi mysqli untuk MySql atau postgre untuk PostgreSql

2. Silahkan run website menggunakan Xampp atau Laragon, pastikan extension PHP pdo_pgsql dan pgsql sudah diaktifkan untuk yang menggunakan database PostgreSql, untuk Mysql tidak usah disetting extensionnya

3. silahkan buka browser dan arahkan ke link http://urlwebsite/migrate, pastikan database sudah dibuat dan tidak ada table yang ada

4. selesai

*******
Lisensi
*******

Cek link ini untuk melihat lisensi Codeigniter `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

Lisensi admin panel `Architect UI admin panel <https://architectui.com>`_.

Lisensi ui user biasa `Presento <https://bootstrapmade.com/presento-bootstrap-corporate-template/>`_.

*********
Resources
*********

-  `Codeigniter User Guide <https://codeigniter.com/docs>`_

Laporkan isu keamanan ke `Email kerentanan aplikasi <mailto:herayafpm@gmail.com>`_
Terima kasih.