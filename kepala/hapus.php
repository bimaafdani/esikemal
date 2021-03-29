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
                    if(isset($_GET['del_SM']) == 'delete'){
                      $idsurat = $_GET['idsurat'];
                       $delete = mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE idsurat='$idsurat'");
                        if($delete){
                          echo "<script>alert('Data Berhasil Dihapus'); window.history.back()</script>";
                                                
                        }else{
                          echo '<div class="alert alert-info">Data gagal dihapus.</div>';
                        }
                      }
                    
              ?> 
  <?php
                    if(isset($_GET['del_SK']) == 'delete'){
                      $idsurat = $_GET['idsurat'];
                        $delete = mysqli_query($koneksi, "DELETE FROM surat_keluar WHERE idsurat='$idsurat'");
                        if($delete){
                          echo "<script>alert('Data Berhasil Dihapus'); window.history.back()</script>";
                                                  
                        }else{
                          echo '<div class="alert alert-info">Data gagal dihapus.</div>';
                        }
                      }
                    
?>       