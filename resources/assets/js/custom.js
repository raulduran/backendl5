var loadModal = function (title, url) {
	$('#custom-modal-title').html(title);
	$('#custom-modal-body').html('');
	$('#custom-modal-body').load(url);
	$("#custom-modal").css("z-index", "1500");
	$('#custom-modal').modal();
};

var getIdCheckBox = function() {
	$('input[type=checkbox]').each(function () {
		if (this.checked) {
			id = $(this).val();
		}
	});
	return id;
};

var printer =function (elem, title)
{
	popup($(elem).html(), title);
};

var popup = function(data, title)
{
	var mywindow = window.open('', 'printer', 'width=800,height=600');
	mywindow.document.write('<html><head><title>'+title+'</title>');
	mywindow.document.write('<link rel="stylesheet" href="'+URL+'/css/bootstrap.min.css" type="text/css" />');
	mywindow.document.write('<link rel="stylesheet" href="'+URL+'/css/app.css" type="text/css" />');
	mywindow.document.write('<link rel="stylesheet" href="'+URL+'/font-awesome/css/font-awesome.min.css" type="text/css" />');
	mywindow.document.write('</head><body id="printer">');
	mywindow.document.write(data);
	mywindow.document.write('</body></html>');
	mywindow.print();
	mywindow.close();
	return true;
};

var store = function(name, val) {
	if (typeof (Storage) !== "undefined") {
		localStorage.setItem(name, val);
	}
}

var get = function(name) {
	if (typeof (Storage) !== "undefined") {
		return localStorage.getItem(name);
	}
}

var check_sidebar = function() {
	if (get('sidebar-hide')=='true') {
    	$("body").addClass('sidebar-collapse');
    	$("body").addClass('sidebar-open');
	}
}

$(function() {

	$('.sidebar-toggle').click(function(e) {
		e.preventDefault();
		store('sidebar-hide', $('body').hasClass('sidebar-collapse sidebar-open'));
	});

	//check_sidebar();

	setTimeout(function() {
		$("#message-status").slideUp('slow');
	}, 2000);

	$('#frmModel .btn-apply').click(function(e){
		e.preventDefault();
		$('#task').val('apply');
		$('#frmModel form').submit();
	});

	$('#frmModel .btn-success').click(function(e){
		e.preventDefault();
		$('#frmModel form').submit();
	});

	$("select").each(function(index) {
		var id = $(this).attr('id');
		if (id) $('#'+id).selectize();
	});
});