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
    <h2 align='center' line-height='50%'>Tambah Data Transaksi Masuk</h2>

    <div class="kotak">
        <form action="add_transaksi.php" method="post" class="form_login">
            <label>ID Transaksi</label>
            <input type="text" name="id_transaksi" class="form_login">
            <label>Tanggal Transaksi Masuk</label>
            <input type="date" name="tgl_transaksi" class="form_login">
            <label>ID Pelanggan</label>
            <input type="text" name="id_pelanggan" class="form_login">
            <label>Jenis Cucian</label>
            <input type="text" name="jenis_cucian" class="form_login">
            <label>Total Harga</label>
            <input type="text" name="harga_bayar" class="form_login">
            <input type="submit" name="Submit" class="submit" value="Simpan"></td>

        </form>

    </div>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_transaksi = $_POST['id_transaksi'];
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $jenis_cucian = $_POST['jenis_cucian'];
        $harga_bayar = $_POST['harga_bayar'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_transaksi (id_transaksi, tgl_transaksi, id_pelanggan, jenis_cucian, harga_bayar ) VALUES('$id_transaksi','$tgl_transaksi', '$id_pelanggan','$jenis_cucian','$harga_bayar')");

        // Show message when user added
        header("Location: transaksi.php");
    }
    ?>
</body>

</html>