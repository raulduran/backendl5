var elixir = require('laravel-elixir');

elixir(function(mix) {

	var assets = "resources/assets/";

	mix.styles([
		"css/import.css",		
		"themes/adminlte/bootstrap/css/bootstrap.min.css",
		"css/font-awesome.min.css",
		"css/ionicons.min.css",
		"css/selectize.css",
		"css/selectize.bootstrap3.css",
		"themes/adminlte/dist/css/AdminLTE.min.css",
		"themes/adminlte/dist/css/skins/_all-skins.min.css",
		"themes/adminlte/plugins/iCheck/flat/blue.css",
		//"themes/adminlte/plugins/morris/morris.css",
		//"themes/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css",
		"themes/adminlte/plugins/datepicker/datepicker3.css",
		"themes/adminlte/plugins/daterangepicker/daterangepicker-bs3.css",
		//"themes/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
		"css/custom.css",
	], "public/css/theme.css", assets);

	mix.scripts([
		"themes/adminlte/plugins/jQuery/jQuery-2.1.3.min.js",
		//"js/jquery-ui.min.js",
		"themes/adminlte/bootstrap/js/bootstrap.min.js",		
		//"js/raphael-min.min.js",
		//"themes/adminlte/plugins/morris/morris.min.js",
		//"themes/adminlte/plugins/sparkline/jquery.sparkline.min.js",
		//"themes/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
		//"themes/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
		//"themes/adminlte/plugins/knob/jquery.knob.js",
		//"themes/adminlte/plugins/daterangepicker/daterangepicker.js",
		//"themes/adminlte/plugins/datepicker/bootstrap-datepicker.js",
		//"themes/adminlte/plugins/ckeditor/ckeditor.js",
		"themes/adminlte/plugins/iCheck/icheck.min.js",
		"themes/adminlte/plugins/slimScroll/jquery.slimscroll.min.js",
		"themes/adminlte/plugins/fastclick/fastclick.min.js",
		"themes/adminlte/dist/js/app.min.js",
		"js/bootbox.min.js",
		"js/selectize.js",
		"js/custom.js",
	], "public/js/theme.js", assets);

	mix.version(["public/css/theme.css", "public/js/theme.js"]);

	mix.copy(assets+'fonts', 'public/build/fonts');

});