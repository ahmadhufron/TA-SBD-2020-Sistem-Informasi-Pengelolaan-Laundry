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
    <title>Info Transaksi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Daftar Info Transaksi Masuk</h2>
    <table width='100%' border=1 class='table'>
        <tr>
            <th>ID Transaksi</th>
            <th>Tanggal Transaksi Masuk</th>
            <th>ID Pelanggan</th>
            <th>Jenis Cucian</th>
            <th>Total Harga</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include_once("config.php");
        $result = mysqli_query($mysqli, "SELECT * FROM tb_transaksi ORDER BY id_transaksi ASC");
        while ($transaksi_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td align='center'>" . $transaksi_data['id_transaksi'] . "</td>";
            echo "<td>" . $transaksi_data['tgl_transaksi'] . "</td>";
            echo "<td>" . $transaksi_data['id_pelanggan'] . "</td>";
            echo "<td>" . $transaksi_data['jenis_cucian'] . "</td>";
            echo "<td>" . $transaksi_data['harga_bayar'] . "</td>";
            echo "<td align='center'><a href='edit_transaksi.php?id_transaksi=$transaksi_data[id_transaksi]'>Edit</a></td>";
            echo "<td align='center'><a href='delete_transaksi.php?id_transaksi=$transaksi_data[id_transaksi]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <br>

    <button><a href="pelanggan.php">Kembali</a></button>
    <button><a href="add_transaksi.php">Tambah Data Transaksi Masuk</a></button>
    <button><a href="join.php">Tampilan join</a></button>
</body>

</html>