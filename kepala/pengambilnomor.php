<?php
include("../koneksi.php");
include("index.php");
?>
<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="index.php" style="color: green">Home</a></li>
         <li class="active">Data Pengambil Nomor Surat</li>
      </ol>
      <br/>
   </div>
<body>
	<div class="col-md-10" style="padding:0px">
		<div class="content">			
			<?php
						
			$sql = mysqli_query($koneksi, "SELECT * FROM t_user WHERE level='Kepala'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			$no = mysqli_query($koneksi, " SELECT no_surat FROM t_nomor ORDER BY no_surat DESC LIMIT 1");
			$tampung = mysqli_fetch_assoc($no);
			$_SESSION['capnum'] = ((isset($_SESSION['capnum'])) ? $_SESSION['capnum'] : $tampung['no_surat'] );
			if(isset($_POST['pick'])){
			     $_SESSION['capnum']++;
			}
			if (isset($_POST['reset'])){
				$_SESSION['capnum']=0;
			} 

			if (isset($_POST['pick'])) {

				$nama = ($_POST['nama']);
				$nip = ($_POST['nip']);
				$email = ($_POST['email']);
				$no_hp = ($_POST['no_hp']);
				$no_surat = $_SESSION['capnum'];

				$insert = mysqli_query($koneksi, "INSERT INTO t_nomor (nama,nip,email,no_hp,no_surat) VALUES('$nama','$nip','$email','$no_hp','$no_surat')") or die (mysqli_error());
				if ($insert){
					echo '<div class="alert alert-success"> Nomor Surat Sudah di ambil </div>';
				}
			}
	
		?>

			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype='multipart/form-data'>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" placeholder="NAMA LENGKAP">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIP</label>
					<div class="col-sm-3">
						<input name="nip" class="form-control" value="<?php echo $row['nip']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">EMAIL</label>
					<div class="col-sm-3">
						<input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor HP</label>
					<div class="col-sm-3">
						<input type="nohp" name="no_hp" class="form-control" value="<?php echo $row['no_hp']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<p align="middle">
						<input type="submit" name="pick" class="btn btn-primary" value="Ambil No. Surat">
						<input type="submit" name="reset" class="btn btn-danger"value="reset" />
						<br>
						<?php
						echo $_SESSION['capnum'];
						?>
						</p>
					</div>
				</div>
			</form>
				
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>