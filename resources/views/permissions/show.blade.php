@extends('layout.partials.show')

@section('name')
    {{ $permission->label }}
@stop

@section('show')
    @include('layout.partials.fields.text', ['label' => trans('custom/app.name'), 'field' => $permission->name])
@stop