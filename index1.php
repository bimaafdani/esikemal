
	<!DOCTYPE html>
	<html>
	<head>	
	<title>E-Sikemal Login</title>
	<link href="../image/ico.ico" rel='shortcut icon'>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap CSS <link href="css/animate.css" rel="stylesheet">-->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/animate.css" rel="stylesheet">
	<link href="bootstrap/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
	</head>	 

	<style>
		body{
				
			}
			.title-apps{
				margin-top: 10%;
				color: #FFD700;
				text-shadow: 0 0 5px black, 0 0 10px black, 0 0 15px black, 0 0 20px #FFD700, 0 0 30px #FFD700, 0 0 40px #FFD700, 0 0 50px #FFD700, 0 0 75px #FFD700;
				font: 50px 'ChunkFiveRegular';
				text-align: center;
			}
			.sub-title{
				color: #FFD700;
				text-align:center;
			}
			.box{
				border-radius: 4%;
				border-color:#FFD700;
				border: 5px solid #cecece;
				padding: 10%;
				margin-top: 8%;
				background: #fff;
			}
			@media only screen and (max-device-width:480px){
				.title-apps{
					margin-top: 10%;
					text-align: center;
				}
				.box{
					margin-top: 5%;
				}
			}	
	</style>

	<body style="background-image:url(image/bg.jpg); background-position: center;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-4 col-md-offset-4">
				<h1 style="animation-delay: 1s;" class="title-apps animated fadeInDown">E-SIKEMAL</h1>
				<h3 class="sub-title">
					<span class='animated bounceInLeft' style="animation-delay: 1s;">Elektronik</span>
					<span class='animated bounceInUp' style="animation-delay: 1s;">Sistem Informasi Kementerian Agama Lhokseumawe</span>

				</h3>
					<div class="box animated bounceInDown">
					<small class="animated fadeIn" style="animation-delay: 1s;">Silahkan Login</small>
					<hr/>
						<form method="POST" action="cek_login.php" class="form-horizontal" role="form">
							<div class="form-group has-feedback animated bounceInLeft" style="animation-delay: 1s;">
					            <input type="text" name="username" class="form-control" placeholder="Username" required="" />
					            <span class="glyphicon glyphicon-user form-control-feedback"></span>
					        </div>

							<div class="form-group has-feedback animated bounceInRight" style="animation-delay: 1s;">
					            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					         </div>

							<div class="form-group animated bounceInDown" style="animation-delay: 1s;">
								<div class="col-sm-8 col-sm-offset-2">
									<button type="submit"class="btn btn-success btn-block">Login<span class="fa fa-key"></span></button>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</br> 
		<!-- jQuery -->
		<script src="js/jquery-1.12.1.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>