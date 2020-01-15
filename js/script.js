$(document).ready(function() {
		let all_nodes_table = $('#all_nodes_table').DataTable({
			fixHeader:true
		});

		$('#datatables-fix-header').DataTable({
			dom:'<"container wrapper row" <"col-4"l><"col-4"B><"col-4" <"d-flex justify-content-end"f>>">tS<"row"p>',
        buttons: [
            'colvis'
       ]
		});

// Formatting data tables dom elements
		$('.dataTables_length').find("select").addClass("browser-default custom-select");
		$('#datatables-fix-header_filter input').addClass("form-control searchBar");
		

// sending value of row to modal form

		$('.ack_btn').click(function(){
				let tr = $(this).closest("tr");
				// let childrens = tr.children();
				let hostname = tr.find(".hostname").text();
				let nid = tr.find(".nid").text();
				let interface = tr.find(".interface").text();
				let description = tr.find(".description").text();
				let last_update = tr.find(".last_update").text();
				let duration = tr.find(".duration").text();

				$('#md_hostname').text(hostname);
				$('#hostname').val(hostname);
				$('#nid').val(nid);

				$('#md_port_no').text(interface);
				$('#port_no').val(interface);

				$('#md_description').text(description);
				$('#description').val(description);

				$('#md_down_time').text(last_update);
				$('#down_time').val(last_update);

				$('#md_duration').text(duration);
				$('#duration').val(duration);
		});

});
