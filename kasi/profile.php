<?php
include("../koneksi.php");
include_once("index.php");
?>
	<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="?manage" style="color: green">Home</a></li>
         <li class="active">Profil</li>
      </ol>
      <br/>
   </div>

	<body>	
	<div class="col-md-10" style="padding: 0px" class="container">
		<div class="content">
			
			<?php
			$id = $_GET['id'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM t_user WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM t_user WHERE id='$id'");
				if($delete){
					echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info">Data gagal dihapus.</div>';
				}
			}
			?>
			<img class="img-responsive img-circle center-block" src="avatar/<?php echo $row['foto']; ?>" width="150"><br />
			<table  class="table table-striped">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $row['id']; ?></td>
				</tr>
				<tr>
					<th >username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
				<tr>
					<th>NAMA LENGKAP</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>NIP</th>
					<td><?php echo $row['nip']; ?></td>
				</tr>
				<tr>
					<th>EMAIL</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>LEVEL</th>
					<td><?php echo $row['level']; ?></td>
				</tr>
			</table>
			
			<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="hapus.php?aksi=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div>
	</div>