<?php
include("koneksi.php");
include("index.php");
?>
<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="index.php" style="color: green">Home</a></li>
         <li class="active">Data Surat Masuk</li>
      </ol>
      <br/>
   </div>
<body>
	<div class="col-md-10" style="padding:0px">
		<div class="content">			
			<?php
			$idsurat = $_GET['idsurat'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE idsurat='$idsurat'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE idsurat='$idsurat'");
				if($delete){
					echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info">Data gagal dihapus.</div>';
				}
			}
			?>
			<table class="table table-striped">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $row['idsurat']; ?></td>
				</tr>
				<tr>
					<th>No. Agenda</th>
					<td><?php echo $row['no_agenda']; ?></td>
				</tr>
				<tr>
					<th>No. Surat</th>
					<td><?php echo $row['no_surat']; ?></td>
				</tr>
				<tr>
					<th>Perihal</th>
					<td><?php echo $row['perihal']; ?></td>
				</tr>
				<tr>
					<th>Asal</th>
					<td><?php echo $row['asal']; ?></td>
				</tr>
				<tr>
					<th>Tanggal Surat</th>
					<td><?php echo $row['tgl_surat']; ?></td>
				</tr>
				<tr>
					<th>Tanggal Diterima</th>
					<td><?php echo $row['tgl_diterima']; ?></td>
				</tr>
				<tr>
					<th>Tujuan Surat</th>
					<td><?php echo $row['tujuan_surat']; ?></td>
				</tr>
			</table>
			
			<a href="index.php?manage" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
			<a href="e_suratmasuk.php?idsurat=<?php echo $row['idsurat']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="l_suratmasuk.php?addsurat=aksi=delete&idsurat=<?php echo $row['idsurat']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>