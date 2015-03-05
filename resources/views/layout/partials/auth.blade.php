@extends('layout.frontend')

@section('content')
<div class="auth">
	<div class="login-logo">
		<a href="/">{!! config('custom.htmlname') !!}</a>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@yield('panel')
			</div>
		</div>
	</div>
</div>
@stop