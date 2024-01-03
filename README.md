# toko-app
 Toko Online Laravel 8

### Step Install

```sh
$ git clone -b api https://github.com/muhammadirfanwlee/wedang
$ cd wedang
$ cp .env.example .env
$ composer update
```

### Before Run
Sesuaikan konfigurasi database pada file .env

### Run
Pada folder `wedang` jalankan command:
```sh
$ php artisan config:clear
$ php artisan config:cache
$ php artisan cache:clear
$ php artisan optimize
$ php artisan serve 
```

### Test API
Buka link postman yang telah tercantum dibawah, dan coba jalankan satu persatu request yang telah tersedia.

[Postman Test Link](https://www.postman.com/syawalteam/workspace/wedang-api)