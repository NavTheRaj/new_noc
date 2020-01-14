$(document).ready(function() {
		let all_nodes_table = $('#all_nodes_table').DataTable({
			fixHeader:true
		});

		$('#datatables-fix-header').DataTable({
			dom:'<"container wrapper row" <"col-6"l><"col-6" <"d-flex justify-content-end"f>>">tS<"row"p>',
			fixHeader:true
		});
/*

		// script  to make side appear from left on report tab
	$('#report-tab').on('click',function(){
			$('.leftSideBar').addClass("col-md-8 fadeInRight");
			$('.rightSideBar').addClass("col-md-4");
			$('.rightSideBar').removeClass("d-none");
	});
	// make sidebar disappear when clicked on other two tabs
	$('#home-tab').on('click',function(){
			$('.leftSideBar').removeClass("col-md-8");
			$('.rightSideBar').removeClass("col-md-4");
			$('.rightSideBar').addClass("d-none");
	});
	$('#profile-tab').on('click',function(){
			$('.leftSideBar').removeClass("col-md-8");
			$('.rightSideBar').removeClass("col-md-4");
			$('.rightSideBar').addClass("d-none");
	});
*/

});
