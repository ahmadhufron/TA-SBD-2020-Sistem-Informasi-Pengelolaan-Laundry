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
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Tambah Data Pelanggan</h2>

    <div class="kotak">
        <form action="add_pelanggan.php" method="post" class="form_login">
            <label>Id Pelanggan</label>
            <input type="text" name="id_pelanggan" class="form_login">
            <label>NAMA</label>
            <input type="text" name="nama" class="form_login">
            <label>No.Hp</label>
            <input type="text" name="no_hp" class="form_login">
            <label>ALAMAT</label>
            <input type="text" name="alamat" class="form_login">

            <input type="submit" name="Submit" class="submit" value="Simpan"></td>

        </form>

    </div>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_pelanggan (id_pelanggan, nama, no_hp, alamat) VALUES('$id_pelanggan','$nama',$no_hp, '$alamat')");

        // Show message when user added
        echo "User added successfully. <a href='pelanggan.php'>View Pelanggan</a>";
        header("Location: pelanggan.php");
    }
    ?>
</body>

</html>