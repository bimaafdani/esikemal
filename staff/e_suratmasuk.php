<?php
include("../koneksi.php");
include("index.php");
?>
<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="?addsurat" style="color: green">Home</a></li>
         <li class="active">Edit Surat Masuk</li>
      </ol>
      <br/>
   </div>
  <head>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
  </head>
<body>
	<div class="col-md-10" style="padding:0px">
		<div class="content">		
			<?php
			$idsurat = $_GET['idsurat'];
			$sql = mysqli_query($koneksi, "SELECT * FROM t_kasubtu WHERE idsurat='$idsurat'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$no_surat	= ($_POST['no_surat']);
				$asal		= ($_POST['asal']);
				$perihal	=($_POST['perihal']);
				$tgl_surat	= ($_POST['tgl_surat']);
				$tgl_diterima = ($_POST['tgl_diterima']);
				$lampiran	=($_POST['lampiran']);
				$status	= ($_POST['status']);
				$sifat = ($_POST['sifat']);
	
				$update = mysqli_query($koneksi, "UPDATE t_kasubtu SET no_surat='$no_surat', asal='$asal', perihal= '$perihal', tgl_surat='$tgl_surat', tgl_diterima='$tgl_diterima', lampiran='$lampiran', status='$status', sifat='$sifat' WHERE idsurat='$idsurat'") or die(mysqli_error());
				if($update){
					echo '<div class="alert alert-success">Data Berhasil Di Ubah.</div>';
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			?>
			<form class="form-horizontal" action="" method="post">
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Surat</label>
					<div class="col-sm-2">
						<input type="text" name="no_surat" class="form-control" value= "<?php echo $row['no_surat'];?>" placeholder="No. Surat" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Asal</label>
					<div class="col-sm-4">
						<textarea name="asal" class="form-control" placeholder="Edit Asal Surat"><?php echo $row['asal']; ?> 
						</textarea>
				</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Perihal</label>
					<div class="col-sm-4">
						<textarea name="perihal" class="form-control" placeholder="Edit Perihal Surat"> <?php echo $row['perihal'];?> 
						</textarea>
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Lampiran</label>
					<div class="col-sm-2">
						<input type="text" name="lampiran" class="form-control" value= "<?php echo $row['lampiran'];?>" placeholder="Lampiran" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<input type="checkbox" name="status" value="Asli"> Asli
						<input type="checkbox" name="status" value="Tembusan"> Tembusan
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Sifat</label>
					<div class="col-sm-4">
						<input type="checkbox" name="sifat" value="Sangat Segera"> Sangat Segera
						<input type="checkbox" name="sifat" value="Segera"> Segera
						<input type="checkbox" name="sifat" value="Biasa"> Biasa
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Surat</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_surat" class="form-control" value= "<?php echo $row['tgl_surat'];?>" placeholder="0000-00-00" required>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>

					<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Terima</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_diterima" class="form-control" value= "<?php echo $row['tgl_diterima'];?>" placeholder="00-00-0000" required>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="SIMPAN">
						<a href="addsurat.php" class="btn btn-warning">BATAL</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>