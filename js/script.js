// Material Design example
$(document).ready(function () {

$('#down_nodes_table').DataTable( {
dom:'<"row m-0 p-0 d_table_controller"<"col-2"l><"col-6 d-flex justify-content-end"B><"col-4 d-flex justify-content-end"f>>t<"row"<"col-6"i><"col-6 d-flex justify-content-end"p>>',
        // lengthChange: false,
        // buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
					buttons:[
								{
											extend:'csv',
											exportOptions:{
													columns:[':visible :not(.js-not-exportable)']
											}
								},
								{
											extend:'excel',
											exportOptions:{
													columns:[':visible :not(.js-not-exportable)']
											}
								},
								{
											extend:'pdf',
											exportOptions:{
													columns:[':visible :not(.js-not-exportable)']
											}
								},
								{
											extend:'colvis'
								}
					],
					fixedHeader: true
    } );
 
		// Styling Datatables length selector

  $('#down_nodes_table_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#down_nodes_table_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
	
	$('#down_nodes_table_wrapper .dataTables_filter').find('label').each(function(){
		const $this = $(this);
		$this.detach();
	});


// All nodes 
$('#all_nodes_table').DataTable();

$('#acknowledge_table').DataTable({
dom:'<"row m-0 p-0 d_table_controller"<"col-2"l><"col-6 d-flex justify-content-end"B><"col-4 d-flex justify-content-end"f>>t<"row"<"col-6"i><"col-6 d-flex justify-content-end"p>>',
        // lengthChange: false,
        // buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
					buttons:[
								{
											extend:'csv',
											exportOptions:{
													columns:[':visible :not(.js-not-exportable)']
											}
								},
								{
											extend:'excel',
											exportOptions:{
													columns:[':visible :not(.js-not-exportable)']
											}
								},
								{
											extend:'pdf',
											exportOptions:{
													columns:[':visible :not(.js-not-exportable)']
											}
								},
								{
											extend:'colvis'
								}
					],
					fixedHeader: true

});


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

		// Removing certain menu options based on ack_status
			$(".ACKed_color").find(".ack_btn").detach();

});
