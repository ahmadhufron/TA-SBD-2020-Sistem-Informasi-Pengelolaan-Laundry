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
if (isset($_POST['update_transaksi'])) {
    	$id_transaksi = $_POST['id_transaksi'];
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $jenis_cucian = $_POST['jenis_cucian'];
        $harga_bayar = $_POST['harga_bayar'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE tb_transaksi SET id_transaksi='$id_transaksi',tgl_transaksi='$tgl_transaksi',id_pelanggan='$id_pelanggan', jenis_cucian='$jenis_cucian', harga_bayar='$harga_bayar' WHERE id_transaksi=$id_transaksi");

    // Redirect to homepage to display updated user in list
    header("Location: transaksi.php");
}
?>
<?php

$id_transaksi = $_GET['id_transaksi'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_transaksi WHERE id_transaksi=$id_transaksi");

while ($transaksi_data = mysqli_fetch_array($result)) {
    $id_transaksi = $transaksi_data['id_transaksi'];
    $tgl_transaksi = $transaksi_data['tgl_transaksi'];
    $id_pelanggan = $transaksi_data['id_pelanggan'];
    $jenis_cucian = $transaksi_data['jenis_cucian'];
    $harga_bayar = $transaksi_data['harga_bayar'];
}
?>
<html>

<head>
    <title>Edit transaksi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Edit Data Transaksi Masuk</h2>

    <div class="kotak">
        <form action="edit_transaksi.php" method="post" class="form_login">
            <input type="hidden" name="id_transaksi" class="form_login" value=<?php echo $id_transaksi; ?>>
            <label>Tanggal Transaksi</label>
            <input type="date" name="tgl_transaksi" class="form_login" value=<?php echo $tgl_transaksi; ?>>
            <label>ID Pelanggan</label>
            <input type="text" name="id_pelanggan" class="form_login" value=<?php echo $id_pelanggan; ?>>
            <label>Jenis Cucian</label>
            <input type="text" name="jenis_cucian" class="form_login" value=<?php echo $jenis_cucian; ?>>
            <label>Total Harga </label>
            <input type="text" name="harga_bayar" class="form_login" value=<?php echo $harga_bayar; ?>>
            <input type="submit" name="update_transaksi" class="submit" value="update transaksi">


        </form>
    </div>
</body>

</html>