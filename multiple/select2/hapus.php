<?php
require 'koneksi.php';

$id_kota = $_GET['id_kota'];

$query2 = "DELETE FROM kota WHERE id_kota = '$id_kota'";
$hasil2 = mysqli_query($link, $query2);

if (!$hasil2)
{
    echo die(mysqli_error($link));
}

header("location:index.php");
?>