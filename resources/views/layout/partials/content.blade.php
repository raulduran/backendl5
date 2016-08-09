<div class="content-wrapper">
    <!--@include('layout.partials.breadcrumb')-->
    <section class="content-header">
        <h1>
            @yield('title', trans('custom/'.$route['current']))
        </h1>
        @yield('toolbars')
    </section>
    <section class="content">
        @include('layout.partials.error_form')
        @yield('content')
    </section>
</div>