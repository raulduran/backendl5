@if (count($field)>0)
<dl class="dl-horizontal">
	<dt>{{ $label }}</dt>
	<dd>
		<ul class="list-unstyled">
		@foreach ($field as $key => $value)
			<li><a href="{{ route('admin.users.show', $key) }}">{{ $value }}</a></li>
		@endforeach
		<ul>
	</dd>
</dl>
@endif