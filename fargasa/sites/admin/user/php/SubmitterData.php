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

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$nope = $_POST['nope'];
$privilege = $_POST['privilege'];


$input	= mysqli_query($con,"INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `alamat`, `email`, `no_hp`, `privilege`) 
    VALUES ('".$id ."', "
        . "'".$nama."', "
        . "'".$username."', "
        . "'".$password."', "
        . "'".$alamat."', "
        . "'".$email."', "
        . "'".$nope."', "
        . "'".$privilege."');");

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
    $cekuser = mysqli_query($con ,"SELECT id_user FROM user WHERE id_user = '$id2'");
        if(mysqli_num_rows($cekuser)==0){
            return $id2;
        }else{
            $id2 = createId($con,$id2);
            checkId($con,$id2);
           }
}
?>


