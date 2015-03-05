@extends('layout.partials.auth')

@section('panel')
<div class="panel panel-default">
	<div class="panel-heading">
		{{ trans('messages.login') }}
	</div>
	<div class="panel-body">
		@include('layout.partials.error')
		<form class="form-horizontal" role="form" method="POST" action="/auth/login">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="col-md-4 control-label" for="email">{{ trans('messages.email') }}</label>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="password">{{ trans('messages.password') }}</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password" id="password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember">{{ trans('messages.remember') }}
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">{{ trans('messages.login') }}</button>
					<span class="pull-right">
						<a class="btn-link" href="/password/email">{{ trans('messages.forgot') }}</a>
					</span>
				</div>
			</div>
		</form>
	</div>
</div>
@stop
