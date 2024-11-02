<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
</p>
<p>
Step 1: Create Docker images
</p>

```
docker-compose up -d
```
<p>
Step 2: exec docker and migrate with seed
</p>

```
docker exec -it laravel_app bash
```
```
php artisan migrate --seed
```
