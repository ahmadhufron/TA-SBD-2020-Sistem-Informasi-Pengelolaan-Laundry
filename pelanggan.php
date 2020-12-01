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
    <title>Pelanggan </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Data Pelanggan Laundry</h2>
    <form action="pelanggan.php" method="get">
        <label>Cari : </label>
        <input type="text" name="cari">
        <input type="submit" value="Cari">
    </form>
    <?php
        if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian : ".$cari."</b>";
    }
    ?>
    <table width='100%' border=1 class='table'>
        <tr>
            <th>Id_Pelanggan</th>
            <th>Nama</th>
            <th>No.Hp</th>
            <th>Alamat</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include_once("config.php");
        if(isset($_GET['cari'])){
            $result = mysqli_query($mysqli, "SELECT * FROM tb_pelanggan WHERE nama LIKE '%".$cari."%' ORDER BY id_pelanggan ASC");
        }else{
            $result = mysqli_query($mysqli, "SELECT * FROM tb_pelanggan ORDER BY id_pelanggan ASC");
        }
        while ($pelanggan_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td align='center'>" . $pelanggan_data['id_pelanggan'] . "</td>";
            echo "<td>" . $pelanggan_data['nama'] . "</td>";
            echo "<td>" . $pelanggan_data['no_hp'] . "</td>";
            echo "<td>" . $pelanggan_data['alamat'] . "</td>";
            echo "<td align='center'><a href='edit_pelanggan.php?id_pelanggan=$pelanggan_data[id_pelanggan]'>Edit</a></td>";
            echo "<td align='center'><a href='delete_pelanggan.php?id_pelanggan=$pelanggan_data[id_pelanggan]'>Delete</a></td>
        </tr>";
        }
        ?>
    </table>
    <br>
    <button><a href="add_pelanggan.php">Tambah data Pelanggan</a></button>
    <button><a href="pegawai.php">Lihat Info Pegawai</a></button>
    <button><a href="barang.php">Lihat Barang Laundry</a></button>
    <button><a href="transaksi.php">Lihat Info Transaksi Masuk</a></button>
    <button><a href="join.php">Tampilan join</a></button>
    <button><a href="logout.php">Log Out</a></button>
</body>

</html>