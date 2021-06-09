<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$email = $_POST['email'];
	echo ($conn->checkEmail($email));
?>