<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_pelanggan = $_GET['id_pelanggan'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM tb_pelanggan WHERE id_pelanggan=$id_pelanggan");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pelanggan.php");