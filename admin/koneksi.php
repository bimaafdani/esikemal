<?php
$db_host = "localhost";
$db_user = "us5mlmg4_root";
$db_pass = "kemenag2016";
$db_name = "us5mlmg4_kemenag";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>