<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_pegawai = $_GET['id_pegawai'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM tb_pegawai WHERE id_pegawai=$id_pegawai");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pegawai.php");