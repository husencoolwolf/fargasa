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
        
    }

    if (isset($_GET['action']) && $_GET['action']) {
            include "sites/misc/login.php";
        
    }else{
        include "sites/misc/landpage.php";
    }

?>




<?php
    
}
?>