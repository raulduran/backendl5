# BackendL5

BackendL5 for Laravel 5 based in [AdminLTE template](http://almsaeedstudio.com/AdminLTE/).

###Install

Clone repository

```
git clone https://github.com/raulduran/backendl5.git yourbackend
```

Remove .git directory

```
rm -rf .git
```

Composer update [Get composer](https://getcomposer.org/download/)

```
php composer.phar update
```
or

```
composer update
```

Copy file .env.example to .env

```
cp .env.example .env
```

Edit file .evn

```
APP_ENV=local
APP_DEBUG=true
APP_KEY=TNP6X0eATkfsgHzgrqlByxcPL7Hnfldc

DB_HOST=127.0.0.1
DB_DATABASE=backendl5
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
SESSION_DRIVER=file

MAIL_DRIVER=sendmail

MAIL_ADDRESS=rduran+backendl5@inventiaplus.com
MAIL_NAME=BackendL5
```

Regenerate APP_KEY
```
php artisan key:generate
```

Migrate tables

```
php artisan migrate
```

Install users

```
php artisan db:seed
```

Run server

```
php artisan serve
```

Go to [BackendL5](http://localhost:8000/) and login with user admin:

```
email: demo@demo.com password: demo
```

###Change custom vars


Edit file config/custom.php


```
return [
	
	'name' => 'BackendL5',

	'htmlname' => '<b>Backend</b>L5',

	'url' => 'https://github.com/raulduran/backendl5/',

	'paginate' => '20'

];
```

###Adding new entity in 1 min., for example: Articles

Create Articles controller, repository, model, request and form classes

```
php artisan bl5:controller ArticlesController

php artisan bl5:repository ArticleRepository

php artisan bl5:model Article

php artisan bl5:request ArticleRequest

php artisan bl5:form ArticleForm

php artisan bl5:views articles

```

Create routes in file app/Http/routes.php, after user routes.

```
//Articles
Route::resource('articles', 'Admin\ArticlesController');
Route::post('articles/delete', array('as' => 'admin.articles.delete', 'uses' => 'Admin\ArticlesController@delete'));
```

Create migrate file

```
php artisan make:migration:schema create_articles_table --schema="name:string"
```

Migrate article

```
php artisan migrate
```

Create menu section, editing app/Composers/MenusComposer.php

```
'articles' => [
	'icon' => 'fa-file-o',
	'edit' => true,
	'name' => trans('messages.articles.index')
]
```

Add messages translations, resources/lang/es/messages.php 

```
'article' => 'Artículo',
'articles.index' => 'Artículos',
'articles.create' => 'Nuevo artículo',
'articles.edit' => 'Editar artículo',
'articles.show' => 'Ver artículo',
'articles.delete.title' => 'Eliminar artículo',
'articles.delete.message' => '¿Está seguro de que quiere continuar?',
```

Creating views for articles.

```
mkdir resources/views/articles
touch resources/views/articles/index.blade.php
touch resources/views/articles/show.blade.php
```








