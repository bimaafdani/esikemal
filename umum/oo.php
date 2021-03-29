<table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No.</th>
                                    <th>Pengolah</th>
                                    <th>Kode</th>
                                    <th>Perihal</th>
                                    <th>Tgl. Surat</th>
                                    <th>Tujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                               <?php
                                    include '../koneksi.php';
                                    $query = mysqli_query($koneksi,'SELECT * FROM t_nomor');
                                    while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                  
                                    <tr>
                                        <td><?php echo date('d/m/Y',strtotime($data['tgl_ambil']));?></td>
                                        <td><?php echo $data['no_dinas']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['kode_surat']; ?></td>
                                        <td><?php echo $data['perihal']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($data['tgl_surat'])); ?></td>
                                        <td><?php echo $data['tujuan_kirim']; ?></td>
                                        <td><?php echo ' <a href="e_nosurat.php?id='.$data['id'].'"</a> Edit';?>                  
                                        </td>
                                    </tr>
                                    <?php
                                   }
                                ?> 
                            </tbody>
                        </table> 
<script>
 //            tabel lookup mahasiswa
   $(function () {
  $("#lookup").dataTable();
    });
</script> 