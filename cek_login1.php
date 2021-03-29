  <body style="background-image:url(img/failed.jpg); background-position: center;">
  </body>
  <?php
    @session_start();
    include "koneksi.php" ;
    //header('location:index.php');
    //variable username dan pass
    $username = @$_POST['username'];
    $password = @md5($_POST['password']);
    //membangun koneksi ke db
    //mencegah sql injection
    //$username = stripslashes($username); $password = stripslashes($password);
    $username = $koneksi->real_escape_string($username);
    $password = $koneksi->real_escape_string($password);
    //seleksi user
    $query  = mysqli_query($koneksi,"SELECT * FROM t_user WHERE username='$username' AND password='$password'");
    $data   = mysqli_fetch_array($query); //menjadikan data sebagai array
    $ketemu = mysqli_num_rows($query); //mendapatkan jumlah baris pada database
    //Apabila username dan password ditemukan (valid)
    if ($ketemu >= 1) {
    if($data['level'] == 'Master Admin') {
            @$_SESSION['Master Admin']=$data['id'];
            header("location:admin/index.php");

    }else if ($data['level'] =='Bagian Umum') {
             @$_SESSION['Bagian Umum']=$data['id'];
             header("location:umum/index.php");

    }else if ($data['level'] =='Bagian Keuangan') {
             @$_SESSION['Bagian Keuangan']=$data['id'];
             header("location:kasi/index.php");

    }
    else if ($data['level'] =='Kasubbag TU') {
             @$_SESSION['Kasubbag TU']=$data['id'];
             header("location:ka_tu/index.php");
    }else if ($data['level'] =='Kepala') {
             @$_SESSION['Kepala']=$data['id'];
             header("location:kepala/index.php");
    }else if ($data['level'] =='Kasi PENDIS') {
             @$_SESSION['Kasi PENDIS']=$data['id'];
             header("location:kasi/index.php");
    }
    else if ($data['level'] =='Kasi BIMAS') {
             @$_SESSION['Kasi BIMAS']=$data['id'];
             header("location:kasi/index.php");
    }
    else if ($data['level'] =='Kasi PHU') {
             @$_SESSION['Kasi PHU']=$data['id'];
             header("location:kasi/index.php");
    }
    else if ($data['level'] =='Kasi P_Syariah') {
             @$_SESSION['Kasi P_Syariah']=$data['id'];
             header("location:kasi/index.php");
    }
    else if ($data['level'] =='Analis Kepegawaian') {
             @$_SESSION['Analis Kepegawaian']=$data['id'];
             header("location:kasi/index.php");
    }
    else if ($data['level'] =='Pengawas Pendidikan') {
             @$_SESSION['Pengawas Pendidkan']=$data['id'];
             header("location:kasi/index.php");
    }
    else if ($data['level'] =='Staff') {
             @$_SESSION['Staff']=$data['id'];
             header("location:staff/index.php");
    }
}
    else{
     echo "<script>alert('USERNAME ATAU PASSWORD YANG ANDA MASUKKAN SALAH !!'); window.history.back()</script>";
    }
?>