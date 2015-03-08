<ul class="sidebar-menu">
	@foreach ($menus as $key => $menu)
		@if ($menu['visible'])
		<li class="treeview {{ ($key==$active) ? 'active' : '' }}">
			<a href="#">
				<i class="fa {{ $menu['icon'] }}"></i><span class="fa-fw">{{ $menu['name'] }}</span><i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ route('admin.'.$key.'.index') }}"><i class="fa fa-list-ul"></i>{{ trans('messages.list') }}</a></li>
				@if ($menu['edit'])
				<li><a href="{{ route('admin.'.$key.'.create') }}"><i class="fa fa-plus"></i>{{ trans('messages.new') }}</a></li>
				@endif
			</ul>
		</li>
		@endif
	@endforeach
</ul>