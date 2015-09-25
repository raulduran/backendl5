@extends('layout.partials.show')

@section('name')
    {{ $role->label }}
@stop

@section('show')
    @include('layout.partials.fields.text', ['label' => trans('messages.name'), 'field' => $role->name])
@stop