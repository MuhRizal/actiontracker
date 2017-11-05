<style>
.container {
    width: 99%;
}
</style>
<div class="container" style="max-width:99%;" >

	<div class="row">
		<div class="col-md-12 confirm-div alert alert-info form-alert" style="margin:0 15px;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<span id="action_message"></span>
		</div>
		<div class="col-xs-12 col-md-12">  
			
			<?php 
				$action_id="";
				if($this->uri->segment(2)!="") {
					$action_id=$this->uri->segment(3);
					$action=$this->db->query("SELECT action_name FROM at_actions WHERE action_id='$action_id'")->row();
					
				}
				
				
			?>
			<h2>
				<span style="float:left">Action Tracker: &nbsp;</span>
				<select name="action_name" class="form-control" id="action_name" style="float:left;max-width:500px;font-size:13px;font-weight:normal;">
					<option value="">- All actions -</option>
				<?php foreach($action_list as $act){?>
					<option value="<?php echo $act->action_id;?>" <?php if($action_id==$act->action_id) echo "selected";?> >
						<?php echo $act->action_name;?> [<?php echo $act->action_category;?>]
					</option>
				<?php }?>
				</select>
				<br />
				<br />
			</h2>
			<br />
		</div>	
		
		<div class="col-xs-12 col-md-12">	
		
			<table class="table table-striped table-condensed responsive mytable" id="mytable" style="font-size:13px;">
                <thead>
                    <tr>
						<th>Date and time</th>
						<th>Category</th>
						<th>Action Name</th>
						<th>IP</th>
						<th>Platform</th>
						<th>Browser</th>
						<th>Country</th>
						<th>City</th>
                    </tr>
                </thead>
            </table>
			

			
			
			
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.css"/>
 
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.js"></script>

			
			<!--
			<link href="<?=ASSETS?>javascript/DataTables-1.10.13/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
			<link href="<?=ASSETS?>javascript/DataTables-1.10.13/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
			<script src="<?=ASSETS?>javascript/DataTables-1.10.13/media/js/jquery.dataTables.min.js"></script>
			<script src="<?=ASSETS?>javascript/DataTables-1.10.13/media/js/dataTables.bootstrap.min.js"></script>
			<script src="<?=ASSETS?>javascript/DataTables-1.10.13/extensions/Responsive/js/dataTables.responsive.min.js"></script>
			<script src="<?=ASSETS?>javascript/DataTables-1.10.13/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
			-->
			<script type="text/javascript">
				$(document).ready(function() {
					$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
					{
						return {
							"iStart": oSettings._iDisplayStart,
							"iEnd": oSettings.fnDisplayEnd(),
							"iLength": oSettings._iDisplayLength,
							"iTotal": oSettings.fnRecordsTotal(),
							"iFilteredTotal": oSettings.fnRecordsDisplay(),
							"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
							"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
						};
					};

					var t = $("#mytable").dataTable({
						initComplete: function() {
							var api = this.api();
							$('#mytable_filter input')
									.off('.DT')
									.on('keyup.DT', function(e) {
										if (e.keyCode == 13) {
											api.search(this.value).draw();
								}
							});
						},
						responsive: true,
						oLanguage: {
							sProcessing: "loading..."
						},
						pageLength: 25,
						processing: true,
						serverSide: true,
						ajax: {"url": "<?=BASE?>site/data_table/visitor_activity/<?php echo $action_id?>", "type": "POST"},
						/**columns: [
							{
								"data": "campus_id",
								"orderable": false
							},
							{"data": "campus_name"},
							{"data": "province"},
							{"data": "city_name"},
							{"data": "campus_id"}
						],
						**/
						order: [[0, 'desc']],
						rowCallback: function(row, data, iDisplayIndex) {
							
							x=iDisplayIndex+1;
							$(row).html("<td >"+data[0]+"</td><td >"+data[1]+"</td><td >"+data[2]+"</td><td>"+data[3]+"</td><td>"+data[4]+"</td><td>"+data[5]+"</td> <td>"+data[6]+"</td><td>"+data[7]+"</td>");
							return row;
							/**
							var info = this.fnPagingInfo();
							var page = info.iPage;
							var length = info.iLength;
							var index = page * length + (iDisplayIndex + 1);
							$('td:eq(0)', row).html(index);
							**/
						}
					});
				});
			</script>
			
		</div>
	</div>
</div> <!-- /container -->
<br />
<br />

<script>	
	$(document).ready(function() {
		
		
		
		$(document).on("change", "#action_name", function(e) { 
			window.location="https://"+window.location.hostname+"/vt/site/tracker/"+$("#action_name").val();
		});
	});
</script>
				
 
