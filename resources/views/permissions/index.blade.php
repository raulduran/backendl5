@extends('layout.partials.table')

@section('filters')
    <div class="col-md-offset-8 col-md-4">
        @include('layout.partials.filters.search')
    </div>
@stop

@section('table')
    <tr>
        <th class="text-center" width="1"><input type="checkbox" name="chb-all" id="chb-all" /></th>
        <th class="text-center" width="1">{!! sort_by('admin.permissions.index', 'id', trans('messages.id')) !!}</th>
        <th>{!! sort_by('admin.permissions.index', 'name', trans('messages.name')) !!}</th>
        <th class="text-center" width="100">{!! sort_by('admin.permissions.index', 'created_at', trans('messages.created_at')) !!}</th>      
        <th class="text-center" width="100">#</th>
    </tr>
    @foreach ($results as $permission)
    <tr>
        <td class="text-center"><input type="checkbox" name="ids[]" value="{{ $permission->id }}" class="chbids" /></td>
        <td class="text-center">{{ $permission->id }}</td>
        <td>{{ $permission->label }}</td>
        <td class="text-center">{{ $permission->created }}</td>
        <td class="text-center">
            <a href="{{ route('admin.permissions.show', $permission->id) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
            <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
        </td>
    </tr>
    @endforeach
@stop