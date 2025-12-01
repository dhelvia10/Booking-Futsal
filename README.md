
 ## Dokumentasi Proyek Booking Lapangan Futsal

Konsep Dari Web Yang Saya Buat:

Booking lapangan futsal adalah website buat kita yang mau membooking atau menyewa lapangan buat latihan fisik seperti futsal, basket, voli dan juga badminton.
Alasan membuat website ini agar dapat mempermudah buat menyewa atau membooking lapangan kita juga tidak perlu jauh jauh datang ketempat karena sudah ada website nya

## Ada juga Fitur Yang Tersedia
- Halamannya
  
  -Home
  
  -Booking Saya
  
  -Kelola Admin
  
  -Kelola Lapangan
  
  -Semua Booking
  
Dan disitu juga kita bisa melihat ada berapa lapang yang tersedia dan bisa langsung memesannya dan ada juga kita bisa melihat semua bokingan yang sudah diboking


## ERD

![WhatsApp Image 2025-12-01 at 15 04 03](https://github.com/user-attachments/assets/5c7e35c0-3f78-4649-ae5a-805d2178d7b6)







## Teknologi Yang Digunakan
  - Laravel 11

## Tools Yang Digunakan

   -VSCode
  
   -PhpMyAdmin
  
   -Artisan Cli

## Persyaratan Untuk Installasi
  .web server

  .php8.0

  .Database (MySql)

  .Composer

## Cara Instalasi IceSicle

1. Persyaratan

   pastikan terlebih dahulu anda memenuhi persyaratan
   beriku:

  -web server

  -php8.0

  -Database (MySql)

  -Composer

2. Clone Repository
   
   Pertama,clone repository dari github dengan
   perintah berikut:

       https://github.com/dhelvia10/Booking-Futsal.git


3. Masuk Ke Direkotri Proyek

   Setelah clone selesai,masuk ke direkotri proyek:

       cd booking futsal

4. Instalasi Dependensi

   instal dependensi menggunakan composer:

       composer install

5. Salin File .env

   salin file '.env.example' menjadi '.env':

       cp .env.example .env

6.Atur Kunci Aplikasi

  Generate kunci aplikasi menggunakan artisan:

      php artisan key:generate

7. Konfigurasi Database

    Edit File '.env' dan atur konfigurasi database:

   DB_CONNECTION=mysql
   
   DB_HOST=127.0.0.1
   
   DB_PORT=3306
   
   DB_DATABASE=nama_database
   
   DB_USERNAME=username_database
   
   DB_PASSWORD=password_database

9. Jalankan Migrations

   Jalankan perintah berikut untuk membuat tabel di
   database:

        php artisan migrate

10. Jalankan Server

    jalankan server lokal dengan perintah
    berikut:

        php artisan serve
