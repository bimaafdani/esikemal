<?php
require 'koneksi.php';
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
            <form action="aksi_tambah.php" method="post">
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
                            <option value="<?php echo $row['provinsi'] ?>"><?php echo $row['provinsi'] ?></option>
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
                            <option value="<?php echo $row2['provinsi'] ?>"><?php echo $row2['provinsi'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-primary">
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