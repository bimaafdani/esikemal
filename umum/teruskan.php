<?php
include("../koneksi.php");
                  
  if(isset($_GET['terus']) == 'terus'){
  $idsurat = $_GET['idsurat'];
   $terus = mysqli_query($koneksi, "REPLACE INTO t_kasubtu(no_surat, asal, perihal, tgl_surat, tgl_diterima, lampiran, status, sifat, file) SELECT no_surat, asal, perihal, tgl_surat, tgl_diterima, lampiran, status, sifat, file FROM surat_masuk WHERE idsurat='$idsurat'") or die(mysqli_error());
 // $sql = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE idsurat='$idsurat'");
  //$update = mysqli_query($koneksi,"UPDATE surat_masuk SET ket='Diteruskan'") or die (mysqli_error());
    if($terus){
      echo "<script>alert('Data Berhasil Diteruskan Ke Kepala Sub Bagian Tata Usaha'); window.history.back()</script>";
    }else{
      echo "<script>alert('Data Gagal Diteruskan Ke Kasubbag TU'); window.history.back()</script>";
       }
  	}
  ?>       