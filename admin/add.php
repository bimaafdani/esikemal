
<?php
include("koneksi.php");
?>
	<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="admin/?index" style="color: green">Home</a></li>
         <li class="active">Tambah Data Pengguna</li>
      </ol>
      <br/>
   </div>
   <div class="col-md-10" style="padding: 0px" class="container">
		<div class="content">
			
			<?php
			if(isset($_POST['add'])){
				$username	=($_POST['username']);
				$password	=($_POST['password']);
				$password1	=($_POST['password1']);
				$nama		=($_POST['nama']);
				$nip		=($_POST['nip']);
				$email		=($_POST['email']);
				$level		=($_POST['level']);
				
				$cek = mysqli_query($koneksi, "SELECT * FROM t_user WHERE username='$username'");
				if(mysqli_num_rows($cek) == 0){
					if($password == $password1){
						$password = md5($password);
						$insert = mysqli_query($koneksi, "INSERT INTO t_user(username, password, nama, nip, email, level)
						VALUES('$username', '$password', '$nama', '$nip','$email', '$level')") or die(mysqli_error());
						if($insert){
							$insert = mysqli_query ($koneksi, "ALTER TABLE t_user AUTO_INCREMENT=1;");
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
					}else{
						echo '<div class="alert alert-danger">Konfirmasi Password tidak sesuai.</div>';
					}
				}else{
					echo '<div class="alert alert-danger">username sudah terdaftar.</div>';
				}
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-md-3 control-label">USERNAME</label>
					<div class="col-sm-2">
						<input type="text" name="username" class="form-control" placeholder="USERNAME" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PASSWORD</label>
					<div class="col-sm-4">
						<input type="password" name="password" class="form-control" placeholder="PASSWORD" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">KONFIRMASI PASSWORD</label>
					<div class="col-sm-4">
						<input type="password" name="password1" class="form-control" placeholder="KONFIRMASI PASSWORD" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="NAMA LENGKAP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIP</label>
					<div class="col-sm-3">
						<input type="text" name="nip" class="form-control" placeholder="NIP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">EMAIL</label>
					<div class="col-sm-3">
						<input type="email" name="email" class="form-control" placeholder="EMAIL" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">LEVEL</label>
					<div class="col-sm-2">
						<select name="level" class="form-control" required>
							<?php
							$l_sifat	= array('Master Admin','Bagian Umum','Kepala','Kasubbag TU','Kasi PENDIS','Kasi BIMAS','Kasi PHU','Kasi P_Syariah','Analis Kepegawaian','Pengawas Pendidikan','Perencana','Staff');
				
							for ($i = 0; $i < sizeof($l_sifat); $i++) {
							if ($l_sifat[$i] == $level) {
							echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
							} else {
							echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
								}				
							}			
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-success" value="TAMBAH">
						<a href="index.php" class="btn btn-danger">BATAL</a>
					</div>
				</div>
			</form>
		</div>
	</div>