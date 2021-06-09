<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();

$id =$_POST['id'];
$aksi = $_POST['aksi'];

$input	=mysqli_query($con,"Update `penawaran` set status='$aksi' WHERE id_penawaran='$id'");

if (mysqli_affected_rows($con) >=0){
	echo '<div class="toast-body alert alert-success text-center" id="isiStat" value="success">
                  Status Penawaran Telah di Update !!!
                </div>';
}else{
	echo '<div class="toast-body alert alert-danger text-center" id="isiStat" value="error">
                  Upps, Ada kesalahan dalam program saat proses Menghapus data!!!<br>Silahkan Hubungi Administrator!!!<br>'.mysqli_error($con).'
                </div>';
}
?>