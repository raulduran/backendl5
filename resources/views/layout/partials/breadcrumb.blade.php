<ol class="breadcrumb">
    @if ($route['table'])
    <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
    @endif
    @if ($route['table'].'.index'==$route['current'])
    <li class="active">{{ trans('messages.'.$route['current']) }}</li>
    @elseif ($route['table'])
    <li><a href="/admin/{{ $route['table'] }}">{{ trans('messages.'.$route['table'].'.index') }}</a></li>
    <li class="active">{{ trans('messages.'.$route['current']) }}</li>
    @endif
</ol>