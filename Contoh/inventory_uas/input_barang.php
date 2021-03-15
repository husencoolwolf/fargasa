<?php
include dirname(__DIR__,1).'/controller/control.php';


require_once dirname(__DIR__,1)."/koneksi.php";
  if(!isset($_SESSION['username'])) {
    header("location:index.php");
  }else{
   

$data = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
$hasil = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body  >

 <a href="\layoutweb/index.php" class="w3-hover w3-hover-text-grey" style="float: left; z-index: 5;" title="Kembali">
    <i class="fa fa-chevron-circle-left w3-xxxlarge"> </i>
  </a>
 
<div class="container"  style="padding-top: 50px;">
  <h3>Input Barang</h3>

  <form action="action_tambah_bb.php" method="post" enctype="multipart/form-data">
    
    <label for="id_brg">ID Barang</label>
    <input type="text" id="id_brg" name="id_brg" placeholder="Masukan ID Barang.." required>

    <label for="nama_brg">Nama Barang</label>
    <input type="text" id="nama_brg" name="nama_brg" placeholder="Masukan Nama Barang.." required>
    
     <label for="merk_brg">Merek Barang</label>
    <input type="text" id="merk_brg" name="merk_brg" placeholder="Merek Barang" required>

    <label for="satuan">Satuan</label>
    <select id="satuan" name="satuan">
      
      <option value="kg">kg</option>
      <option value="box">box</option>
     
    </select>

    <label for="harga">Harga</label>
    <input type="text" id="harga" name="harga" placeholder="Harga">

    <span style="float: left;">
    <img src="../assets/pic/produk/default-barang.png" class="w3-circle w3-margin-right" id="fotoView" style="width:80px;height: 80px ">
    </span>
    <span style="float: left  ">
    <input id="foto" class="w3-white" type="file" name="foto"  title="foto" style="border:none;width: 100%; margin-top: 15px; padding:5px" onchange="previewImage()"/>
  </span>



    <input type="submit" value="submit" name='submit' style="float: right;">
  </form>
</div>
</div>
</body>

</html>

 <?php
include('footer.php'); }
?>
