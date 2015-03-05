@extends('layout.backend')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div id="frmModel" class="box">
				<div class="box-body">			
					@yield('form', form($form))
				</div>
				<div class="box-footer">
					<div class="form-group">
						<div class="text-right">
							<button class="btn btn-warning btn-apply"><i class="fa fa-edit fa-fw"></i>{{ trans('messages.apply') }}</button>
							<button class="btn btn-success"><i class="fa fa-edit fa-floppy-o fa-fw"></i>{{ trans('messages.save') }}</button>
							<a class="btn btn-danger pull-left" href="{{ route('admin.'.$route['table'].'.index') }}"><i class="fa fa-times fa-fw"></i>{{ trans('messages.cancel') }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop