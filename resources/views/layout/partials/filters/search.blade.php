<div class="input-group">
	<input type="text" id="search-list" value="{{ $request->get('search') }}" name="search" class="form-control input-sm pull-right" placeholder="{{ trans('messages.search') }}">
	<div class="input-group-btn">
		<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
	</div>
</div>