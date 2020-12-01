<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_transaksi = $_GET['id_transaksi'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM tb_transaksi WHERE id_transaksi=$id_transaksi");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:transaksi.php");