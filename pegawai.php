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
    <title>Daftar Pegawai Laundry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Daftar Pegawai Laundry</h2>
    <table width='100%' border=1 class='table'>
        <tr>
            <th>ID pegawai</th>
            <th>Nama Pegawai</th>
            <th>Shift Kerja</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include_once("config.php");
        $result = mysqli_query($mysqli, "SELECT * FROM tb_pegawai ORDER BY id_pegawai ASC");
        while ($pegawai_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td align='center'>" . $pegawai_data['id_pegawai'] . "</td>";
            echo "<td>" . $pegawai_data['nama_pegawai'] . "</td>";
            echo "<td>" . $pegawai_data['shift'] . "</td>";
            echo "<td align='center'><a href='edit_pegawai.php?id_pegawai=$pegawai_data[id_pegawai]'>Edit</a></td>";
            echo "<td align='center'><a href='delete_pegawai.php?id_pegawai=$pegawai_data[id_pegawai]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <br>

    <button><a href="pelanggan.php">Kembali</a></button>
    <button><a href="add_pegawai.php">Tambah Data Pegawai</a></button>
    <button><a href="join.php">Tampilan join</a></button>
</body>

</html>