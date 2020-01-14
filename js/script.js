$(document).ready(function() {
	$('#datatables-fix-header').DataTable({
		dom:'<"container wrapper row" <"col-6"l><"col-6" <"d-flex justify-content-end"f>>">tS<"row"p>',
		fixHeader:true
	});

});
