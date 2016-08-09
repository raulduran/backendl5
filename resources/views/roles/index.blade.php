@extends('layout.partials.table')

@section('filters')
    <div class="col-md-offset-8 col-md-4">
        @include('layout.partials.filters.search')
    </div>
@stop

@section('table')
    <tr>
        <th class="text-center" width="1"><input type="checkbox" name="chb-all" id="chb-all" /></th>
        <th class="text-center" width="1">{!! sort_by('admin.roles.index', 'id', trans('custom/app.id')) !!}</th>
        <th>{!! sort_by('admin.roles.index', 'name', trans('custom/app.name')) !!}</th>
        <th class="text-center" width="100">{!! sort_by('admin.roles.index', 'created_at', trans('custom/app.created_at')) !!}</th>      
        <th class="text-center" width="100">#</th>
    </tr>
    @foreach ($results as $role)
    <tr>
        <td class="text-center"><input type="checkbox" name="ids[]" value="{{ $role->id }}" class="chbids" /></td>
        <td class="text-center">{{ $role->id }}</td>
        <td>{{ $role->label }}</td>
        <td class="text-center">{{ $role->created }}</td>
        <td class="text-center">
            <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
        </td>
    </tr>
    @endforeach
@stop