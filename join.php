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
    <title>TABEL JOIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 line-height='50%' align="center">Tabel Pelayanan</h2>
    <table width='100%' border=1 class='table'>
        <tr>
            <th>NAMA PEGAWAI</th>
            <th>SHIFT</th>
            <th>NAMA PEMILIK BARANG</th>
            <th>JUMLAH KILOAN</th>
        </tr>
        <?php
        include_once("config.php");
        $result = mysqli_query($mysqli, "SELECT A.nama_pegawai,A.shift, B.nama_pemilik, B.jumlah_kiloan FROM tb_pegawai A INNER JOIN tb_barang B
     ON A.id_pegawai = B.id_pegawai");
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['nama_pegawai'] . "</td>";
            echo "<td>" . $user_data['shift'] . "</td>";
            echo "<td>" . $user_data['nama_pemilik'] . "</td>";
            echo "<td>" . $user_data['jumlah_kiloan'] . "</td>";
        }
        ?>
    </table>
    <h2 line-height='50%' align="center">Biaya Laundry Pelanggan</h2>
    <table width='100%' border=1 class='table'>
        <tr>
            <th>NAMA PELANGGAN</th>
            <th>ALAMAT PELANGGAN</th>
            <th>HARGA BAYAR LAUNDRY</th>
            <!-- <th>JUMLAH</th> -->
        </tr>
        <?php
        include_once("config.php");
        $result = mysqli_query($mysqli, "SELECT A.nama, A.alamat, B.harga_bayar FROM tb_pelanggan A INNER JOIN tb_transaksi B
     ON A.id_pelanggan = B.id_pelanggan");
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['alamat'] . "</td>";
            echo "<td>" . $user_data['harga_bayar'] . "</td>";
        }
        ?>
    </table>
    <button><a weight='50px' href="pelanggan.php">Kembali</a></button>

</body>

</html>