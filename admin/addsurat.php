   <?php
include("koneksi.php");
?>
    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="?index" style="color: green">Home</a></li>
         <li class="active">Surat Masuk</li>
      </ol>
   </div>
 <div class="col-md-10" style="min-height:600px">

          <div class="col-md-12" style="padding:10px; padding-left:0;padding-right:0;">
            <a href="?submit_suratmasuk" class="btn btn-success" >Catat Surat Masuk</a>
         </div>
            <center>
            <table class="table table-bordered">
                  <th class="active">Nomor Agenda</th>
                  <th class="active">Nomor Surat</th>
                  <th class="active">Perihal</th>
                  <th class="active">Asal</th>
                  <th class="active">Tanggal Surat</th>
                  <th class="active">Tanggal Terima</th>
                  <th class="active">File Surat</th>
                  <th class="active">Tindakan</th>
               </tr> 
              
              <?php
                
                 $sql = mysqli_query($koneksi, "SELECT * FROM surat_masuk");
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($sql)){
                      echo '
                     <tr>
                        
                        <td>'.$row['no_agenda'].'</td>
                        <td>'.$row['no_surat'].'</td>
                        <td>'.$row['perihal'].'</td>
                        <td>'.$row['asal'].'</td>
                        <td>'.$row['tgl_surat'].'</td>
                        <td>'.$row['tgl_diterima'].'</td>
                        <td><a href="surat_masuk/'.$row['file'].'"target = "_blank">'.$row['file'].'</td>
                        <td>
                        <a href="l_suratmasuk.php?idsurat='.$row['idsurat'].'" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
                        <a href="e_suratmasuk.php?idsurat='.$row['idsurat'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="hapus.php?del_SM=delete&idsurat='.$row['idsurat'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        <a href="#?idsurat='.$row['idsurat'].'" title="Disposisi"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                          </td>
                    </tr>
                    ';
                   }
            ?>
            </table> </center>

            <div class="col-md-12">
               <nav align="center">
                 <ul class="pagination">
                   <li>
                     <a href="#" aria-label="Previous">
                       <span aria-hidden="true">&laquo;</span>
                     </a>
                   </li>
                   <li><a href="#">1</a></li>
                   <li><a href="#">2</a></li>
                   <li><a href="#">3</a></li>
                   <li><a href="#">4</a></li>
                   <li><a href="#">5</a></li>
                   <li>
                     <a href="#" aria-label="Next">
                       <span aria-hidden="true">&raquo;</span>
                     </a>
                   </li>
                 </ul>
               </nav>

            </div>
   </div>

