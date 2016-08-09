@extends('layout.backend')

@section('content')
    {!! trans('custom/app.welcome', ['name' => config('custom.htmlname')]) !!}
@stop