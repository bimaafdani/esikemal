<?php
include("../koneksi.php");
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
			$unread = mysqli_query($koneksi, "UPDATE t_kasubtu SET baca='Y' WHERE idsurat='$idsurat'");
			
			$sql = mysqli_query($koneksi, "SELECT * FROM t_kasubtu WHERE idsurat='$idsurat'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
	
			?>
			<table class="table table-striped">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $row['idsurat']; ?></td>
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
					<td><?php echo date('d/m/Y',strtotime($row['tgl_surat']));?> </td>
				</tr>
				<tr>
					<th>Tanggal Diterima</th>
					<td><?php echo date('d/m/Y',strtotime($row['tgl_diterima']));?></td>
				</tr>
				<tr>
					<th>Lampiran</th>
					<td><?php echo $row['lampiran']; ?></td>
				</tr>
				<tr>
					<th>Status</th>
					<td><?php echo $row['status']; ?></td>
				</tr>
				<tr>
					<th>Sifat</th>
					<td><?php echo $row['sifat']; ?></td>
				</tr>
				<tr>
					<th>Catatan</th>
					<td><?php echo $row['catatan']; ?></td>
				</tr>
				
			</table>
			
			<a href="addsurat.php" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
			<a href="e_suratmasuk.php?idsurat=<?php echo $row['idsurat']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="catatan.php?idsurat=<?php echo $row['idsurat']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Tambah Catatan</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>