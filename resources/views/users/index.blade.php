@extends('layout.partials.table')

@section('filters')
	<div class="col-md-offset-8 col-md-4">
		@include('layout.partials.filters.search')
	</div>
@stop

@section('table')
	<tr>
		<th class="text-center" width="1"><input type="checkbox" name="chb-all" id="chb-all" /></th>
		<th class="text-center" width="1">{!! sort_by('admin.users.index', 'id', trans('messages.id')) !!}</th>
		<th>{!! sort_by('admin.users.index', 'name', trans('messages.name')) !!}</th>
		<th>{{ trans('messages.email') }}</th>
		<th class="text-center">{!! sort_by('admin.users.index', 'role', trans('messages.role')) !!}</th>
		<th class="text-center" width="100">{!! sort_by('admin.users.index', 'created_at', trans('messages.created_at')) !!}</th>
		<th class="text-center" width="100">#</th>
	</tr>
	@foreach ($results as $user)
	<tr>
		<td class="text-center"><input type="checkbox" name="ids[]" value="{{ $user->id }}" class="chbids" /></td>
		<td class="text-center">{{ $user->id }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td class="text-center">{{ $user->role_name }}</td>
		<td class="text-center">{{ $user->created }}</td>
		<td class="text-center">
			<a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>	
			<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
		</td>
	</tr>
	@endforeach
@stop