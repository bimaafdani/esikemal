<?php
include("../koneksi.php"); 
@session_start();
?>
<?php
if(@$_SESSION['username']) {
?>
  <?php
                    if(isset($_GET['del_SM']) == 'delete'){
                      $idsurat = $_GET['idsurat'];
                       $delete = mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE idsurat='$idsurat'");
                        if($delete){
                          echo "<script>alert('Data Berhasil Dihapus'); window.location='addsurat.php'</script>";
                                                
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
                          echo "<script>alert('Data Berhasil Dihapus'); window.location=history.go(-1)</script>";
                                                  
                        }else{
                          echo '<div class="alert alert-info">Data gagal dihapus.</div>';
                        }
                      }
                    
?>       
 <?php
                    if(isset($_GET['del_kat']) == 'delete'){
                      $kd_klas = $_GET['kd_klas'];
                       $delete = mysqli_query($koneksi, "DELETE FROM t_klas WHERE kd_klas='$kd_klas'");
                        if($delete){
                          echo "<script>alert('Data Berhasil Dihapus'); window.location=history.go(-1)</script>";
                                                
                        }else{
                          echo '<div class="alert alert-info">Data gagal dihapus.</div>';
                        }
                      }
                    
              ?>
 