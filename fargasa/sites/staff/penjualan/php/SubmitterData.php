<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();




$id = createId(8);
//$idstok = createId(8);

//cek id
      $id = checkId($con,$id);  
//      $idstok = checkId($con,$idstok);
//

$id_pembelian = $_POST['id_pembelian'];
$tglJual = $_POST['tglJual'];
$hrgJual = $_POST['hrgJual'];
$hrgJual = $conn->rupiahToInt($hrgJual);
$mediator = $_POST['mediator'];
$feeMediator = $_POST['feeMediator'];
$feeMediator = $conn->rupiahToInt($feeMediator);
$sales = $_POST['sales'];
$feeSales = $_POST['feeSales'];
$feeSales = $conn->rupiahToInt($feeSales);
$leas = $_POST['leas'];
$tenor = $_POST['tenor'];
$refund = $_POST['refund'];
$refund = $conn->rupiahToInt($refund);
$id_pelanggan = $_POST['id_pelanggan'];
if($id_pelanggan==""){
    $id_pelanggan="NULL";
}

$feeMediator = $_POST['feeMediator'];

$nama = $_SESSION['nama'];

$input	= mysqli_query($con,"INSERT INTO `penjualan` (`id_penjualan`, `id_pembelian`, `mediator`, `sales`, `tgl_jual`, `hrg_jual`, `fee_mediator`, `fee_sales`, `leas`, `tenor`, `refund` , `author`, `id_pelanggan`) "
        . "VALUES ($id, "
        . "'$id_pembelian', "
        . "'$mediator', "
        . "'$sales', "
        . "'$tglJual', "
        . "'$hrgJual', "
        . "'$feeMediator', "
        . "'$feeSales', "
        . "'$leas', "
        . "'$tenor', "
        . "'$refund', "
        . "'$nama', "
        . "'$id_pelanggan');");


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


