@extends('layout.backend')

@section('content')
	{!! trans('messages.welcome', ['name' => config('custom.htmlname')]) !!}
@stop