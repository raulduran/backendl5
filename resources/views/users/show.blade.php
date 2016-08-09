@extends('layout.partials.show')

@section('name')
    {{ $user->name }}
@stop

@section('show')
    @include('layout.partials.fields.email', ['label' => trans('custom/app.email'), 'field' => $user->email])
    @include('layout.partials.fields.text', ['label' => trans('custom/app.created_at'), 'field' => $user->created])
@stop