<div class="content-wrapper">
	<section class="content-header">
		<h1>
			@yield('title', trans('messages.'.$route['current']))
		</h1>
		@yield('toolbars')
	</section>
	<section class="content">
		@include('layout.partials.error_form')
		@yield('content')
	</section>
</div>