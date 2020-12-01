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
if (isset($_POST['update_pegawai'])) {
    	$id_pegawai = $_POST['id_pegawai'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $shift = $_POST['shift'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE tb_pegawai SET id_pegawai='$id_pegawai',nama_pegawai='$nama_pegawai',shift='$shift' WHERE id_pegawai=$id_pegawai");

    // Redirect to homepage to display updated user in list
    header("Location: pegawai.php");
}
?>
<?php

$id_pegawai = $_GET['id_pegawai'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_pegawai WHERE id_pegawai=$id_pegawai");

while ($pegawai_data = mysqli_fetch_array($result)) {
    $id_pegawai = $pegawai_data['id_pegawai'];
    $nama_pegawai = $pegawai_data['nama_pegawai'];
    $shift = $pegawai_data['shift'];
}
?>
<html>

<head>
    <title>Edit Pegawai</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 align='center' line-height='50%'>Edit Data Pegawai</h2>

    <div class="kotak">
        <form action="edit_pegawai.php" method="post" class="form_login">
            <input type="hidden" name="id_pegawai" class="form_login" value=<?php echo $id_pegawai; ?>>
            <label>Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form_login" value=<?php echo $nama_pegawai; ?>>
            <label>Shift Kerja</label>
            <input type="text" name="shift" class="form_login" value=<?php echo $shift; ?>>
            <input type="submit" name="update_pegawai" class="submit" value="update pegawai">


        </form>
    </div>
</body>

</html>