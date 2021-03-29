<?php
include("../koneksi.php");
include("func.php");
?>
<?php 
@session_start();
if(@$_SESSION['username']) {
?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SIKEMAL</title>
    <link href="../image/ico.ico" rel='shortcut icon'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.custom.css"> <!-- buat badge berwarna merah-->
    <link rel="stylesheet" href="../bootstrap/css/simple-sidebar.css">
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
    <script type="text/javascript" src="../dist/sweetalert.min.js"></script>
  </head>

<body>
<nav class="navbar navbar-inverse no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header fixed-brand">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
           <span class="sr-only"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
                 <span style="color : white" class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
              </button>
        </button> 
           <a class="navbar-brand" href="index.php"><i class="fa fa-archive fa-4"></i> E-SIKEMAL</a>   
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
    	    <li><a href="#"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
        	     <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Pengaturan<span class="caret"></span></a>
            	     <ul class="dropdown-menu" role="menu">
                	    <li><a href="edit.php">Edit Data</a></li>
                        <li><a href="password.php">Ganti Password</a></li>
                     </ul>
                 </li>
                 <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a> </li>
         </ul>
    </div><!-- bs-example-navbar-collapse-1 -->
                
 </nav>
	   <div id="wrapper">
        <!-- Sidebar -->
      <div id="sidebar-wrapper">
         	<?php include "menu.php";?>
      </div><!-- /#sidebar-wrapper -->
        <!--PAGE CONTENT -->
  
        <div class="row">
           	 <div class="col-md-12">
	          	<ol class="breadcrumb" style="margin:0px;border-radius:0px;">
	            <li><a href="index.php" class="glyphicon glyphicon-home" style="color: green; padding:3px"></a></li>
	            <li class="active">Edit</li>
	         	</ol>
        	 </div>

        	 <?php
			$sql = mysqli_query($koneksi, "SELECT * FROM t_user WHERE level='Bagian Umum'");
			if(mysqli_num_rows($sql) == 0){
				//header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$nama		= aman($_POST['nama']);
				$nip		= aman($_POST['nip']);
				$email		= aman($_POST['email']);
								
				$update = mysqli_query($koneksi, "UPDATE t_user SET nama='$nama', nip='$nip', email='$email' ") or die(mysqli_error());
				if($update){
					echo "<script>swal('Berhasil :','Perubahan Sudah Dilakukan','success')</script>";
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success">Data berhasil disimpan.</div>';
			}
			?>
			<div class="col-lg-12">
              <div class="panel panel-success">
                    <div class="panel-heading">
                        <li class="glyphicon glyphicon-edit" style="color: green; padding:3px"> </li> Edit Data Pribadi
                   </div> </br>  

                   <form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-lg-4 control-label">NAMA LENGKAP</label>
					<div class="col-lg-4">
						<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" placeholder="NAMA LENGKAP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">NIP</label>
					<div class="col-lg-4">
						<input name="nip" class="form-control" value="<?php echo $row['nip']; ?>" placeholder="NIP" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">EMAIL</label>
					<div class="col-lg-4">
						<input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="EMAIL" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="SIMPAN">
						<a href="index.php" class="btn btn-warning">BATAL</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>
	</div>

	<!-- /#wrapper -->
    <script src="../bootstrap/js/jquery-1.12.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/sidebar-menu.js"></script>
    <script src="../bootstrap/js/bootstrap-datepicker.js"></script>
    <script>
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
    })
    </script>
</body>
</html>

<?php

} else {
  header("location:../index.php");
}
?>