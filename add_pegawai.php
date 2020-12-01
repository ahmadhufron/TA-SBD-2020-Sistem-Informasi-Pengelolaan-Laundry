<?php
session_start();
include 'config.php';
if ( $_SESSION['username']) {
    ;
  
}else {
  echo "Login Gagal:(";
       header("location:index.php");}
?>
<html>

<head>
    <title>Tambah Data Pegawai</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Tambah Data Pegawai</h2>

    <div class="kotak">
        <form action="add_pegawai.php" method="post" class="form_login">
            <label>ID Pegawai</label>
            <input type="text" name="id_pegawai" class="form_login">
            <label>NAMA PEGAWAI</label>
            <input type="text" name="nama_pegawai" class="form_login">
            <label>SHIFT KERJA</label>
            <input type="text" name="shift" class="form_login">
            <input type="submit" name="Submit" class="submit" value="Simpan"></td>

        </form>

    </div>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_pegawai = $_POST['id_pegawai'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $shift = $_POST['shift'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_pegawai (id_pegawai, nama_pegawai, shift) VALUES('$id_pegawai','$nama_pegawai', '$shift')");

        // Show message when user added
        header("Location: pegawai.php");
    }
    ?>
</body>

</html>