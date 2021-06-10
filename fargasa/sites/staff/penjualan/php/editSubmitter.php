<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();

$id =$_POST['id'];
$hrgJual = $_POST['hrgJual'];
$hrgJual = $conn->rupiahToInt($hrgJual);
$sales = $_POST['sales'];
$feeSales = $_POST['feeSales'];
$feeSales = $conn->rupiahToInt($feeSales);
$tglJual = $_POST['tglJual'];
$mediator = $_POST['mediator'];
$feeMediator = $_POST['feeMediator'];
$feeMediator = $conn->rupiahToInt($feeMediator);
$leas = $_POST['leas'];
$tenor = $_POST['tenor'];
$refund = $_POST['refund'];
$refund = $conn->rupiahToInt($refund);


$input	=mysqli_query($con,"UPDATE `penjualan` SET `hrg_jual`='$hrgJual', `sales`='$sales',`fee_sales`='$feeSales', `tgl_jual`= '$tglJual', `mediator`='$mediator', `fee_mediator`='$feeMediator' , `leas`='$leas', `tenor`='$tenor', `refund`='$refund' WHERE id_penjualan='$id'");


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

