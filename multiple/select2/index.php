<?php
require 'koneksi.php';

function serialize_ke_string($serial)
{
    $hasil = unserialize($serial);
    return implode(', ', $hasil);
}
?>
<!doctype html>
<html>
    <head>
        <title>Select2 - harviacode.com</title>
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <a href="tambah.php" class="btn btn-primary">Tambah</a>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>Kota Kelahiran</th>
                <th>Kota Favorit</th>
                <th>Aksi</th>
            </tr>
            <?php
            $query = "SELECT * FROM kota ORDER BY id_kota";
            $hasil = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($hasil)) {
                ?>
                <tr>
                    <td><?php echo $row['kota_kelahiran'] ?></td>
                    <td><?php echo serialize_ke_string($row['kota_favorit']) ?></td>
                    <td>
                        <a href="ubah.php?id_kota=<?php echo $row['id_kota'] ?>">Ubah</a> | 
                        <a href="hapus.php?id_kota=<?php echo $row['id_kota'] ?>">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>