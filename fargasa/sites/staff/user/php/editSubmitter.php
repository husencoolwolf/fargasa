<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();

$id =$_POST['id'];
$tipe = $_POST['tipe'];
$nopol = $_POST['nopol'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$jarak_tempuh = $_POST['jarak_tempuh'];
$jenis_bbm = $_POST['jenis_bbm'];
$tgl_beli = $_POST['tglBeli'];
$hrg_beli = $_POST['hrgBeli'];
$hrg_beli = $conn->rupiahToInt($hrg_beli);
$hrg_jual = $_POST['hrgJual'];
$hrg_jual = $conn->rupiahToInt($hrg_jual);
$mediator = $_POST['mediator'];
$feeMediator = $_POST['feeMediator'];
$feeMediator = $conn->rupiahToInt($feeMediator);
$pajak = $_POST['pajak'];
$pajak = $conn->rupiahToInt($pajak);
$rekondisi = $_POST['rekondisi'];
$rekondisi = $conn->rupiahToInt($rekondisi);

$input	=mysqli_query($con,"UPDATE `pembelian` SET `nopol`='$nopol', `tipe`='$tipe',`warna`='$warna', `tahun`= '$tahun', `jarak_tempuh`='$jarak_tempuh', `jenis_bbm`='$jenis_bbm' , `mediator`='$mediator', `tgl_beli`='$tgl_beli', `hrg_beli`='$hrg_beli', `hrg_jual`='$hrg_jual' , `fee_mediator`='$feeMediator', `pajak`='$pajak', `rekondisi`='$rekondisi' WHERE id_pembelian='$id'");

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

