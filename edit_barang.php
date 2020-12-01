<?php
session_start();
include 'config.php';
if ( $_SESSION['username']) {
    ;
  
}else {
  echo "Login Gagal:(";
       header("location:index.php");}
?>

<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update_barang'])) {
    	$id_barang = $_POST['id_barang'];
        $nama_pemilik = $_POST['nama_pemilik'];
        $jumlah_kiloan = $_POST['jumlah_kiloan'];
        $catatan = $_POST['catatan'];
        $id_pegawai = $_POST['id_pegawai'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE tb_barang SET id_barang='$id_barang',nama_pemilik='$nama_pemilik',jumlah_kiloan='$jumlah_kiloan', catatan='$catatan', id_pegawai='$id_pegawai' WHERE id_barang=$id_barang");

    // Redirect to homepage to display updated user in list
    header("Location: barang.php");
}
?>
<?php

$id_barang = $_GET['id_barang'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_barang WHERE id_barang=$id_barang");

while ($barang_data = mysqli_fetch_array($result)) {
    $id_barang = $barang_data['id_barang'];
    $nama_pemilik = $barang_data['nama_pemilik'];
    $jumlah_kiloan = $barang_data['jumlah_kiloan'];
    $catatan = $barang_data['catatan'];
    $id_pegawai = $barang_data['id_pegawai'];
}
?>
<html>

<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Edit Data Barang</h2>

    <div class="kotak">
        <form action="edit_barang.php" method="post" class="form_login">
            <input type="hidden" name="id_barang" class="form_login" value=<?php echo $id_barang; ?>>
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form_login" value=<?php echo $nama_pemilik; ?>>
            <label>Jumlah Kiloan</label>
            <input type="text" name="jumlah_kiloan" class="form_login" value=<?php echo $jumlah_kiloan; ?>>
            <label>Catatan</label>
            <input type="text" name="catatan" class="form_login" value=<?php echo $catatan; ?>>
            <label>ID PEGAWAI YANG MELAYANI</label>
            <input type="text" name="id_pegawai" class="form_login" value=<?php echo $id_pegawai; ?>>
            <input type="submit" name="update_barang" class="submit" value="update barang">


        </form>
    </div>
</body>

</html>