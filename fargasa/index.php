<?php
include 'ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
$errorLoginMsg="";
session_start();
//$_SESSION['privilege'] = 'stranger'; 
if(isset($_SESSION['privilege'])){
//    mysqli_query($con ,"Select * from user");
    if ($_SESSION['privilege']=='staff'){
        header("Location: sites/staff/staffMainMenu.php");
    }
    
}else{
    
    if(isset($_POST['loginSubmit'])){
        $periksa = $conn ->verified_login($_POST['username'], $_POST['password']);
        if ($periksa=="0"){
            header("Location: index.php?action=login");
        }else{
            $errorLoginMsg = $periksa;
        }
        
    }elseif(isset($_POST['registerSubmit'])){
        $data = array("nama"=>$_POST['nama'],
                    "username"=>$_POST['username'],
                    "password"=>$_POST['password'],
                    "alamat"=>$_POST['alamat'],
                    "email"=>$_POST['email'],
                    "nope"=>$_POST['nope']);
        $status = $conn->inputPelanggan($data);
//        include_once $_SERVER['DOCUMENT_ROOT'].'/fargasa/sites/pelanggan/php/inputPelanggan.php';
        if($status=="0"){
            ?>
            <script language="JavaScript">
                alert('Register Berhasil, Silahkan Login!');
                document.location.href='/fargasa/index.php?action=login';
            </script>
            <?php
        }else{
            $errorLoginMsg = $status;
        }
    }

    if (isset($_GET['action']) && $_GET['action']=="login") {
            include "sites/misc/login.php";
        
    }elseif(isset($_GET['action']) && $_GET['action']=="register"){
        include "sites/pelanggan/pelangganRegister.php";
    }else{
        include "sites/misc/landpage.php";
    }

?>




<?php
    
}
?>