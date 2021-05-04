<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
$_SESSION['page'] = "staffMainMenu";
if(!isset($_SESSION['username']) && $_SESSION['privilege']<>'staff'){
    ?>
    <script language="JavaScript">
        alert('Session Telah Habis!!\nAnda harus login untuk mengakses halaman ini!!');
        document.location.href='/fargasa/index.php?action=login';
    </script>
    <?php
}else{
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" type="image/png" href="/fargasa/assets/Fargasa Logo Circle.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">

    <title>Main Menu</title>
  </head>
  <body>
    <!-- navbar -->
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/fargasa/sites/misc/navbar/staffNavbar.php";?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
    <script src="/fargasa/dist/js/bootstrap.js"></script>

  </body>
</html>
<?php
}
?>