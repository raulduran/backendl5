@extends('layout.backend')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">@yield('name', '')</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-lg-12">
							@yield('show', 'Vista')
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a class="btn btn-success" href="{{ URL::previous() }}"><i class="fa fa-fw fa-arrow-left"></i> {{ trans('messages.back') }}</a>
									@yield('showbuttons')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop