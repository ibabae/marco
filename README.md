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
* [laravel/scout](https://laravel.com/docs/11.x/scout)
* [dedoc/scramble](https://scramble.dedoc.co/installation)
* [spatie/laravel-permission](https://spatie.be/docs/laravel-permission/v6/introduction)
* [laravel/telescope](https://laravel.com/docs/11.x/telescope)
* [laravel/horizon](https://laravel.com/docs/11.x/horizon)
* [shetabit/payment](https://github.com/shetabit/payment)
* [intervention/image](https://image.intervention.io/v3/introduction/installation)
* [enqueue/amqp-bunny](https://php-enqueue.github.io/transport/amqp_bunny)

<p>
Swagger: <a href="http://localhost:90/api/documentation" target="_blank">http://localhost:90/api/documentation</a><br>
<!-- after any swagger changes: `php artisan l5-swagger:generate` -->
</p>

<p>
    Horizon: <a href="http://localhost:90/horizon" target="_blank">http://localhost:90/horizon</a>
</p>

<p>
    Telescope: <a href="http://localhost:90/telescope">http://localhost:90/telescope</a>
</p>

## Future Packages:
[spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog)
[laravel-settings](https://github.com/spatie/laravel-settings)
[Laravel Socialite](https://github.com/spatie/laravel-settings)
[Laravel Dusk](https://laravel.com/docs/11.x/dusk)
[Spatie Query‌ Builder](https://spatie.be/docs/laravel-query-builder/v5/introduction)
