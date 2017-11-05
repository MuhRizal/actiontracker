		
		
		
		
			<div style="margin-top:12px;">
				<div class="container" >
				
						<p style="margin-top:0;margin-bottom:1px;font-size:11px;text-align:center;">
							
						</p>
							
						
				</div>
			</div>

		

</body>

<link rel="stylesheet" href="<?=ASSETS?>font-awesome-4.7.0/css/font-awesome.min.css">

<script>
	$(document).ready(function () {
		$('.confirm-div').hide();
		<?php if($this->session->flashdata('message')){ ?>
		$('#action_message').html('<?php echo $this->session->flashdata('message'); ?>').show();
		$('.confirm-div').show().delay(2000).slideUp();
		<?php } ?>
	});
</script>



<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$(".datepicker").datepicker({
			dateFormat: 'dd-mm-yy'
		}); 
		
	})
	
	
	function gli_alert(strLabel, strMessage) {
		//-- Init
		"use strict";
		$('body').append(" \
				<div class='modal fade popup_modal' id='popup_modal' tabindex='-1' role=dialog> \
					<div class='modal-dialog' role='document'> \
						<div class='modal-content'> \
							<div class='modal-header'> \
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button> \
								<h4 class='modal-title'></h4> \
							</div> \
							<div class='modal-body'> \
								<div id='modal-msg'></div>\
								<br /> \
								<div class='modal-buttons' style='text-align:right'> \
									<a class='btn btn-default' data-dismiss='modal'>Cancel</a> \
								</div> \
							</div> \
						</div> \
					</div> \
				</div>");

		$('#popup_modal h4').html(strLabel);
		$('#popup_modal #modal-msg').html(strMessage);
		$('#popup_modal').modal();
		$('#popup_modal input[type="button"]').on('click', function () { 
				$('#popup_modal').modal('hide');
				 
		});

		return false;
	}
	
	function gli_confirm(strLabel, strMessage, callback) {
		//-- Init
		"use strict";
		$('body').append(" \
				<div class='modal fade confirm_modal' id='confirm_modal' tabindex='-1' role=dialog> \
					<div class='modal-dialog' role='document'> \
						<div class='modal-content'> \
							<div class='modal-header'> \
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button> \
								<h4 class='modal-title'></h4> \
							</div> \
							<div class='modal-body'> \
								<div id='confirm_msg'></div><br /> \
								<div class='modal-buttons'> \
									<br /> \
									<a class='btn btn-default' data-dismiss='modal'>Cancel</a> \
									<input class='btn btn-primary' type='button' value='OK' autofocus> \
								</div> \
							</div> \
						</div> \
					</div> \
				</div>");

		$('#confirm_modal h4').html(strLabel);
		$('#confirm_modal #confirm_msg').html(strMessage);
		$('#confirm_modal').modal();
		$('#confirm_modal').on('shown.bs.modal', function () {
			$('#confirm_modal .btn-primary').focus();
		});

		$('#confirm_modal input[type="button"]').on('click', function () {
			if (typeof callback === 'function') {
				$('#confirm_modal').modal('hide');
				callback(true);
			}
		});

		return false;
	}
	
	
</script>




</html>