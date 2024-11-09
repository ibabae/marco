<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
</p>

# Config and use
## Step 1: Create Docker images

```
docker-compose up -d
```
## Step 2: exec docker

```
docker exec -it laravel_app bash
```

## Step 3: migrate & seed
```
php artisan migrate --seed
```

<!-- ## and then:
```
npm run dev -- --host
``` -->
<a href="http://localhost:90" target="_blank">Localhost:90</a>


## Features
- Mysql & PostgreSQL
- Dependency Injection
- Activity Log

## Pacakges
* laravel/scout
* darkaonline/l5-swagger
* spatie/laravel-permission
* laravel/telescope
* laravel/horizon
* shetabit/payment
* intervention/image

<p>
Swagger: <a href="http://localhost:90/api/documentation" target="_blank">http://localhost:90/api/documentation</a> <a href="https://swagger.io/docs/">Docs</a><br>
after any swagger changes: `php artisan l5-swagger:generate`
</p>

<p>
    Horizon: <a href="http://localhost:90/horizon" target="_blank">http://localhost:90/horizon</a> <a href="https://laravel.com/docs/11.x/horizon" target="_blank">Docs</a>
</p>

<p>
    Telescope: <a href="http://localhost:90/telescope">http://localhost:90/telescope</a> <a href="https://laravel.com/docs/11.x/telescope">Docs</a>
</p>

## Future Packages:
[spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog)
[laravel-settings](https://github.com/spatie/laravel-settings)
[Laravel Socialite](https://github.com/spatie/laravel-settings)
[Laravel Dusk](https://laravel.com/docs/11.x/dusk)
