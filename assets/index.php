<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>404 Page Not Found</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		body{
			background:#fff;
		}	
		.wrap{
			margin:0 auto;
			width:1000px;
		}
		.logo h1{
			font-size:200px;
			color:#ec2c22;
			text-align:center;
			margin-bottom:1px;
			text-shadow:4px 4px 1px white;
		}	
		.logo p{
			color:#333;;
			font-size:20px;
			margin-top:1px;
			text-align:center;
		}	
		.logo p span{
			color:lightgreen;
		}	
		.sub a{
			color:#ec2c22;
			text-decoration:none;
			padding:5px;
			font-size:13px;
			font-family: arial, serif;
			font-weight:bold;
		}	
		.footer{
			color:white;
			position:absolute;
			right:10px;
			bottom:10px;
		}	
		.footer a{
			color:#ec2c22;
		}	
	</style>
</head>
<body>
	<div class="wrap">
		<div class="logo">
			<h1>404</h1>
			<p>Halaman yang Anda cari tidak ditemukan. <br />
			Bisa jadi karena url tersebut salah atau tidak tersedia.</p>
			<div class="sub">
			   <p><a href="http://studn.id"> &laquo; Kembali ke studn.id</a></p>
			</div>
		</div>
	</div>
	<div class="footer">
		<?=date('Y')?> studn.id
	</div>
</body>
</html>