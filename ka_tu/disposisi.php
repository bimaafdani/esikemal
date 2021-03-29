<?php
include '../koneksi.php';
?>
<?php 
@session_start();
if(@$_SESSION['username']) {
?> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Sikemal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../font-awesome/icon.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
  <script type="text/javascript" src="../dist/sweetalert.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E-SIKEMAL</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E-</b>SIKEMAL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $_SESSION['foto']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Pengaturan</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nama']; ?>
                  <small>2016</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="password.php" class="btn btn-default btn-flat" title="Ganti Password"><i class="fa fa-key"></i></a>
                   <a href="edit.php" class="btn btn-default btn-flat" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
                    <a href="../logout.php" class="btn btn-default btn-flat" title="Keluar"><i class="fa fa-power-off"></i></a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
      include 'menu.php';
      ?> 

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Surat Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Kementerian Agama Kota Lhokseumawe</a></li>
        <li class="active">Beranda</li>
      </ol>
    </section>
    <!-- Isi Tabel atau content-->
     <section class="col-lg-12 connectedSortable">
          <!-- Map box -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-body">
            <!-- /.box-body-->
                <div class="box-footer no-border" >
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->			
			<?php
			  if(isset($_GET['terus']) == 'terus'){
                  $idsurat = $_GET['idsurat'];
                     $terus = mysqli_query($koneksi, "INSERT IGNORE INTO t_disp_tu(idsurat, no_surat, asal, perihal, tgl_surat, tgl_terima, lampiran, status, sifat, file)
                      SELECT idsurat, no_surat, asal, perihal, tgl_surat, tgl_diterima, lampiran, status, sifat, file FROM t_kepala WHERE idsurat='$idsurat'") or die(mysqli_error());                         
                
                $sql = mysqli_query($koneksi, "SELECT * FROM t_disp_tu WHERE idsurat='$idsurat'");
                if(isset($_POST['save'])){
          				$isi_disposisi = ($_POST['isi_disposisi']);
          				$petunjuk = ($_POST['petunjuk']);
          				$penerima = ($_POST['penerima']);
                  if (empty($_POST['penerima'])){
                    echo "<script>alert('Penerima Belum Dipilih'); window.history.back()</script>";
                  }else{
          				$banyak = implode(', ' ,$penerima);

				$disp = mysqli_query($koneksi, "UPDATE t_disp_tu SET disposisi_tu='$isi_disposisi', petunjuk='$petunjuk', penerima_tu= '$banyak' WHERE idsurat='$idsurat'") or die(mysqli_error());
				}
				if($disp){
					echo "<script>
                  swal({ 
                  title:'Berhasil, Surat Sudah Diteruskan',
                  type : 'success',
                },
                function(){
                  window.location.href='disp_kepala.php';
                }); </script>";
				}else{
					echo '<div class="alert alert-danger">Catatan Gagal Di Tambah, silahkan coba lagi.</div>';
					}
			 	 }
              }
			  
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Disposisi Kepala Kepada</label></br>
					<div class="col-sm-4">
						<fieldset>
						<legend>Pilih Penerima</legend>
						<input type="checkbox" name="penerima[]" value="Bagian Umum"> Bagian Umum</br>
						<input type="checkbox" name="penerima[]" value="Analis Kepegawaian"> Analis Kepegawaian</br>
						<input type="checkbox" name="penerima[]" value="Bagian Keuangan"> Bagian Keuangan </br>
						</fieldset>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Pilih Petunjuk</label></br>
					<div class="col-sm-4">
					<select name="petunjuk" required>    
					
					<option value="">Petunjuk</option>    
					<option value="Setuju">Setuju</option> 
					<option value="Tolak">Tolak</option>
					<option value="Teliti & Pendapat">Teliti & Pendapat</option>
					<option value="Untuk Diketahui">Untuk Diketahui</option>
					<option value="Selesaikan">Selesaikan</option>
					<option value="Sesuai Catatan">Sesuai Catatan</option>
					<option value="Untuk Perhatian">Untuk Perhatian</option>
					<option value="Edarkan">Edarkan</option>
					<option value="Jawab">Jawab</option>
					<option value="Perbaiki">Perbaiki</option>
					<option value="Bicarakan Dengan Saya">Bicarakan Dengan Saya</option>
					<option value="Bicarakan Bersama">Bicarakan Bersama</option>
					<option value="Ingatkan">Ingatkan</option>
					<option value="Simpan">Simpan</option>
					<option value="Disiapkan">Disiapkan</option>
					<option value="Harap Dihadiri/Wakili">Harap Dihadiri/Wakili</option>

					</select> 
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Catatan Kasubbag TU</label></br>
					<div class="col-sm-4">
            <textarea name="isi_disposisi" class="form-control" placeholder="Catatan/ Isi Disposisi" required></textarea>
				</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="TERUSKAN">
						<a href="disp_kepala.php" class="btn btn-warning">BATAL</a>
					</div>
				</div>
			</form>
		</div> <!-- /.box-primary -->
  		</div>
	    </div>
	 </div> <!-- /.box-body --> 
	</section>
    <!-- Akhir Tabel atau Content -->
  </div> 
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.2.0
    </div>
    <strong>Copyright &copy; 2016 <a href="http://www.facebook.com/bimaresetu16">Bima Afdani</a>.</strong> All rights
    reserved.  
   </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="../https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
<?php

} else {
  header("location:../index.php");
}
?>