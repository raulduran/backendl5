@extends('layout.partials.auth')

@section('panel')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('custom/app.register') }}
        <span class="pull-right">
            <a class="btn-link" href="/auth/login">{{ trans('custom/app.login') }}</a>
        </span>     
    </div>
    <div class="panel-body">
        @include('layout.partials.error')
        <form class="form-horizontal" role="form" method="POST" action="/auth/register">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">{{ trans('custom/app.name') }}</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">{{ trans('custom/app.email') }}</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="passowrd">{{ trans('custom/app.password') }}</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" id="passowrd" name="password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="password_confirmation">{{ trans('custom/app.password_confirmation') }}</label>             
                <div class="col-md-6">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('custom/app.register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop