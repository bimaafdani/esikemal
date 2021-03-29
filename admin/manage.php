   <?php
include("koneksi.php");
?>
    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="?home" style="color: green">Home</a></li>
         <li class="success">Data User</li>
      </ol>
   </div>
 <div class="col-md-10" style="min-height:600px">

         <div class="col-md-12" style="padding:10px; padding-left:0;padding-right:0;">
            <a href="?add" class="btn btn-success" >Tambah</a>
         </div>
            <center>
            <table class="table table-bordered">
                  <th class="success">ID</th>
                  <th class="success">Username</th>
                  <th class="success">Nama</th>
                  <th class="success">NIP</th>
                  <th class="success">Email</th>
                  <th class="success">Level</th>
                  <th class="success">Setting</th>
                
              <?php
                
                 $sql = mysqli_query($koneksi, "SELECT * FROM t_user");
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($sql)){
                      echo '
                     <tr>
                        
                        <td>'.$row['id'].'</td>
                        <td>'.$row['username'].'</td>
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['nip'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['level'].'</td>
                         
                        <td>
                        <a href="profile.php?id='.$row['id'].'" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
                        <a href="edit.php?id='.$row['id'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="password.php?id='.$row['id'].'" title="Ganti Password"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>
                        <a href="avatar.php?id='.$row['id'].'" title="Upload Foto"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></a>
                        <a href="hapus.php?aksi=delete&id='.$row['id'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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

