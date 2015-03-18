# BackendL5

BackendL5 for Laravel 5 based in <a href="http://almsaeedstudio.com/AdminLTE/" target="_blank">AdminLTE template</a>

###Install

Clone repository

```
git clone https://github.com/raulduran/backendl5.git yourbackend
```

Change directory

```
cd yourbackend
```

Remove .git directory (optional)

```
rm -rf .git
```

Composer update (first download composer from <a href="https://getcomposer.org/download/" target="_blank">here</a>)

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

Edit file .env and change conection database and email data.

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
MAIL_ADDRESS=demo@demo.com
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

Install demo user (optional)

```
php artisan db:seed
```

Run server

```
php artisan serve
```

Go to <a href="http://localhost:8000/" target="_blank">BackendL5 Local</a> and login with user demo:


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

###Adding new entity (Article) very fast

Create controller, repository, model, migrate, request and form classes, all in one.

```
php artisan bl5:all articles
```

or for steps
```
//Create controller
php artisan bl5:controller ArticlesController

//Create repository
php artisan bl5:repository ArticleRepository

//Create Model
php artisan bl5:model Article

//Create request
php artisan bl5:request ArticleRequest

//Create form
php artisan bl5:form ArticleForm

//Create views
php artisan bl5:views articles

//Create migrate
php artisan make:migration:schema create_articles_table --schema="name:string"
```

Add routes in app/Http/routes.php into admin section

```
Route::resource('articles', 'Admin\ArticlesController');
Route::post('articles/delete', array('as' => 'admin.articles.delete', 'uses' => 'Admin\ArticlesController@delete'));
```

Add menu in array menus in app/Composers/MenusComposer.php

```
'articles' => [
	'visible' => true,
	'icon' => 'fa-file-o',
	'edit' => true,
	'name' => trans('messages.articles.index')
]
```

Add custom messages in resources/lang/es/messages.php 

```
'article' => 'Artículo',
'articles.index' => 'Artículos',
'articles.create' => 'Nuevo artículo',
'articles.edit' => 'Editar artículo',
'articles.show' => 'Ver artículo',
'articles.delete.title' => 'Eliminar artículo',
'articles.delete.message' => '¿Está seguro de que quiere continuar?',
```

Migrate article

```
php artisan migrate
```

###Adding Api controller (Article)

Create a controller only method index and show function

```
php artisan bl5:apicontroller ArticlesController
```

Add routes in app/Http/routes.php into api section
```
Route::resource('articles', 'Api\ArticlesController', ['only' => ['index', 'show']]);
```



