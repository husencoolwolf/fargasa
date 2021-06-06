<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
$output="";
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$idPelanggan = $_SESSION['id_user'];
	$status = $conn->checkUserBooking($id,$idPelanggan);
        
        $waktu = array($status[1], $status[2], $status[3], $status[4], $status[5], $status[6], $status[7]);
        $status = $status[0];
	if ($status==1) {
		#Berhasil
		$output.=   '<div class="toast-body alert alert-success text-center" id="isiStat" value="success">
                  Mobil Telah Sukses di Booking!!!.<br>
                  Pelanggan bisa datang ke Showroom dalam 24 jam untuk Berunding lebih jauh!.
                </div>';
	}elseif ($status==0){
		#user sudah pernah booking mobil kurun waktu 24 jam.
		$output.=   '<div class="toast-body alert alert-warning text-center" id="isiStat" value="warning">
                  Error : Mobil Gagal di Booking!!!.<br>
                  Pelanggan sudah booking mobil lain atau yang sama !.<br>
                  Pelanggan bisa membatalkan booking / bisa mendatangi showroom untuk melihat item lebih lain lebih detail.
                </div>';
	}else{
		$output.=   '<div class="toast-body alert alert-danger text-center" id="isiStat" value="danger">
                  Error : '.$status.'<br>
                  Harap menghubungi administrator untuk perbaiki Keasalahan Sistem!
                </div>';
	}
        echo json_encode(array($output, json_encode($waktu)));
}else{
	echo "warning, POST tidak terdeteksi";
}
?>