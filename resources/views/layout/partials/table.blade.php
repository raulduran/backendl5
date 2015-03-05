@extends('layout.backend')

@section('scripts')
<script type="text/javascript">
	$(function() {

		$('#chb-all').change(function(e) {
			e.preventDefault();
			$('.chbids').prop('checked', this.checked);
			if (this.checked) $('.btn-remove').removeClass('hide');
		});		

		$('.btn-remove').click(function(e) {
			e.preventDefault();
			bootbox.dialog({
			  message: "{{ trans('messages.'.$route['table'].'.delete.message') }}",
			  title: "{{ trans('messages.'.$route['table'].'.delete.title') }}",
				buttons: {
					success: {
						label: "{{ trans('messages.yes') }}",
						className: "btn-primary",
						callback: function() {
							frmList.submit();
						}
					},
					danger: {
						label: "{{ trans('messages.no') }}",
						className: "btn-default",
					},
			  }
			});
		});

		$('.btn-new').click(function(e) {
			e.preventDefault();
			window.location.href = '{{ url(Request::path()) }}/create';
		});		

		$('.btn-edit').click(function(e) {
			e.preventDefault();
			var id = getIdCheckBox();
			window.location.href = '{{ url(Request::path()) }}/'+id+'/edit';
		});

		$('input[type=checkbox]').change(function(e) {
			var cont = 0;
			$('input[type=checkbox]').each(function () {
				if (this.checked) {
					cont++;
				}
			});

			if (cont==0)
			{
				$('.btn-remove').addClass('hide');
			}
			else if (cont==1)
			{
				$('.btn-remove').removeClass('hide');
			}
		});
	});
</script>
@stop

@section('toolbars')
<div class="toolbars">
	<a class="btn btn-success btn-new"><i class="fa fa-fw fa-plus"></i>{{ trans('messages.new') }}</a>
	<a class="btn btn-danger btn-remove hide"><i class="fa fa-fw fa-times"></i>{{ trans('messages.delete') }}</a>
</div>
@stop

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="row">
						<form method="GET">
							@yield('filters')
						</form>
					</div>
				</div>
				@if (isset($results) && count($results) > 0)
				<div class="box-body table-responsive no-padding">
					{!! Form::open(array('name' => 'frmList', 'route' => 'admin.'.$route['table'].'.delete', 'autocomplete' => 'off')) !!}
						<table class="table table-hover">
							@yield('table')
						</table>
					{!! Form::close() !!}
				</div>
				@if ($results->hasPages())
				<div class="box-footer clearfix">
					<div class="pull-right">
						{!! $results->render() !!}
					</div>
				</div>
				@endif
				@else
				<div class="box-body">
					<p class="text-center">{{ trans('messages.nodata') }}</p>
				</div>
				@endif
			</div>
		</div>
	</div>
@stop