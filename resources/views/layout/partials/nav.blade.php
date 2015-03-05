<nav class="navbar navbar-static-top" role="navigation">
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			{{-- @include('layout.partials.nav.messages') --}}
			{{-- @include('layout.partials.nav.notifications') --}}
			{{-- @include('layout.partials.nav.tasks') --}}
			@include('layout.partials.nav.profile')
		</ul>
	</div>
</nav>