<?php
include("koneksi.php");
include("func.php");
?>
	<script src="js/jquery-1.12.1.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
	<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="?index" style="color: green">Home</a></li>
         <li class="active">Catat Surat Masuk & Isi Lembar Disposisi</li>
      </ol>
      <br/>
   </div>
	<div  class="col-md-10" style="padding: 0px"  class="container">
		<div class="content">
			<?php
			// untuk memindahkan file ke tempat uploadan
		    $upload_path = "Surat_Masuk/";
		    // handle aplikasi : apabila folder yang dimaksud tidak ada, maka akan dibuat
		    if (!is_dir($upload_path)) {
		        mkdir($upload_path);
		    }
		
			if(isset($_POST['add'])){
				
				$no_surat	= aman($_POST['no_surat']);
				$tgl_surat	= aman($_POST['tgl_surat']);
				$lampiran	= aman($_POST['lampiran']);
				$tgl_diterima = aman($_POST['tgl_diterima']);
				$no_agenda	= aman($_POST['no_agenda']);
				$status		= aman($_POST['status']);
				$sifat	= aman($_POST['sifat']);
				$no_agenda	= aman($_POST['no_agenda']);
				$asal		= aman($_POST['asal']);
				$perihal	= aman($_POST['perihal']);
								
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

				$cek = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE no_agenda='$no_agenda'");
				if(mysqli_num_rows($cek) == 0){
					
				$insert = mysqli_query($koneksi, "INSERT INTO surat_masuk (no_agenda, no_surat, asal, perihal, tgl_surat, tgl_diterima, tujuan_surat, file)
				VALUES('$no_agenda', '$no_surat', '$asal', '$perihal','$tgl_surat', '$tgl_diterima', '$tujuan_surat','$file')") or die(mysqli_error());
					if($insert){
						echo '<div class="alert alert-success">Surat Berhasil Di Catat.</div>';
					}else{
						echo '<div class="alert alert-danger">Gagal, silahkan coba lagi.</div>';
					}
					}else{
						echo '<div class="alert alert-danger">Nomor Agenda Sudah Ada, Coba Yang Lain.</div>';
					} 
			}

?>	
			<form class="form-horizontal" method="post" enctype='multipart/form-data'>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Surat</label>
					<div class="col-sm-2">
						<input type="text" name="no_surat" class="form-control" placeholder="No. Surat" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Surat</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_surat" class="form-control" placeholder="0000-00-00" required>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Lampiran</label>
					<div class="col-sm-2">
						<input type="text" name="no_agenda" class="form-control" placeholder="No. Agenda" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Diterima Tanggal</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_diterima" class="form-control" placeholder="0000-00-00" required>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Agenda</label>
					<div class="col-sm-2">
						<input type="text" name="no_agenda" class="form-control" placeholder="No. Agenda" required>
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
						<input type="checkbox" name="status" value="Sangat Segera"> Sangat Segera
						<input type="checkbox" name="status" value="Segera"> Segera
						<input type="checkbox" name="status" value="Biasa"> Biasa
					</div>
				</div>
		
				<div class="form-group">
					<label class="col-sm-3 control-label">Dari</label>
					<div class="col-sm-4">
						<textarea name="asal" class="form-control" placeholder="Asal Surat" required></textarea>
				</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Perihal</label>
					<div class="col-sm-4">
						<textarea name="perihal" class="form-control" placeholder="Perihal Surat" required></textarea>
				</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">File Surat (Lampiran)</label>
					<div class="col-sm-4">
						<input type="file" name="file">
				</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-success" value="Teruskan">
						<a href="index.php" class="btn btn-danger">BATAL</a>
					</div>
				</div>
			</form>
		</div>
	</div>