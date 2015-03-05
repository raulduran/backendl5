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

Run server

```
php artisan serve
```

Go to [BackendL5](http://localhost:8000/) and login with user admin, email: info@backendl5.com password: admin

###Change app name

Edit custom vars in file config/custom.php


###Adding new entity in 1 min., for example: Articles (The next version will be a command Laravel)


Create routes in file app/Http/routes.php, after user routes.

```
//Articles
Route::resource('articles', 'Admin\ArticlesController');
Route::post('articles/delete', array('as' => 'admin.articles.delete', 'uses' => 'Admin\ArticlesController@delete'));
```

Create migrate file

```
php artisan make:migration:schema create_articles_table --schema="title:string, body:text"
```

Migrate article

```
php artisan migrate
```

Edit model Article and add

```
protected $fillable = ['title', 'body'];

public function getCreatedAtAttribute()
{
	return \Date::parse($this->atributtes['created_at'])->format('d-m-Y');
}

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

Create Articles controller, form, request and repository

```
sed 's/User/Article/g' app/Http/Controllers/Admin/UsersController.php > tmp.php && sed 's/user/article/g' tmp.php > app/Http/Controllers/Admin/ArticlesController.php

sed 's/User/Article/g' app/Repositories/UserRepository.php > tmp.php && sed 's/user/article/g' tmp.php > app/Repositories/ArticleRepository.php

rm tmp.php && composer dumpautoload

php artisan form:make Forms/ArticleForm --fields="title:text,description:textarea"

php artisan make:request ArticleRequest

```

Editing form article app/Forms/ArticleForm.php and change buildForm()

```
$this
	->add('title', 'text', ['label' => trans('messages.title')])
	->add('body', 'textarea', ['label' => trans('messages.body')])
	->add('task', 'hidden')
;
```

Editing validation rules request app/Http/Requests/ArticleRequest.php and change authorize function to true.

```
return [
	'title' => 'required',
	'body' => 'required',
];
```

Creating views for articles.

```
mkdir resources/views/articles
sed 's/user/article/g' resources/views/users/index.blade.php > resources/views/articles/index.blade.php
sed 's/user/article/g' resources/views/users/show.blade.php > resources/views/articles/show.blade.php
```

Edit resources/views/articles/index.blade.php change columns name, email, role by title
```
<tr>
	<th class="text-center" width="15"><input type="checkbox" name="chb-all" id="chb-all" /></th>
	<th class="text-center" width="15">{{ trans('messages.id') }}</th>
	<th>{{ trans('messages.title') }}</th>
	<th class="text-center" width="100">{{ trans('messages.created_at') }}</th>
	<th class="text-center" width="100">#</th>
</tr>
@foreach ($results as $article)
<tr>
	<td class="text-center"><input type="checkbox" name="ids[]" value="{{ $article->id }}" class="chbids" /></td>
	<td class="text-center">{{ $article->id }}</td>
	<td>{{ $article->title }}</td>
	<td class="text-center">{{ $article->created_at }}</td>
	<td class="text-center">
		<a href="{{ route('admin.articles.show', $article->id) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>	
		<a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
	</td>
</tr>
@endforeach
```

Edit resources/views/articles/show.blade.php and change columns name, email, role by title and description

```
@extends('layout.partials.show')

@section('name')
	{{ $article->title }}
@stop

@section('show')
	@include('layout.partials.fields.text', ['label' => trans('messages.body'), 'field' => $article->body])
@stop
```








