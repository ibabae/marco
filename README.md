<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
</p>

# Install and config
## Step 1: Create Docker images

```
docker-compose up -d
```
## Step 2: exec docker

```
docker exec -it laravel_app bash
```

##  migrate & seed
```
php artisan migrate --seed
```

## and then:
```
npm run dev -- --host
```

# Use

<p>
    Localhost: <a href="http://localhost:90" target="_blank">http://localhost:90</a>
</p>

## Pacakges
### Swagger:
<p>
    <a href="http://localhost:90/api/documentation" target="_blank">http://localhost:90/api/documentation</a> <a href="https://swagger.io/docs/">Docs</a>
</p>

#### after any swagger changes:
````
php artisan l5-swagger:generate 
````
### Horizon:
<p>
    <a href="http://localhost:90/horizon" target="_blank">http://localhost:90/horizon</a> <a href="https://laravel.com/docs/11.x/horizon" target="_blank">Docs</a>
</p>

### Telescope:
<p>
    Access: <a href="http://localhost:90/telescope">http://localhost:90/telescope</a> <a href="https://laravel.com/docs/11.x/telescope">Docs</a>
</p>

## Future Packages:
[laravel-messenger](https://github.com/cmgmyr/laravel-messenger)
[avatar](https://github.com/laravolt/avatar)
[laravel-authentication-log](https://github.com/rappasoft/laravel-authentication-log)
[spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog)
[laravel-settings](https://github.com/spatie/laravel-settings)
