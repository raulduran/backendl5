@extends('layout.partials.auth')

@section('panel')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('custom/app.reset') }}
    </div>
    <div class="panel-body">
        @include('layout.partials.error')
        <form class="form-horizontal" role="form" method="POST" action="/password/reset">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">
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
                        {{ trans('custom/app.reset') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop