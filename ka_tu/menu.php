<?php 
@session_start();
if(@$_SESSION['username']) {
?> 
<ul class="sidebar-menu">
        <li class="header">MENU NAVIGASI</li>
      <li class="active treeview">
      <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope fa-fw"></i> <span>Surat Masuk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="suratmasuk.php"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
            <li><a href="disp_kepala.php"><i class="fa fa-circle-o"></i> Disposisi Kepala</a></li>
            <li class="active"><a href="lacak.php"><i class="fa fa-circle-o"></i> Cari Surat</a></li>
            <li><a href="develop.php"><i class="fa fa-circle-o"></i> Status Surat</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope-o fa-fw"></i> <span>Surat Keluar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addsuratkeluar.php"><i class="fa fa-circle-o"></i> Tambah Surat</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-sort-numeric-asc"></i>
            <span>Nomor Surat</span>
         <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="no_suratdinas.php"><i class="fa fa-circle-o"></i> Nomor Surat Dinas</a></li>
          </ul>
        </li>
   </ul>
<?php
} else {
  header("location:../index.php");
}
?>