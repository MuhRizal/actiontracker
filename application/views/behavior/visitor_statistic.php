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
			<h2>Visitor Behavior</h2>
			<br />
		</div>	
		<div class="col-xs-12" style="border-bottom:1px solid #ddd;">
			<ul class="nav nav-pills ">
				<li role="presentation"><a href="<?=BASE?>behavior/visitor_activity">Activity</a></li>
				<li role="presentation" class="active"><a href="<?=BASE?>behavior/visitor_statistic">Statistic</a></li>
			</ul>
		</div>
		<div class="col-xs-12 col-md-12" style="font-size:11px;">	
			<br />
			<h4><u>Unique Visitor</u></h4>
			
			<div class="row">
				<div class="col-xs-6 col-md-2">
					<b><u>Previous Week</u></b>
					<br />
					<?php
						$week_number = date('W')-1;
						$year = date('Y');
						for($i=1;$i<=7;$i++){
							$day[$i] = date("Y-m-d", strtotime($year."W".str_pad($week_number,2,0,STR_PAD_LEFT).$i));
							$get_day=$day[$i];
							$sql_unique_visitor="SELECT DISTINCT ip_address FROM st_behavior WHERE created_date like '$day[$i]%'";
							$num_visitor=$this->db->query($sql_unique_visitor)->num_rows();
							echo $day[$i].": <b>".$num_visitor."</b>"; 
							echo "<br />";
						}
					?>
				</div>
				<div class="col-xs-6 col-md-2">
					<b><u>This week</u></b>
					<br />
					<?php
						$week_number = date('W');
						$year = date('Y');
						for($i=1;$i<=7;$i++){
							$day[$i] = date("Y-m-d", strtotime($year."W".str_pad($week_number,2,0,STR_PAD_LEFT).$i));
							$get_day=$day[$i];
							$sql_unique_visitor="SELECT DISTINCT ip_address FROM st_behavior WHERE created_date like '$day[$i]%'";
							$num_visitor=$this->db->query($sql_unique_visitor)->num_rows();
							echo $day[$i].": <b>".$num_visitor."</b>"; 
							echo "<br />";
						}
					?>	
				</div>
			</div>
		</div>
	</div>
</div> <!-- /container -->
<br />
<br />

	
 
