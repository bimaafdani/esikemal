<?php 
@session_start();
if(@$_SESSION['Master Admin']) {
?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SIKEMAL</title>
    <link href="img/ico.ico" rel='shortcut icon'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/styles-menu-admin.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script> 
  </head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top"> <!-- membuat menu header hitam -->
        <!-- membuat menu penuh -->
        <a href="index.php" style="color: white"class="navbar-brand"> <font face="Cambria">E-SISTEM INFORMASI KEMENAG LHOKSEUMAWE </font></a>
         <!-- membuat menu bisa di akses via mobile-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse"> 
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#" style="color: white;">Home</a></li>
            <li ><a href="#" style="color: white;">About</a></li>
            <li><a href="#" style="color: white;">Tutorial</a></li>
            <li><a href="#" style="color: white;">Kontak</a></li>
        </ul>
            </div>
        </nav>
        <br/><br/><br/>

      <div class="col-sm-2" style="padding:0px; height:595px; background-color:#006400; color:#fff;"> </br> <center> <img src="img/kmg.jpg" height="110px" width="115px"></br> Anda Login Sebagai :</br> <?php echo "Master Admin"; ?></center> </br> 
      <!-- <h4> <a style="color:black; "  href='#'> <center> <b> DISPOSISI </h4> </b> </center> </br> </a> -->
      <?php include "menu.php";?>
      </div>

   <?php 
         if (isset($_GET['manage'])) {
            include "manage.php";
         } 
         if (isset($_GET['addsurat'])) {
            include "addsurat.php";
         } 
         if (isset($_GET['addsuratkeluar'])) {
            include "addsuratkeluar.php";
            
         if (isset($_GET['profile'])) {
            include "profile.php";  
         }

         }if (isset($_GET['add'])) {
            include "add.php";

         }if (isset($_GET['submit_suratmasuk'])) {
            include "submit_suratmasuk.php";

         }if (isset($_GET['submit_suratkeluar'])) {
            include "submit_suratkeluar.php";
         }
    ?>
    <?php
                    if(isset($_GET['aksi']) == 'delete'){
                      $id = $_GET['id'];
                      $cek = mysqli_query($koneksi, "SELECT * FROM t_user WHERE id='$id'");
                      if(mysqli_num_rows($cek) == 0){
                        echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
                      }else{
                        $delete = mysqli_query($koneksi, "DELETE FROM t_user WHERE id='$id'");
                        if($delete){
                          echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
                          include"manage.php";
                        
                        }else{
                          echo '<div class="alert alert-info">Data gagal dihapus.</div>';
                        }
                      }
                    }
              ?>
  <?php
                    if(isset($_GET['del_SM']) == 'delete'){
                      $idsurat = $_GET['idsurat'];
                      $cek = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE idsurat='$idsurat'");
                      if(mysqli_num_rows($cek) == 0){
                        echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
                      }else{
                        $delete = mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE idsurat='$idsurat'");
                        if($delete){
                          echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
                          include"addsurat.php";
                        
                        }else{
                          echo '<div class="alert alert-info">Data gagal dihapus.</div>';
                        }
                      }
                    }
              ?> 
  <?php
                    if(isset($_GET['del_SK']) == 'delete'){
                      $idsurat = $_GET['idsurat'];
                      $cek = mysqli_query($koneksi, "SELECT * FROM surat_keluar WHERE idsurat='$idsurat'");
                      if(mysqli_num_rows($cek) == 0){
                        echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
                      }else{
                        $delete = mysqli_query($koneksi, "DELETE FROM surat_keluar WHERE idsurat='$idsurat'");
                        if($delete){
                          echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
                          include"addsuratkeluar.php";
                        
                        }else{
                          echo '<div class="alert alert-info">Data gagal dihapus.</div>';
                        }
                      }
                    }
?>       
</body>
</html>

<?php

} else {
  header("location:../index.php");
}
?>