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
        Tambah Data Surat Keluar
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
			// untuk memindahkan file ke tempat uploadan
		    $upload_path = "../surat_keluar/";
		    // handle aplikasi : apabila folder yang dimaksud tidak ada, maka akan dibuat
		    if (!is_dir($upload_path)) {
		        mkdir($upload_path);
		    }
		
			if(isset($_POST['add'])){
				//$nama_klas = ($_POST['nama_klas']);
    				$no_surat	= ($_POST['no_surat']);
    				$no_agenda	= ($_POST['no_agenda']);
    				$perihal	= ($_POST['perihal']);
    				$tujuan_kirim = ($_POST['tujuan_kirim']);
    				$tgl_surat = ($_POST['tgl_surat']);
    				$tgl_kirim = ($_POST['tgl_kirim']);			
    				$file = $_FILES['file']['name'];
        		$tmp  = $_FILES['file']['tmp_name'];

		        // jika $file ada dan tidak kosong
		        if ((isset($file)) && ($file != "")) {
		            // handle apabila sudah ada file sama yang terupload, maka akan dibuat copynya
		            $uploadfile = (file_exists($upload_path.$file)) ? $upload_path.$file : $upload_path.$file;
		            move_uploaded_file($tmp, $uploadfile);
		            if (chmod($uploadfile, 0775)) {
		                // tampilkan pesan sukses apabila berhasil mengupload file
		                echo "Sukses mengupload file";
		            } else {
		                // tampilkan pesan gagal apabila tidak berhasil mengupload file
		                echo "Gagal mengupload file";
		            }
		        }		
				$cek = mysqli_query($koneksi, "SELECT * FROM surat_keluar WHERE no_surat='$no_surat' ");
				if(mysqli_num_rows($cek) == 0){
					$insert = mysqli_query($koneksi, "INSERT INTO surat_keluar (no_agenda, no_surat, perihal, tujuan_kirim, tgl_surat, tgl_kirim, file)
				VALUES('$no_agenda', '$no_surat', '$perihal','$tujuan_kirim', '$tgl_surat', '$tgl_kirim','$file')") or die(mysqli_error());
					if($insert){
						echo "<script>alert('Surat Berhasil Disimpan.');window.location='addsuratkeluar.php'</script>";
					}else{
						echo '<div class="alert alert-danger">Gagal, silahkan coba lagi.</div>';
						}
				} else{
						echo '<div class="alert alert-danger">Nomor Surat Sudah Di Ambil, Coba Yang Lain.</div>';
					} 
			}
?>
      <form class="form-horizontal" method="post" enctype='multipart/form-data'>
				<!--<div class="form-group">
					<label class="col-sm-3 control-label">Surat Tindakan </label>
					<div class="col-sm-2">
						<input type="checkbox" name="tindakan" value="Ya"> Ya
						<input type="text" style="display: none;"name="no_agenda" class="form-control" placeholder="No. Agenda" id="check">
						<input type="checkbox" name="tindakan" value="Bukan"> Tidak
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Klasifikasi Surat</label>
					  <div class="col-sm-3">
							<select name="nama_klas" required class="form-control">
					  			<option>Pilih kode Klasifikasi</option>
					    	<?php
								mysql_connect("localhost", "root", "kemenag2016");
							    mysql_select_db("kemenag");
							    $sql = mysql_query("SELECT * FROM t_klas ORDER BY kd_klas ASC");
							    if(mysql_num_rows($sql) != 0){
							       while($data = mysql_fetch_assoc($sql)){
							            echo '<option>'.$data['kd_klas'].'</option>';
							      }
							   }
							 ?>
							</select>	
					  </div>
				</div>
        -->
        <div class="box-body">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Agenda</label>
					<div class="col-sm-3">
						<input type="text" name="no_agenda" class="form-control" placeholder="No. Agenda" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Surat</label>
					<div class="col-sm-3">
						<input type="text" name="no_surat" class="form-control" placeholder="No. Surat" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Perihal</label>
					<div class="col-sm-3">
						<textarea name="perihal" class="form-control" placeholder="Perihal Surat" required></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Tujuan Kirim</label>
					<div class="col-sm-3">
						<textarea name="tujuan_kirim" class="form-control" placeholder="Tujuan Surat Keluar" required></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Surat</label>
					<div class="col-sm-3">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_surat" class="form-control" placeholder="0000-00-00" required>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Kirim</label>
					<div class="col-sm-3">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_kirim" class="form-control" placeholder="0000-00-00" required>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">File Surat (scan)</label>
					<div class="col-sm-3">
						<input type="file" name="file">
					</div>
				  </div>
				</div> <!-- /.box body -->
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-3">
						<input type="submit" name="add" class="btn btn-success" value="TAMBAH">
						<a href="home.php" class="btn btn-danger">BATAL</a>
					</div>
				</div>
			</form>
		</div> <!-- /.box-primary -->
  		</div>
  	</div>
 </div>
              <!-- /.box-body -->      
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