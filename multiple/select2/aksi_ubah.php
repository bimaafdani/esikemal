<?php
require 'koneksi.php';

$id_kota = $_POST['id_kota'];
$kota = $_POST['kota'];
$kota_favorit = array();
foreach ($_POST['kota2'] as $kota2) {
    array_push($kota_favorit, $kota2);
}
$kota2 = serialize($kota_favorit);

$query2 = "UPDATE kota SET kota_kelahiran = '$kota', kota_favorit = '$kota2' WHERE id_kota = '$id_kota'";
$hasil2 = mysqli_query($link, $query2);

if (!$hasil2)
{
    echo die(mysqli_error($link));
}

header("location:index.php");
?>