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
  }
   

$data = mysqli_query($sambung ,"SELECT DISTINCT satuan FROM tbl_barang");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/index.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Input Barang</title>
</head>

<style type="text/css">
.loader {
  border: 8px solid #a3a199;
  border-radius: 50%;
  border-top: 8px solid black;
  width: 40px;
  height: 40px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

  select, textarea{
   width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
</style>

<body>

 <a href="../index.php" class="w3-hover w3-hover-text-grey" style="float: left; z-index: 5;" title="Kembali">
    <i class="fa fa-chevron-circle-left w3-xxxlarge"> </i>
  </a>
 
<div class="container"  style="padding-top: 50px;">
  <h3>Input Barang</h3>

  <form action="../assets/php func/action_tambah_barang.php" method="post" enctype="multipart/form-data">
    
    <label for="id_brg">ID Barang</label>
    <input type="text" id="id_brg" name="id_brg" placeholder="Masukan ID Barang.." required>

    <label for="nama_brg">Nama Barang</label>
    <input type="text" id="nama_brg" name="nama_brg" placeholder="Masukan Nama Barang.." required>
    
     <label for="merk_brg">Merek Barang</label>
    <input type="text" id="merk_brg" name="merk_brg" placeholder="Merek Barang" required>

    <label for="satuan">Satuan</label><br>
    <span>
    <select id="satuan" name="satuan">
      <?php
        while ($hasil = mysqli_fetch_array($data)) {?>
          <option class="select-form" value="<?php echo $hasil["satuan"];?>"><?php echo $hasil["satuan"];?></option>
          <?php
        }
      ?>
     
    </select>
  </span>

  <span>
    <div style="width: 10px;display: inline;">
    <a title="Tambah Satuan" style="cursor: pointer" onclick="document.getElementById('id01').style.display='block'" ><i class="fa fa-plus-circle w3-xxxlarge" style="vertical-align: middle;"></i></a>
  </div>
    </span>
    <br>

    <label for="min_order">Minimun Order</label>
    <input type="number" id="min_order" name="min_order" placeholder="Minimun Order" value="1" required>

    <label for="harga">Harga</label>
    <input type="number" id="harga" name="harga" placeholder="Harga">

    <span style="float: left;margin-bottom: 10px;">
      <div class="loader " id="loaderImg" style="width:80px;height: 80px;display: none ">
                </div>
    <img src="../assets/pic/produk/default-barang.png" class="w3-circle w3-margin-right" id="fotoView" style="width:80px;height: 80px ">
    </span>
    <span style="float: left  ">
    <input id="foto" class="w3-white" type="file" name="foto"  title="foto" style="border:none;width: 100%; margin-top: 15px; padding:5px" onchange="previewImage()"/>
  </span>



    <input type="submit" value="submit" name='submit' style="float: right;">
  </form>
</div>
</div>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
       <h3>Tambah Satuan</h3>
              <input type="text" placeholder="Masukkan Satuan Baru" id="satuanBaru" name="satuanBaru" required>
              <a class="w3-button" onclick="tambahSatuan();" style="float: right;margin: 10px">Tambah</a>
      </div>
    </div>

</body> 

</html>

 <?php

?>

<script type="text/javascript">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
</script>
