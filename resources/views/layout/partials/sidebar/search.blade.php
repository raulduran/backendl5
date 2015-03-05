<form action="#" method="get" class="sidebar-form">
	<div class="input-group">
		<input type="text" name="search" class="form-control" placeholder="Buscar ..." value="{{ Input::get('search') }}"/>
		<span class="input-group-btn">
			<button type='submit' class="btn btn-flat"><i class="fa fa-search"></i></button>
		</span>
	</div>
</form>