<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
</p>

## Install and config
#### Step 1: Create Docker images

```
docker-compose up -d
```
#### Step 2: exec docker

```
docker exec -it laravel_app bash
```

####  migrate with seed
```
php artisan migrate --seed
```

#### and then:
```
exit
```

## Use

<p>
Use: <a href="http://localhost:90" target="_blank">Localhost:90</a>
</p>
<p>
Swagger: <a href="http://localhost:90/api/documentation" target="_blank">Localhost:90/api/documentation</a>
</p>
<p>
Horizon: <a href="http://localhost:90/horizon" target="_blank">Localhost:90/horizon</a>
</p>


