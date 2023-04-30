<h1 align="center">Selamat datang di repository laravelapi-onlineshop 👋🏻</h1>
<p></p>

<h4 align="center">repository ini menyediakan restfull api online shop yang dibuat menggunakan framework<a href="https://laravel.com/" target="_blank">Laravel</a>.
</h4>

<p></p>

<p></p>

<h2 id="tentang">🎓 Tentang laravelapi</h2>

<p></p>

<h2 id="fitur">✨ Fitur Tersedia</h2>

- data products, orders, cart, authentication, size, user
  
- fitur login and register
   - admin
        email : admin@gmail.com 
        password : admin

<p></p>

<h2 id="demo">🏠 Halaman Demo</h2>

api dapat anda akses di [https://apionlineshop.000webhostapp.com/api/products](https://apionlineshop.000webhostapp.com/api/products).

<p></p>

<h2 id="syarat">💾 Prasyarat yang Diperlukan</h2>

Berikut adalah daftar layanan dan aplikasi yang wajib dan diperlukan selama anda menjalankan aplikasi wanime jika anda belum menginstall nya maka disarankan untuk menginstall nya terlebih dahulu

- PHP 8 & Web Server [XAMPP, LAMPP, MAMP]
- Web Browser [Chrome, Firefox, Safari & Opera]
- Internet [Karena menggunakan banyak CDN]

<p></p>

<h2 id="download">🐱‍💻 Panduan Menjalankan & Install Aplikasi</h2>

Untuk menjalankan aplikasi atau web ini kamu harus install XAMPP atau web server lain dan mempunyai setidaknya satu web browser yang terinstall di komputer anda.

```bash
# Clone repository ini atau download di
$ git clone https://github.com/iwanekaputra/laravelapi-onlineshop.git

# Kemudian jalankan command composer install, ini akan menginstall resources yang laravel butuhkan
$ composer install

# Lakukan copy .env dengan cara ketik command seperti dibawah 
$ cp .env.example .env

# Generate key juga jangan lupa dengan command dibawah
$ php artisan key:generate

# konfigurasi database di .env
$ DB_CONNECTION=mysql
$ DB_HOST=127.0.0.1
$ DB_PORT=3306
$ DB_DATABASE={sesuaikan nama database anda}
$ DB_USERNAME=root
$ DB_PASSWORD={sesuaikan password anda}


#lalu jalankan migrate dan juga seed
$ php artisan migrate --seed

# Lalu jalankan aplikasi kalian dengan command dibawah
$ php artisan serve

# Selamat aplikasi dapat anda nikmati di local!
```
<p></p>

<h2 id="dukungan">💌 Dukungan</h2>

Kalian bisa mendukung saya di platform trakteer! Dukungan kalian akan sangat membantu untuk saya, namun dengan anda star project ini juga sudah sangat membantu lho!

<p></p>

<a href="https://trakteer.id/iwanekaputra" target="_blank"><img id="wse-buttons-preview" src="https://cdn.trakteer.id/images/embed/trbtn-red-5.png" height="40" style="border:0px;height:40px;" alt="Trakteer Saya"></a>

<p></p>

<h2 id="kontribusi">🤝 Kontribusi</h2>

Contributions, issues and feature requests sangat saya apresiasi karena aplikasi ini jauh dari kata sempurna. Jangan ragu untuk pull request dan membuat perubahan pada project ini.

Project ini diselesaikan secara team, namun banyak fitur dan banyak hal yang bisa diperbaiki maka bantuan kalian sangat saya apresiasi.

<p></p>

<h2 id="lisensi">📝 Lisensi</h2>

- Copyright © 2023 IWAN EKA PUTRA

---

**<p align="center">Made with ❤️ by IWAN EKA PUTRA</p>**
