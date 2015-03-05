@if (count($field)>0)
<dl class="dl-horizontal">
	<dt>{{ $label }}</dt>
	<dd>
		<ul class="list-unstyled">
		@foreach ($field as $key => $value)
			<li>{ $value }}</li>
		@endforeach
		<ul>
	</dd>
</dl>
@endif