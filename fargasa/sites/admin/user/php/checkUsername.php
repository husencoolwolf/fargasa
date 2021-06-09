<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$username = $_POST['username'];
	echo ($conn->checkUsername($username));
?>