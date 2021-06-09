<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();

$filename="default.png";
if(isset($_FILES['gambar']['name'])){
    $filename = $_FILES['gambar']['name'];
    $location = $_SERVER['DOCUMENT_ROOT']."/fargasa/assets/gambar/".$filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'],$location);
}


$id = createId(8);
//$idstok = createId(8);

//cek id
      $id = checkId($con,$id);  
//      $idstok = checkId($con,$idstok);
//

$tipe = $_POST['tipe'];
$nopol = $_POST['nopol'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$jarak_tempuh = $_POST['jarak_tempuh'];
$jenis_bbm = $_POST['jenis_bbm'];
$tgl_beli = $_POST['tgl_beli'];
$hrg_beli = $_POST['hrg_beli'];
$hrg_beli = $conn->rupiahToInt($hrg_beli);
$hrg_jual = $_POST['hrg_jual'];
$hrg_jual = $conn->rupiahToInt($hrg_jual);
$mediator = $_POST['mediator'];
$feeMediator = $_POST['feeMediator'];
$feeMediator = $conn->rupiahToInt($feeMediator);
$pajak = $_POST['pajak'];
$pajak = $conn->rupiahToInt($pajak);
$rekondisi = $_POST['rekondisi'];
$rekondisi = $conn->rupiahToInt($rekondisi);
$nama = $_SESSION['nama'];

$input	= mysqli_query($con,"INSERT INTO `pembelian` (`id_pembelian`, `nopol`, `tipe`, `warna`, `tahun`, `jarak_tempuh`, `jenis_bbm`, `mediator`, `tgl_beli`, `hrg_beli`, `hrg_jual` , `fee_mediator`, `pajak`, `rekondisi`, `status`, `author`, `gambar`, `id_pelanggan`) 
    VALUES ('".$id ."', "
        . "'".$nopol."', "
        . "'".$tipe."', "
        . "'".$warna."', "
        . "'".$tahun."', "
        . "'".$jarak_tempuh."', "
        . "'".$jenis_bbm."', "
        . "'".$mediator."', "
        . "'".$tgl_beli."', "
        . "'".$hrg_beli."', "
        . "'".$hrg_jual."', "
        . "'".$feeMediator."', "
        . "'".$pajak."', "
        . "'".$rekondisi."', "
        . "'siap', "
        . "'".$nama."', "
        . "'".$filename."', "
        . "NULL);");

$input2	= mysqli_query($con,"INSERT INTO `stok` (`id_pembelian`, `nopol`, `tipe`, `warna`, `tahun`, `jarak_tempuh`, `jenis_bbm`, `hrg_jual`, `tgl_beli` , `author`, `gambar`, `booked`, `id_pelanggan`) "
        . "VALUES ('".$id."', "
        . "'".$nopol."', "
        . "'".$tipe."', "
        . "'".$warna."', "
        . "'".$tahun."', "
        . "'".$jarak_tempuh."', "
        . "'".$jenis_bbm."', "
        . "'".$hrg_jual."', "
        . "'".$tgl_beli."', "
        . "'".$nama."', "
        . "'".$filename."', "
        . "'0', "
        . "NULL);");
    if ($input && $input2) {
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


