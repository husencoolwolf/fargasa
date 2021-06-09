<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();

$id =$_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$nope = $_POST['nope'];
$privilege = $_POST['privilege'];


$input	=mysqli_query($con,"UPDATE `user` SET `nama`='$nama', `username`='$username',`password`='$password', `alamat`= '$alamat', `email`='$email', `no_hp`='$nope' , `privilege`='$privilege' WHERE id_user='$id'");

if (mysqli_affected_rows($con) >=0){
	echo '<div class="toast-body alert alert-success text-center" id="isiStat" value="success">
                  Data Telah Berhasil di Edit!!!
                </div>';
}else{
	echo '<div class="toast-body alert alert-danger text-center" id="isiStat" value="error">
                  Upps, Ada kesalahan dalam program saat proses Edit data!!!<br>Silahkan Hubungi Administrator!!!<br>'.mysqli_error($con).'
                </div>';
}
?>

