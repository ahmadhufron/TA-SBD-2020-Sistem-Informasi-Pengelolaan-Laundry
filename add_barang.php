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
    <title>Tambah Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Tambah Data Barang Laundry</h2>

    <div class="kotak">
        <form action="add_barang.php" method="post" class="form_login">
            <label>ID BARANG</label>
            <input type="text" name="id_barang" class="form_login">
            <label>NAMA PEMILIK</label>
            <input type="text" name="nama_pemilik" class="form_login">
            <label>JUMLAH KILOAN</label>
            <input type="text" name="jumlah_kiloan" class="form_login">
            <label>CATATAN</label>
            <input type="text" name="catatan" class="form_login">
            <label>ID PEGAWAI YANG MELAYANI</label>
            <input type="text" name="id_pegawai" class="form_login">
            <input type="submit" name="Submit" class="submit" value="Simpan"></td>

        </form>

    </div>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_barang = $_POST['id_barang'];
        $nama_pemilik = $_POST['nama_pemilik'];
        $jumlah_kiloan = $_POST['jumlah_kiloan'];
        $catatan = $_POST['catatan'];
        $id_pegawai = $_POST['id_pegawai'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_barang (id_barang, nama_pemilik, jumlah_kiloan, catatan, id_pegawai ) VALUES('$id_barang','$nama_pemilik', '$jumlah_kiloan','$catatan', '$id_pegawai')");

        // Show message when user added
        header("Location: barang.php");
    }
    ?>
</body>

</html>