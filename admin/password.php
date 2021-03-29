<?php
include("koneksi.php");
include_once("index.php");
?>
<body>
	<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="?manage" style="color: green">Home</a></li>
         <li class="active">Profil</li>
      </ol>
      <br/>
   </div>
	<div class="col-md-10" style="padding: 0px" class="container">
		<div class="content">
					
			<p>Ganti Password dengan Username <?php echo '<b>'.$_GET['id'].'</b>'; ?></p>
			
			<?php
			if(isset($_POST['ganti'])){
				$id		= $_GET['id'];
				$password 	= md5($_POST['password']);
				$password1 	= $_POST['password1'];
				$password2 	= $_POST['password2'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM t_user WHERE id='$id' AND password='$password'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-danger">Password sekarang tidak tepat.</div>';
				}else{
					if($password1 == $password2){
						if(strlen($password1) >= 5){
							$pass = md5($password1);
							$update = mysqli_query($koneksi, "UPDATE t_user SET password='$pass' WHERE id='$id'");
							if($update){
								echo '<div class="alert alert-success">Password berhasil dirubah.</div>';
							}else{
								echo '<div class="alert alert-danger">Password gagal dirubah.</div>';
							}
						}else{
							echo '<div class="alert alert-danger">Panjang karakter Password minimal 5 karakter.</div>';
						}
					}else{
						echo '<div class="alert alert-danger">Konfirmasi Password tidak tepat.</div>';
					}
				}
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">PASSWORD SEKARANG</label>
					<div class="col-sm-4">
						<input type="password" name="password" class="form-control" placeholder="PASSWORD SEKARANG" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PASSWORD BARU</label>
					<div class="col-sm-4">
						<input type="password" name="password1" class="form-control" placeholder="PASSWORD BARU" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">KONFIRMASI PASSWORD BARU</label>
					<div class="col-sm-4">
						<input type="password" name="password2" class="form-control" placeholder="KONFIRMASI PASSWORD BARU" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="ganti" class="btn btn-primary" value="GANTI">
						<a href="index.php" class="btn btn-warning">BATAL</a>
					</div>
				</div>
			</form>
		</div>
	</div>