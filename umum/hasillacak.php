
<!DOCTYPE html>
<html>
	<head>
		<!-- /.website title -->
		<title>SIPAS - Lacak Surat</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- CSS Files -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
		<!-- Colors -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>

	<body data-spy="scroll" data-target="#navbar-scroll">
		<!-- NAVIGATION -->
		<div id="menu">
			<!-- <nav class="navbar-wrapper navbar-default"> -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid row">

					<div class="col-md-3 navpart-logo">
						<div class=" navbar-brand col-md-12"></div>
					</div>
					<div class="col-md-6 navpart-search">
						<div class="navbar-center col-md-12">
							<div class="input-group search-box">
								<!-- <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-search">&nbsp;</i></span> -->
								<!-- <i class="glyphicon glyphicon-search">&nbsp;</i> -->
								<input type="text" class="form-control" placeholder="Masukkan nomor agenda / nomor registrasi / nomor surat" aria-describedby="basic-addon1">
								<i class="input-group-addon glyphicon glyphicon-search" ></i>
								<span class="input-group-btn"><a type="button" class="btn buttonCari">Cari</a></span>
							</div>
						</div>
					</div>
					<div class="col-md-3 navpart-button">
						<div class="navbar-right col-md-12>
							<div class="btn-group" role="group" aria-label="...">
								<a type="button" class="btn buttonCetak">Cetak</a>
								<a type="button" class="btn buttonUnduh">Unduh</a>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<div class="container-fluid container-report report">
			<div class="container-watermark">
				<div class="img-container normal"></div>
				<div class="img-description">
					<div class="description-title">Lacak Surat</div>
					<div class="description-value">Pencarian surat secara cepat,<br /> lokasi surat anda saat ini</div>
				</div>
			</div>
		</div>
		<!-- /.javascript files -->
		<link href="assets/override.css" rel="stylesheet" media="screen">
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
		<script src="assets/js/jquery.sticky.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>

		<script type="text/javascript" src="app.js"></script>
	</body>
</html>
