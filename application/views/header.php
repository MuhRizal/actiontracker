<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
  <head>
	<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Studn.id">
	<title>Assessment Tracker</title>
	<link rel="shortcut icon" href="<?=ASSETS?>images/icon/favicon.ico">
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>-->
   
    <!-- Bootstrap core CSS -->
	
	<link href="<?=BOOTSTRAP?>css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style> 
      
		html {
		  position: relative;
		  min-height: 100%;
		}
		body {
			font-family: 'nsans', 'Open Sans', Arial, "Segoe UI", "Helvetica", Garuda, sans-serif;
		
			-webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
			margin-bottom:15px;
			color:#000;
			font-size:13px;
		}
		h2 {
			font-size: 26px;
			padding: 0px 15px;
			font-weight:bold;
		}
		.container{margin-top:0px;border:0px solid #ccc;max-width:980px;}  
		#footer .container, .navbar .container{margin-top:0px;border:0px solid #ccc;max-width:100%;}
		#footer {
			padding:0;
			position: absolute;
			bottom: 0;
			width: 100%;
			background-color:#111;
			font-size:14px;
		}
		#footer p a {color:#fff;}
		#footer .footer-link{text-align: left;}
		#footer .footer-link a {margin-left:0px;margin-right:8px;}
		
		.confirm-div{display:none;}
	</style>
	
	
	<script src="<?=ASSETS?>javascript/jquery-2.1.4.min.js"></script>
	<script src="<?=BOOTSTRAP?>js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?=JQUERYUI?>themes/base/jquery.ui.all.css">
	<script src="<?=JQUERYUI?>ui/jquery.ui.core.js"></script>
	<script src="<?=JQUERYUI?>ui/jquery.ui.widget.js"></script>
	<script src="<?=JQUERYUI?>ui/jquery.ui.datepicker.js"></script>
	
	<script src="<?=ASSETS?>javascript/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<link rel="stylesheet" href="<?=ASSETS?>javascript/bootstrap-select/dist/css/bootstrap-select.min.css">
	
	
  </head>

  <body>

	<div class="navbar navbar-default navbar-static-top" role="navigation" >
		<div class="container" style="padding:0px 20px;">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?=BASE?>" id="app_logo">
					<?=APPNAME?>
				</a>
			</div>
			<div class="navbar-collapse collapse" >
				<?php if($this->session->userdata('is_logged_in')==TRUE) { ?>
				<ul class="nav navbar-nav">
					<li <?php if($this->uri->segment(2)=="action") echo "class='active'";?>><a href="<?=BASE?>site/action">Actions</a></li>
					<li <?php if($this->uri->segment(2)=="tracker") echo "class='active'";?>><a href="<?=BASE?>site/tracker">Tracker</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php
								$fullname =$this->session->userdata('fullname');
								$name=explode(" ",$fullname);
								$firstname=$name[0];
							?>
							<?=$firstname?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li ><a href="<?=BASE?>site/logout">Logout</a></li>
						</ul>
					</li>
				</ul>
				<?php }?>
			</div><!--/.nav-collapse -->
		</div>
    </div>
	
	