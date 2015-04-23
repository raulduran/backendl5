<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
	<head>
		<meta charset="UTF-8">
		<title>{{ config('custom.name') }}</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />		
		<link href="{{ elixir('css/theme.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<body class="skin-blue">
		@yield('template')
		@if (session('status'))
			<div id="message-status">
				<div class="alert alert-{{ session('type-status', 'success') }}">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ session('status') }}
				</div>
			</div>
		@endif
		<script src="{{ elixir('js/theme.js') }}" type="text/javascript"></script>
		@yield('scripts')
	</body>
</html>