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
if (isset($_POST['update'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];


    // update user data
    $result = mysqli_query($mysqli, "UPDATE tb_pelanggan SET id_pelanggan='$id_pelanggan',nama='$nama',no_hp='$no_hp',alamat='$alamat' WHERE id_pelanggan=$id_pelanggan");

    // Redirect to homepage to display updated user in list
    header("Location: pelanggan.php");
}
?>
<?php

$id_pelanggan = $_GET['id_pelanggan'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_pelanggan WHERE id_pelanggan=$id_pelanggan");

while ($pelanggan_data = mysqli_fetch_array($result)) {
    $id_pelanggan = $pelanggan_data['id_pelanggan'];
    $nama = $pelanggan_data['nama'];
    $no_hp = $pelanggan_data['no_hp'];
    $alamat = $pelanggan_data['alamat'];
}
?>
<html>

<head>
    <title>Edit Data Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Edit Data Pelanggan</h2>

    <div class="kotak">
        <form action="edit_pelanggan.php" method="post" class="form_login">
            <input type="hidden" name="id_pelanggan" class="form_login" value=<?php echo $id_pelanggan; ?>>
            <label>Nama</label>
            <input type="text" name="nama" class="form_login" value=<?php echo $nama; ?>>
            <label>No.Hp</label>
            <input type="text" name="no_hp" class="form_login" value=<?php echo $no_hp; ?>>
            <label>Alamat</label>
            <input type="text" name="alamat" class="form_login" value=<?php echo $alamat; ?>>

            <input type="submit" name="update" class="submit" value="update">



        </form>
    </div>
</body>

</html>