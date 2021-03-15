<?php
include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';
include $_SERVER['DOCUMENT_ROOT'].'/dist/php/idGenerator.php';
$conn = new createCon();
$con = $conn->connect();
session_start();

$id = createId(8);

//cek id
      $id = checkId($con,$id);  
//

$tipe = $_POST['tipe'];
$nopol = $_POST['nopol'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$tgl_beli = $_POST['tgl_beli'];
$hrg_beli = $_POST['hrg_beli'];
$hrg_beli = $conn->rupiahToInt($hrg_beli);
$mediator = $_POST['mediator'];
$feeMediator = $_POST['feeMediator'];
$feeMediator = $conn->rupiahToInt($feeMediator);
$pajak = $_POST['pajak'];
$rekondisi = $_POST['rekondisi'];
$rekondisi = $conn->rupiahToInt($rekondisi);
$nama = $_SESSION['nama'];

$input	= mysqli_query($con,"INSERT INTO `pembelian` (`id`, `nopol`, `tipe`, `warna`, `tahun`, `mediator`, `tgl_beli`, `hrg_beli`, `fee_mediator`, `pajak`, `rekondisi`, `status`, `author`) "
        . "VALUES ('$id', "
        . "'$nopol', "
        . "'$tipe', "
        . "'$warna', "
        . "'$tahun', "
        . "'$mediator', "
        . "'$tgl_beli', "
        . "'$hrg_beli', "
        . "'$feeMediator', "
        . "'$pajak', "
        . "'$rekondisi', "
        . "'Belum Terjual', "
        . "'$nama');");
    if ($input) {
        //Jika Sukses
        //update stok
        echo   '<div class="toast-body alert alert-success text-center" id="isiStat" value="success">
                  Data Telah Berhasil di Input!!!
                </div>';
    }else {
        echo   '<div class="toast-body alert alert-danger text-center" id="isiStat" value="error">
                  Upps, Ada kesalahan dalam program saat input data!!!<br>Silahkan Hubungi Administrator!!!<br>'.mysqli_error($con).'
                </div>';
        
    }
function checkId($con,$id2){
    $cekuser = mysqli_query($con ,"SELECT id FROM user WHERE username = '$id2'");
        if(!$cekuser){
            return $id2;
        }else{
            $id2 = createId();
            checkId($con,$id2);
           }
}
?>


