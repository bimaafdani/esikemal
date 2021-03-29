<?php
include("../koneksi.php");
?>
  <?php
                  if(isset($_GET['terus']) == 'terus'){
                  $idsurat = $_GET['idsurat'];
                     $terus = mysqli_query($koneksi, "INSERT IGNORE INTO t_kepala(no_surat, asal, perihal, tgl_surat, tgl_diterima, lampiran, status, sifat, file, catatan) SELECT no_surat, asal, perihal, tgl_surat, tgl_diterima, lampiran, status, sifat, file, catatan FROM t_kasubtu WHERE idsurat='$idsurat'") or die(mysqli_error());
                        
                        if($terus){
                          echo "<script>alert('Data Berhasil Diteruskan Ke Kepala'); window.location='suratmasuk.php'</script>";
                                                
                        }else{
                          echo "<script>alert('Data Gagal Diteruskan Ke Kepala'); window.history.back()</script>";
                        }
                      }
                    
              ?>       