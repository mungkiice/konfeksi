# Marketplace Konfeksi

Marketplace Konfeksi merupakan platform yang menyediakan proses bisnis khusus untuk jasa konfeksi.

<!-- ## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system. -->

### Prasyarat

Untuk menjalankan website secara dikomputer anda, dibutuhkan :
1. [Composer](https://getcomposer.org/download/)
2. Apache2
3. MySql
4. PHP
5. SQLite3

### Instalasi

Step - step untuk menjalankan website di workspace secara lokal

Clone projek

```
git clone https://github.com/mungkiice/konveksi.git konfeksi
```

Pindah ke direktori projek

```
cd konfeksi
```

Install dependencies

```
composer install
```

Buat file .env dengan isi template seperti file .env.example, Kemudian isi informasi database

```
DB_DATABASE=(NAMA_DATABASE)
DB_USERNAME=(USERNAME_DATABASE)
DB_PASSWORD=(PASSWORD_DATABASE)
MIDTRANS_SERVERKEY=(SERVER KEY DARI AKUN MERCHANT MIDTRANS)
MIDTRANS_CLIENTKEY=(CLIENT KEY DARI AKUN MERCHANT MIDTRANS)

MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=(AKUN GOOGLE)
MAIL_PASSWORD=(PASSWORD AKUN GOOGLE)
MAIL_ENCRYPTION=ssl

PUSHER_APP_ID=(ID_PUSHER)
PUSHER_APP_KEY=(KEY_PUSHER)
PUSHER_APP_SECRET=(SECRET_PUSHER)
PUSHER_APP_CLUSTER=ap1

AFTERSHIP_APIKEY=(AFTERSHIP_KEY)
RAJAONGKIR_APIKEY=(RAJAONGKIR_KEY)
```

Generate Key

```
php artisan key:generate
```

Generate tabel beserta data bawaan

```
php artisan migrate --seed
```

Projek sudah siap untuk dijalankan

```
php artisan serve
```

Kemudian akses website menggunakan browser dengan URL

```
localhost:8000
```

## Menjalankan pengujian

Clear konfigurasi lama

```
php artisan config:clear
```

Menjalankan PHPUnit

```
vendor/bin/phpunit
```

<!-- ### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system -->

## Dikembangkan menggunakan library

* [Laravel 5.8](https://laravel.com/docs/5.8) - PHP Website Framework
* [Veritrans/Midtrans](https://docs.midtrans.com/en/welcome/index.html) - Payment Gateway
* [RajaOngkir](https://rajaongkir.com/dokumentasi) - Courier Cost Web Service API
* [AfterShip](https://www.aftership.com/) - Tracking Web Service API
* [Pusher](https://pusher.com/) - Real-time Hosted Service

<!-- ## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags).  -->

## Pengembang

* **Muhammad Iqbal Kurniawan** - *Developer* - [Account Page](https://github.com/mungkiice)

Daftar [kontributor](https://github.com/mungkiice/konveksi/graphs/contributors) yang berpartisipasi dalam projek.

<!-- ## Lisensi

Projek ini dibawah lisensi MIT - lihat di [LICENSE](LICENSE) file untuk lebih jelas -->

<!-- ## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc -->
