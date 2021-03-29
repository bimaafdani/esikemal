<?php
include("koneksi.php");
include("index.php");
include("func.php");

?>
<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="?addsurat" style="color: green">Home</a></li>
         <li class="active">Edit Surat Masuk</li>
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
			if(isset($_POST['save'])){
				$no_agenda	= aman($_POST['no_agenda']);
				$no_surat	= aman($_POST['no_surat']);
				$asal		= aman($_POST['asal']);
				$perihal	= aman($_POST['perihal']);
				$tgl_surat	= aman($_POST['tgl_surat']);
				$tgl_diterima = aman($_POST['tgl_diterima']);
				
				$file = $_FILES['file']['name'];
        		$tmp  = $_FILES['file']['tmp_name'];
        		 		 // jika $file ada dan tidak kosong
		        if ((isset($file)) && ($file != "")) {
		            // handle apabila sudah ada file sama yang terupload, maka akan dibuat copynya
		            $uploadfile = (file_exists($upload_path.$file)) ? $upload_path.$file : $upload_path.$file;
		            move_uploaded_file($tmp, $uploadfile);
		            if (chmod($uploadfile, 0775)) {
		                // tampilkan pesan sukses apabila berhasil mengupload file
		                echo "Sukses mengupload file";
		            } else {
		                // tampilkan pesan gagal apabila tidak berhasil mengupload file
		                echo "Gagal mengupload file";
		            }
		        }

				$update = mysqli_query($koneksi, "UPDATE surat_masuk SET no_agenda='$no_agenda', no_surat='$no_surat', asal='$asal', perihal= '$perihal', tgl_surat='$tgl_surat', tgl_diterima='$tgl_diterima', tujuan_surat='$tujuan_surat', file='$file' WHERE idsurat='$idsurat'") or die(mysqli_error());
				if($update){
					header("Location: e_suratmasuk.php?idsurat=".$idsurat."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success">Data berhasil disimpan.</div>';
			}
			?>
			<form class="form-horizontal" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Agenda</label>
					<div class="col-sm-2">
						<input type="text" name="no_agenda" class="form-control" value= "<?php echo $row['no_agenda'];?>"placeholder="No. Agenda" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Surat</label>
					<div class="col-sm-2">
						<input type="text" name="no_surat" class="form-control" value= "<?php echo $row['no_surat'];?>" placeholder="No. Surat" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Asal</label>
					<div class="col-sm-4">
						<textarea name="asal" class="form-control" value= "<?php echo $row['asal'];?>" placeholder="Edit Asal Surat" required></textarea>
				</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Perihal</label>
					<div class="col-sm-4">
						<textarea name="perihal" class="form-control" value= "<?php echo $row['perihal'];?>" placeholder="Edit Perihal Surat" required></textarea>
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
							<input type="text" name="tgl_diterima" class="form-control" value= "<?php echo $row['tgl_diterima'];?>" placeholder="0000-00-00" required>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">File Surat (scan)</label>
					<div class="col-sm-4">
						<input type="file" name="file" value= "<?php echo $row['file'];?>" >
				</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="SIMPAN">
						<a href="index.php" class="btn btn-warning">BATAL</a>
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