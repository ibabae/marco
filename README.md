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

####  migrate & seed
```
php artisan migrate --seed
```

#### and then:
```
exit
```

## Use

<p>
    Website: <a href="http://localhost:90" target="_blank">Localhost:90</a>
</p>
<p>
    <a href="http://localhost:90/api/documentation" target="_blank">Access Swagger</a>
</p>
<p>
    <a href="https://swagger.io/docs/">Swagger Docs</a>
</p>

### after any swagger changes:
````
php artisan l5-swagger:generate 
````

<p>
    Access Horizon: <a href="http://localhost:90/horizon" target="_blank">Link</a>
</p>
<p>
    Horizon Docs: <a href="https://laravel.com/docs/11.x/horizon" target="_blank">Link</a>
</p>

