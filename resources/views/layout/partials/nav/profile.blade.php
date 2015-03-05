<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<img src="{{ $auth->avatar }}" class="user-image" alt="User Image"/>
		<span class="hidden-xs">{{ $auth->name }}</span>
	</a>
	<ul class="dropdown-menu">
		<li class="user-header">
			<img src="{{ $auth->avatar }}" class="img-circle" alt="User Image" />
			<p>
				{{ $auth->name }}
				<small>{{ trans('messages.member_from') }} <span class="capitalize">{{ $auth->from }}</span></small>
			</p>
		</li>
		<li class="user-body hide">
			<div class="col-xs-4 text-center">
				<a href="#">Opcion1</a>
			</div>
			<div class="col-xs-4 text-center">
				<a href="#">Opcion2</a>
			</div>
			<div class="col-xs-4 text-center">
				<a href="#">Opcion3</a>
			</div>			
		</li>
		<!-- Menu Footer-->
		<li class="user-footer">
			<div class="pull-left">
				<a href="{{ route('admin.users.edit', $auth->id )}}" class="btn btn-default btn-flat">{{ trans('messages.profile') }}</a>
			</div>
			<div class="pull-right">
				<a href="/auth/logout" class="btn btn-default btn-flat">{{ trans('messages.logout') }}</a>
			</div>
		</li>
	</ul>
</li>