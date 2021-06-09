<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();

$id =$_POST['id'];

$input	=mysqli_query($con,"DELETE FROM `user` WHERE id_user='$id'");

if (mysqli_affected_rows($con) >=0){
	echo '<div class="toast-body alert alert-success text-center" id="isiStat" value="success">
                  Data Telah Terhapus !!!
                </div>';
}else{
	echo '<div class="toast-body alert alert-danger text-center" id="isiStat" value="error">
                  Upps, Ada kesalahan dalam program saat proses Menghapus data!!!<br>Silahkan Hubungi Administrator!!!<br>'.mysqli_error($con).'
                </div>';
}
?>

