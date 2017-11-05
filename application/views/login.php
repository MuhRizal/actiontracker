 
<div class="container" >
	<div class="row"> 
			<form class="form-signin" action="" method="POST" role="form" style="max-width:320px;margin:0 auto;">
				
				<br />
				<br />
				<h3 class="form-signin-heading"><b>Login</b></h3>
				<br />
				<div class="row" id="message">
					<div class="col-xs-12 col-sm-12">
						<?=$this->session->flashdata('message');?>
					</div>
				</div>
				<div class="form-group">
					<label>Username</label> 
					<input type="text" name="email" id="st_email" class="form-control placeholder-no-fix" placeholder="Username" required autofocus>
				</div>
				<div class="form-group">
					<label>Password</label> 
					<input type="password" name="password" id="st_password" class="form-control" placeholder="Password" required>
				</div>
				<div class="form-group">
					
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="sign_in" value="Login" style="font-weight:bold;" />
					
				</div>
				

				
			</form>
		
	</div>
</div> <!-- /container -->
 
