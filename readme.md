# BackendL5

BackendL5 for Laravel 5 based in [AdminLTE template](http://almsaeedstudio.com/AdminLTE/).

###Install

Clone repository

```
git clone https://github.com/raulduran/backendl5.git yourbackend
```

Composer update

```
composer update
```

or

```
php composer.phar update
```

Copy file .env.example to .env

```
cp .env.example .env
```

Edit .evn and change environment vars.

```
vim .env
```

Migrate tables

```
php artisan migrate
```

Install users

```
php artisan db:seed
```

###Login

info@backendl5.com / admin


###Configuration

Edit custom vars in file config/custom.php

###Adding new entity for example: Articles




Create routes in file app/Http/routes.php, after user routes.

```
//Articles
Route::resource('articles', 'Admin\ArticlesController');
Route::post('articles/delete', array('as' => 'admin.articles.delete', 'uses' => 'Admin\ArticlesController@delete'));
```



