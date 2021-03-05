# Laravel Admin Pages - библиотека для реализации управления статическими страницами на базе Laravel-admin

## Установка

`composer require garbuzivan/laravel-admin-pages`

<p>и опубликовать конфигурацию</p> 

`php artisan vendor:publish  --force --provider="GarbuzIvan\LaravelAdminPages\LaravelAdminPagesServiceProvider" --tag="config"`


<p>config/app.php в блок 'providers' => []</p>

`GarbuzIvan\LaravelPages\LaravelPagesServiceProvider::class,` 

## Тестирование
<pre>
make test
or
./vendor/bin/phpunit ./vendor/garbuzivan/laravel-admin-pages/tests</pre>
