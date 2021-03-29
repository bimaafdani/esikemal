<?php
include("koneksi.php");
include("func.php");
?>
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

   <script>
$(document).ready(function(){
   $("input[name=tindakan]").change(function(){
     if($(this).val() == "Ya" && $(this).is(":checked"))  //changed this condition as per OP comment
     {
       $("#check").show();
     }else{
       $("#check").hide();
     }
  });
});
</script>

	<div  class="col-md-10" style="padding: 0px"  class="container">
		<div class="content">		
			<?php
			// untuk memindahkan file ke tempat uploadan
		    $upload_path = "Surat_Keluar/";
		    // handle aplikasi : apabila folder yang dimaksud tidak ada, maka akan dibuat
		    if (!is_dir($upload_path)) {
		        mkdir($upload_path);
		    }
		
			if(isset($_POST['add'])){
				$tindakan 		= aman($_POST['tindakan']);
				$no_agenda	= aman($_POST['no_agenda']);
				$no_surat	= aman($_POST['no_surat']);
				$perihal	= aman($_POST['perihal']);
				$tujuan_kirim = aman($_POST['tujuan_kirim']);
				$tgl_surat = aman($_POST['tgl_surat']);
				$tgl_kirim = aman($_POST['tgl_kirim']);			
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
				
				$cek = mysqli_query($koneksi, "SELECT * FROM surat_keluar WHERE no_surat='$no_surat' ");
				if(mysqli_num_rows($cek) == 0){
					$insert = mysqli_query($koneksi, "INSERT INTO surat_keluar (tindakan, no_agenda, no_surat, perihal, tujuan_kirim, tgl_surat, tgl_kirim, file)
				VALUES('$tindakan','$no_agenda', '$no_surat', '$perihal','$tujuan_kirim', '$tgl_surat', '$tgl_kirim','$file')") or die(mysqli_error());
					if($insert){
						echo '<div class="alert alert-success">Surat Keluar Berhasil Di Catat.</div>';
					}else{
						echo '<div class="alert alert-danger">Gagl, silahkan coba lagi.</div>';
						}
				} else{
						echo '<div class="alert alert-danger">Nomor Surat Sudah Di Ambil, Coba Yang Lain.</div>';
					} 
					
			}
?>	
			<form class="form-horizontal" method="post" enctype='multipart/form-data'>
				<div class="form-group">
					<label class="col-sm-3 control-label">Surat Tindakan </label>
					<div class="col-sm-2">
						<input type="checkbox" name="tindakan" value="Ya"> Ya
						<input type="text" style="display: none;"name="no_agenda" class="form-control" placeholder="No. Agenda" id="check">
						<input type="checkbox" name="tindakan" value="Bukan"> Tidak
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Surat</label>
					<div class="col-sm-2">
						<input type="text" name="no_surat" class="form-control" placeholder="No. Surat" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Perihal</label>
					<div class="col-sm-4">
						<textarea name="perihal" class="form-control" placeholder="Perihal Surat" required></textarea>
				</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Tujuan Kirim</label>
					<div class="col-sm-4">
						<textarea name="tujuan_kirim" class="form-control" placeholder="Tujuan Surat Keluar" required></textarea>
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
					<label class="col-sm-3 control-label">Tanggal Kirim</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_kirim" class="form-control" placeholder="0000-00-00" required>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">File Surat (scan)</label>
					<div class="col-sm-4">
						<input type="file" name="file">
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
</body>
</html>