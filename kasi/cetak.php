<?php
include '../koneksi.php';
@session_start();
if(@$_SESSION['username']) {
?>
<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 60%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
</head>

<body>
<!-- <body onload="window.print()"> -->
<?php
$idsurat = $_GET['idsurat'];
$sql = mysqli_query($koneksi,"SELECT * FROM t_disp_tu, t_kepala WHERE  t_disp_tu.idsurat='$idsurat' AND t_kepala.idsurat = t_disp_tu.idsurat");
$row = mysqli_fetch_assoc($sql);

?>
<table style="width: 767px; height: 1200px; margin-left: auto; margin-right: auto;" border="1" cellspacing="1" cellpadding="1">
	<tbody>
		<tr style="height: 11px;">
			<td style="height: 11px; width: 751px; text-align: center;" colspan="3">
			<img src="../image/kop.jpg" width="750" height="100" /> </td>
		</tr>
		<tr style="height: 11px;">
			<td style="height: 11px; width: 751px;" colspan="3">
				<p style="text-align: center;"><strong>LEMBAR DISPOSISI</strong></p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td style="height: 35px; width: 751px;" colspan="3">
				<p style="text-align: center;">PERHATIAN : Dilarang memisahkan sehelai surat pun yang digabung dalam berkas ini</p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td syle="height: 35px; width: 339px;">
				<p>Nomor Surat &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?php echo $row['no_surat']; ?></p>
			</td>
			<td style="height: 35px; width: 412px;" colspan="2">
				<p>Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row['status']; ?></p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td style="height: 35px; width: 339px;">
				<p>Tanggal Surat&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo date('d/m/Y',strtotime($row['tgl_surat']));?></p>
			</td>
			<td style="height: 35px; width: 412px;" colspan="2">
				<p>Sifat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row['sifat']; ?></p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td style="height: 35px; width: 339px;">
				<p>Lampiran &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $row['lampiran']; ?></p>
			</td>
			<td style="height: 35px; width: 412px;" colspan="2">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td style="height: 35px; width: 339px;">
				<p>Diterima Tangal &nbsp; &nbsp; &nbsp; : <?php echo date('d/m/Y',strtotime($row['tgl_diterima']));?></p>
			</td>
			<td style="height: 35px; width: 412px;" colspan="2">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td style="height: 35px; width: 339px;">
				<p>No. Agenda&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
			</td>
			<td style="height: 35px; width: 412px;" colspan="2">
				<p>Sangat Rahaisa / Rahasia / Biasa</p>
			</td>
		</tr>
		<tr style="height: 48px;">
			<td style="height: 48px; width: 751px;" colspan="3">
				<p>Dari &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?php echo $row['asal']; ?></p>
				<p>Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['perihal']; ?></p>
			</td>
		</tr>
		<tr style="height: 27px;">
			<td style="height: 27px; width: 339px;">
				<p><span style="text-decoration: underline;">Disposisi Kepala Kepada:</span></p>
				<p style="padding-left: 30px;"> <?php echo $row['penerima'];?></p>
				<p style="padding-left: 30px;">&nbsp;</p>
			</td>
			<td style="height: 27px; width: 412px;" colspan="2">
				<p><span style="text-decoration: underline;">Petunjuk:</span></p>
				<p style="padding-left: 30px; text-align: left;"><?php echo $row['petunjuk'];?></p>
				<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
			</td>
		</tr>
		<tr style="height: 47px;">
			<td style="height: 47px; width: 751px;" colspan="3">
				<p><span style="text-decoration: underline;">CATATAN KEPALA :</span></p>
				<p style="padding-left: 30px;"><?php echo $row['isi_disposisi'];?></p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td style="height: 35px; width: 751px;" colspan="3">
				<p>Tanggal Penyelesain &nbsp;&nbsp;:</p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td style="height: 35px; width: 751px;" colspan="3">
				<p>Penerima &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</p>
			</td>
		</tr>
		<tr style="height: 35px;">
			<td style="height: 35px; width: 751px;" colspan="2">
				<?php 
					if(($_SESSION['level'] == "Analis Kepegawaian") || ($_SESSION['level']=="Bagian Keuangan")){
					echo '
					<p><span style="text-decoration: underline;">DISPOSISI KASUBBAG TATA USAHA :</span></p>
					<p>Kepada :'.$row['penerima_tu'].'</p>
					<p>Petunjuk : '.$row['disposisi_tu'].'</p>
					';
					} else{
					echo '
					<p><span style="text-decoration: underline;">DISPOSISI KASI/ PENYELENGGARA :</span></p>
					<p>Kepada :'.$row['penerima_tu'].'</p>
					<p>Petunjuk : '.$row['disposisi_tu'].'</p>	
					';
					}
				?>
			</td>
		</tr>
		<tr style="height: 7px;">
			<td style="height: 7px; width: 751px;" colspan="2">
				<p>Tanggal Penyelesaian &nbsp; &nbsp; &nbsp; :</p>
			</td>
		</tr>
		<tr style="height: 11px;">
			<td style="height: 11px; width: 751px;" colspan="2">
				<p>Penerima&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</p>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>
<?php
} else {
  header("location:../index.php");
}
?>