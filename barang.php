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
    <title>Daftar Barang Laundry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Daftar Barang Laundry</h2>
    <table width='100%' border=1 class='table'>
        <tr>
            <th>ID Barang</th>
            <th>Nama Pemilik</th>
            <th>Jumlah Kiloan</th>
            <th>Catatan</th>
            <th>ID Pegawai Yang Melayani</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include_once("config.php");
        $result = mysqli_query($mysqli, "SELECT * FROM tb_barang ORDER BY id_barang ASC");
        while ($barang_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td align='center'>" . $barang_data['id_barang'] . "</td>";
            echo "<td>" . $barang_data['nama_pemilik'] . "</td>";
            echo "<td>" . $barang_data['jumlah_kiloan'] . "</td>";
            echo "<td>" . $barang_data['catatan'] . "</td>";
            echo "<td>" . $barang_data['id_pegawai'] . "</td>";
            echo "<td align='center'><a href='edit_barang.php?id_barang=$barang_data[id_barang]'>Edit</a></td>";
            echo "<td align='center'><a href='delete_barang.php?id_barang=$barang_data[id_barang]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <br>

    <button><a href="pelanggan.php">Kembali</a></button>
    <button><a href="add_barang.php">Tambah Data Barang Laundry</a></button>
    <button><a href="join.php">Tampilan join</a></button>
</body>

</html>