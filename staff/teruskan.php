<?php
include("../koneksi.php");
include "menu.php";
?>
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
                  if(isset($_GET['terus']) == 'terus'){
                  $idsurat = $_GET['idsurat'];
                     $terus = mysqli_query($koneksi, "INSERT IGNORE INTO t_kasubtu(no_surat, asal, perihal, tgl_surat, tgl_diterima, lampiran, status, sifat, file) SELECT no_surat, asal, perihal, tgl_surat, tgl_diterima, lampiran, status, sifat, file FROM surat_masuk WHERE idsurat='$idsurat'") or die(mysqli_error());
                        
                        if($terus){
                          echo "<script>alert('Data Berhasil Diteruskan Ke Kasubbag TU'); window.history.back()</script>";
                                                
                        }else{
                          echo "<script>alert('Data Gagal Diteruskan Ke Kasubbag TU'); window.history.back()</script>";
                        }
                      }
                    
              ?>       