<?php
require 'koneksi.php';

// ambil data dari database berdasarkan id_kota
$id_kota = $_GET['id_kota'];
$query = "SELECT * FROM kota WHERE id_kota = '$id_kota'";
$hasil = mysqli_query($link, $query);
$data = mysqli_fetch_array($hasil);

?>
<!doctype html>
<html>
    <head>
        <title>Select2 - harviacode.com</title>
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <link rel="stylesheet" href="select2-master/dist/css/select2.min.css"/>
    </head>
    <body>
        <div style="width: 300px; padding: 15px">
            <form action="aksi_ubah.php" method="post">
                <div class="form-group">
                    <label>Kota Kelahiran</label>
                    <select id="kota" name="kota" class="form-control">
                        <option value=""></option>
                        <?php
                        // ambil data dari database
                        $query = "SELECT * FROM provinsi ORDER BY provinsi";
                        $hasil = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                            ?>
                            <option value="<?php echo $row['provinsi'] ?>" <?php echo $row['provinsi'] == $data['kota_kelahiran'] ? 'selected="selected"' : '' ?>><?php echo $row['provinsi'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kota Favorit</label>
                    <select id="kota2" name="kota2[]" class="form-control" multiple="multiple">
                        <option value=""></option>
                        <?php
                        // ambil data dari database
                        $query2 = "SELECT * FROM provinsi ORDER BY provinsi";
                        $hasil2 = mysqli_query($link, $query2);
                        while ($row2 = mysqli_fetch_array($hasil2)) {
                            ?>
                        <option value="<?php echo $row2['provinsi'] ?>" <?php echo in_array($row2['provinsi'], unserialize($data['kota_favorit'])) ? 'selected="selected"' : '' ?>><?php echo $row2['provinsi'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id_kota" value="<?php echo $data['id_kota'] ?>" class="btn btn-primary">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
        <script src="jquery-2.1.4.min.js"></script>
        <script src="select2-master/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#kota").select2({
                    placeholder: "Please Select"
                });

                $("#kota2").select2({
                    placeholder: "Please Select"
                });
            });
        </script>
    </body>
</html>