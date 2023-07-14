
# World Of Words


## Start project

To run the project, run the following commands

* clone repository
```
git clone https://github.com/DawidPlociennikDev/laravel-tdd.git
```

* copy env
```
cp .env.example .env
```

* install dependencies
```
composer install
```

* generate aplication encryption key
```
php artisan key:generate
```

* enter project [[http://localhost:8000](http://localhost:8000)](http://127.0.0.1:8000/words)

* seed database
```
php artisan migrate --seed
```

## Testing
* run test
```
php artisan test
```
