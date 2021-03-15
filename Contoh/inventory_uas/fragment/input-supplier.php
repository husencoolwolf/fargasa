<?php
session_start();
require_once dirname(__DIR__,1).'/koneksi.php';

  if(!isset ($_SESSION['username']) && $_SESSION['privilege']<>'admin') {
    ?>
      <script language="JavaScript">
        alert('Anda harus login sebagai admin untuk mengakses halaman ini!!');
        document.location.href='../index.php';
      </script>   
    <?php 
  }else{
$data = mysqli_query($sambung ,"SELECT * FROM tbl_supplier");
$hasil = mysqli_fetch_array($data);
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/register.css">
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="../text/css" href="assets/css/register.css">
</head>
<body  >

 <a href="\inventory_uas/index.php" class="w3-hover w3-hover-text-grey" style="float: left; z-index: 5;" title="Kembali">
    <i class="fa fa-chevron-circle-left w3-xxxlarge"> </i>
  </a>
 
<div class="container"  style="padding-top: 50px;" align="center">
  <h1 style="background-color: white;">Input Supplier</h1>

  <form action="../assets/php func/action_tambah_supplier.php" method="post" enctype="multipart/form-data">
    <table id="regTBL" cellpadding="6" style="padding: 10px">
    <tbody align="center">
    <tr>
      <td>
    <label for="nama_supp"></label>
    <input type="text" id="nama_supp" name="nama_supp" placeholder="Masukan Nama Perusahaan SUPPLIER" style="width: 80%" required></td>
    </tr>
    <tr>
      <td>
    <span style="float: left;">
    <img src="../assets/pic/supplier/supplier-default.png" class="w3-circle w3-margin-right" id="fotoView" style="width:80px;height: 80px ">
    </span>
    <span style="float: left  ">
    <input id="fotoSource" class="w3-white" type="file" name="fotoSource"  title="Pilih Foto" style="border:none;width: 100%; margin-top: 15px; padding:5px" onchange="previewImage()"/>
    </span>
      </td>
    </tr>

    <tr>
      <td>
    <input class="button w3-hover-green" type="submit" value="submit" name='submit'>
      </td>
    </tr>
  </tbody>
</table>
  </form>
</div>
</div>
</body>

</html>

<script type="text/javascript">
  function previewImage() {
    document.getElementById("fotoView").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("fotoSource").files[0]);
 
    oFReader.onload = function(oFREvent) {
      document.getElementById("fotoView").src = oFREvent.target.result;
    };
  };
</script>

 <?php
}
?>
