<ul class="sidebar-menu">
    @foreach ($menus as $key => $menu)
        @can($menu['permission'])
        <li class="treeview {{ ($key==$active) ? 'active' : '' }}">
            <a href="#">
                <i class="fa {{ $menu['icon'] }}"></i><span class="fa-fw">{{ trans($menu['name']) }}</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.'.$key.'.index') }}"><i class="fa fa-list-ul"></i>@lang('custom/app.list')</a></li>
                @if ($menu['edit'])
                <li><a href="{{ route('admin.'.$key.'.create') }}"><i class="fa fa-plus"></i>@lang('custom/app.new')</a></li>
                @endif
            </ul>
        </li>
        @endcan
    @endforeach
</ul>