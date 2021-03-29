<?php 
@session_start();
if(@$_SESSION['Kepala']) {
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
    <link rel="stylesheet" href="../bootstrap/css/styles-menu-admin.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.custom.css"> <!-- buat badge berwarna merah-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../bootstrap/js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
  </head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> <!-- membuat menu header hitam -->
        <!-- membuat menu penuh -->
        <div class="navbar-header">
        <a href="index.php" style="color: white"class="navbar-brand"> <font face="Cambria">E-SISTEM INFORMASI KEMENAG LHOKSEUMAWE </font></a>
         <!-- membuat menu bisa di akses via mobile-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse"> 
        <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
                   <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Pengaturan<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="edit.php">Edit Data</a></li>
                  <li><a href="password.php">Ganti Password</a></li>
        
                </ul>
              </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
        </ul>
         <script src="../bootstrap/js/bootstrap.min.js"></script>
        </div>

</div>
<br/><br/></br>
      <div class="col-sm-2" style="padding:0px; height:595px; background-color:#006400; color:#fff;"> </br> <center> <img src="../image/kmg.jpg" height="110px" width="115px"></br> Anda Login Sebagai :</br> <?php echo "Kepala"; ?></center> </br> 
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
   
</body>
</html>

<?php

} else {
  header("location:../index.php");
}
?>