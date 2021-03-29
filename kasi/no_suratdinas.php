<?php
include '../koneksi.php';
?>
<?php 
@session_start();
if(@$_SESSION['username']) {
?> 
<html>
<head>
  <!-- <meta http-equiv="refresh" content="120">-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Sikemal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../font-awesome/icon.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/filescan.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../bootstrap/css/font.css">
  <link rel="stylesheet" href="../bootstrap/css/font1.css">
  <link rel="stylesheet" href="../plugins/datepicker/jquery-ui.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
  <link rel="stylesheet" href="..bootstrap/libs/multiple-select.css"/>
  <script src="../bootstrap/js/jquery-1.11.1.js"></script>
  <script src="../plugins/datepicker/jquery-ui.js"></script>
  <script src="../dist/sweetalert.min.js"></script>
  <script src="../bootstrap/js/jquery-latest.js"></script>
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
        Nomor Surat Dinas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Kementerian Agama Kota Lhokseumawe</a></li>
        <li class="active">Beranda</li>
      </ol>
    </section>       
     <!-- Isi Tabel atau content-->
   <section class="col-lg-12">
          <!-- Map box -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Minimize" style="margin-right: 5px;">
                 Minimize <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-clone"></i>

              <h3 class="box-title">
              </h3>
            </div>
            <div class="box-body">
  
            <!-- /.box-body-->
      <div class="box-footer no-border" >
           <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
      <?php
      $level  =  $_SESSION['level'];      
      $sql = mysqli_query($koneksi, "SELECT * FROM t_user WHERE level='$level'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: index.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      $no = mysqli_query($koneksi, " SELECT no_dinas FROM t_nomor ORDER BY no_dinas DESC LIMIT 1");
      $tampung = mysqli_fetch_assoc($no);
      //$_SESSION['dinas'] = ((isset($_SESSION['dinas'])) ? $_SESSION['dinas'] : $tampung['no_dinas'] );
      if (isset($_POST['pick'])) {
        //$_SESSION['dinas']++; // menambah nilai satu pada session
        $nama = ($row['nama']);
        $nip = ($row['nip']);
        $email = ($row['email']);
        $no_hp = ($row['no_hp']);
        $perihal = ($_POST['perihal']);
        $kode_surat = ($_POST['kode_surat']);
        $tgl_surat = $_POST['tgl_surat'];
        $tujuan_kirim = $_POST['tujuan_kirim'];
        $no_surat = $tampung['no_dinas']+1;
        if ($tgl_surat != date ('Y-m-d')){
           echo "<script>
                          swal({ 
                          title:'GAGAL !!',
                          text:'Tanggal Surat Harus sama Dengan Tanggal Hari Ini, Silahkan Minta Sama Buk Indra :)',
                          type : 'error',
                           },
                            function(){
                            window.location=history.back();
                          }); </script>";
        }else{
        //tanggal dan waktu sekarang //$tanggal = gmdate("d-m-Y H:i:s", time()+60*60*7);
        $cek = mysqli_query($koneksi,"SELECT * FROM t_nomor WHERE no_dinas='$no_surat'");
        if(mysqli_num_rows($cek)==0){ //jika tidak ada yang sama maka kerjakan yang dibawah
        $insert = mysqli_query($koneksi, "INSERT INTO t_nomor (nama,nip,email,no_hp, tgl_ambil, perihal, kode_surat, tgl_surat, tujuan_kirim, no_dinas) VALUES('$nama','$nip','$email','$no_hp',NOW(),'$perihal','$kode_surat','$tgl_surat','$tujuan_kirim','$no_surat')") or die (mysqli_error());//NOW digunakan untuk input tanggal dan waktu skarang
        if ($insert){
                 echo "<script>
                  swal({ 
                  title:'Nomor Surat Yang Di Ambil Adalah $no_surat',
                  type : 'success',
                },
                function(){
                  window.location.href='no_suratdinas.php';
                }); </script>";
          //swal('Nomor Surat Yang Di Ambil Adalah $no_surat','','success');
          //window.location='addsurat.php';
          // </script>"; 
          //action="<?php echo $_SERVER['PHP_SELF']; untuk dengan sessio
              }
            }else{
                 echo "<script>
                          swal({ 
                          title:'Oopss..',
                          text:'Sistem Sedang Sibuk Coba Sekali Lagi',
                          type : 'error',
                        }); </script>";
            }
          }
        }

    ?>
      <form action="" class="form-horizontal" method="post" enctype='multipart/form-data'>
            <div class="box-body">
            <div class="form-group">
          <label class="col-sm-3 control-label">KODE SURAT</label>
          <div class="col-sm-4">
            <input type="text" name="kode_surat" value="" class="form-control" placeholder="Ex. PP.00" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">PERIHAL</label>
          <div class="col-sm-4">
            <textarea name="perihal" class="form-control" placeholder="Perihal Surat" required></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">TANGGAL SURAT</label>
          <div class="col-sm-4">
              <input type="date" name="tgl_surat" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">TUJUAN</label>
          <div class="col-sm-4">
            <textarea name="tujuan_kirim" class="form-control" placeholder="Tujuan Surat Keluar" required></textarea>
          </div>
        </div>
        </div> <!-- /.box body -->
        <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-4">
            <input type="submit" name="pick" class="btn btn-primary" value="Ambil No. Surat">
            <a href="" data-toggle="modal" data-target="#myModal"> Lihat Data</a><br>
             <a href="rekapnodinas.php">Export PDF</a>
          </div>
        </div>
        </form>  
             </div>
          </div>
        </div>
      </div>
              <!-- /.box-body -->     
      </section>
          <div  id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Pengambil Nomor Surat</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No.</th>
                                    <th>Pengolah</th>
                                    <th>Kode</th>
                                    <th>Perihal</th>
                                    <th>Tgl. Surat</th>
                                    <th>Tujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $level  =  $_SESSION['nama'];
                                    $query = mysqli_query($koneksi,"SELECT id, tgl_ambil, no_dinas, nama, kode_surat, perihal, tgl_surat, tujuan_kirim FROM t_nomor WHERE no_dinas>='1' AND nama='$level' ");
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                    <tr>
                                        <td><?php echo date('d/m/Y',strtotime($data['tgl_ambil']));?></td>
                                        <td><?php echo $data['no_dinas']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['kode_surat']; ?></td>
                                        <td><?php echo $data['perihal']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($data['tgl_surat'])); ?></td>
                                        <td><?php echo $data['tujuan_kirim']; ?></td>
                                        <td><?php echo ' <a href="e_nosurat.php?id='.$data['id'].'"</a> Edit';?>                  
                                        </td>
                                    </tr>
                                    <?php
                                   }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    <!-- Akhir Tabel atau Content -->
  </div> 
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.2.0
    </div>
    <strong>Copyright &copy; 2016 <a href="http://www.facebook.com/bimaresetu16">Bima Afdani</a>.</strong> All rights
    reserved.  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- jQuery 2.2.3 -->
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
 //tabel lookup mahasiswa
   $(function () {
  $("#lookup").dataTable();
    });
</script> 
</body>
</html>
<?php

} else {
  header("location:../index.php");
}
?>