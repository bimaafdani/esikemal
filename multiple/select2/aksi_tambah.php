<?php
require 'koneksi.php';

$kota = $_POST['kota'];
$kota_favorit = array();
foreach ($_POST['kota2'] as $kota2) {
    array_push($kota_favorit, $kota2);
}
$kota2 = serialize($kota_favorit);
$query2 = "INSERT INTO kota (kota_kelahiran, kota_favorit) VALUES ('$kota', '$kota2')";
$hasil2 = mysqli_query($link, $query2);

if (!$hasil2)
{
    echo die(mysqli_error($link));
}

header("location:index.php");
?>