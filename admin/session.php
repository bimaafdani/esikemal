<?php
include "koneksi.php";
session_start();//Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql=mysqli_query($koneksi,"SELECT * FROM t_user WHERE username='$username' AND password='$password'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
	mysqli_close($koneksi); // Menutup koneksi
	header('Location: index.php'); // Mengarahkan ke Home Page
}
?>