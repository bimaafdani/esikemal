<?php
include '../koneksi.php';
include ('../bootstrap/pagination1.php'); 
?>
 <?php 
    session_start();
    include '../koneksi.php';
    if($_SESSION['level']=="") {
      header("location:../index.php");
    }
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
        SURAT KELUAR
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Kementerian Agama Kota Lhokseumawe</a></li>
        <li class="active">Beranda</li>
      </ol>
    </section>
     <!-- Isi Tabel atau content-->
   <section class="content">   
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="submit_suratkeluar.php" class="btn btn-success" >Tambah Surat Keluar </a>
              <form method="post" class="navbar-form navbar-right">
                <div class="form-group input-group">
                   <input type="text" name="inputan" class="form-control" placeholder="Perihal">
                      <span class="input-group-btn">
                         <input name="cari" class="btn btn-success" value="Cari" type="submit">
                      </span>
                </div>
              </form>
            </div>
            <div class="box-body table-responsive no-padding">
            <table class="table table-bordered">
                <tr>
                  <th class="active"><center>No.</th>
                  <th class="active"><center>No.Agenda</th>
                  <th class="active"><center>No.Surat</th>
                  <th class="active"><center>Tujuan</th>
                  <th class="active"><center>Tgl.Surat</th>
                  <th class="active"><center>File</th>
                  <th class="active"><center>Tindakan</th>
               </tr> 
              <?php
                 if(isset($_POST['cari'])){
               $inputan = $_POST['inputan'];
                  if($inputan==""){
                 $sql = mysqli_query($koneksi, "SELECT * FROM surat_keluar ORDER BY idsurat DESC");
                  }elseif ($inputan!=""){
                  $sql = mysqli_query($koneksi, "SELECT * FROM surat_keluar WHERE perihal LIKE '%$inputan%'");
                  }
                }
                else {
                  $sql = mysqli_query($koneksi, "SELECT * FROM surat_keluar ORDER BY idsurat DESC");
                  }
                  $cek = mysqli_num_rows($sql);
                    if($cek < 1){
                      ?>
                      <tr>
                        <td colspan="7">
                          Tidak Ditemukan Data !!
                        </td>
                      <?php
                    }
                  //pagination config start
                    $rpp = 12; // jumlah record per halaman
                    $reload = "addsuratkeluar.php?pagination=true";
                    $page = intval(isset($_GET["page"])?$_GET["page"]:0);
                    if($page<=0) $page = 1;  
                    $tcount = mysqli_num_rows($sql);
                    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
                    $count = 0;
                    $i = ($page-1)*$rpp;
                    $no_urut = ($page-1)*$rpp;
                    //pagination config end
                  ?>
                    <?php
                        while(($count<$rpp) && ($i<$tcount)) {
                        mysqli_data_seek($sql,$i);
                        $row = mysqli_fetch_assoc($sql);
                      echo '
                     <tr>
                        <td><center>';
                        echo ++$no_urut; echo'.';
                        echo'
                        <td><center>'.$row['no_agenda'].'</td>
                        <td><center>'.$row['no_surat'].'</td>
                        <td>'.$row['tujuan_kirim'].'</td>
                        <td><center>' ;
                        echo date('d/m/Y',strtotime($row['tgl_surat']));  
                        echo '
                        </td>
                        <td width=1%> <a href="../surat_keluar/'.$row['file'].'"target = "_blank"> <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> </a>
                        </td>
                        <td width=5%> 
                        <a href="l_suratkeluar.php?idsurat='.$row['idsurat'].'" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
                        <a href="e_suratkeluar.php?idsurat='.$row['idsurat'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                          </td>
                        </tr>
                        ';
                        $i++;
                       $count++; 
                       }
                    ?>
            </table>
              <center><?php echo paginate_one($reload, $page, $tpages);?></center>
              </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>
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
 