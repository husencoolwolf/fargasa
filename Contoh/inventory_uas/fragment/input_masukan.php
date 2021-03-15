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
$dataBarang = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
$dataBarangSatuan = mysqli_query($sambung ,"SELECT DISTINCT satuan FROM tbl_barang");
$dataSupplier = mysqli_query($sambung ,"SELECT * FROM tbl_supplier");
// $hasil = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/register.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="../text/css" href="assets/css/register.css">
<link rel="shortcut icon" type="image/x-icon" href="Coolwolf new logo 2 transpared.ico">\

</head>

<style type="text/css">
input[type="number"]::placeholder {
  text-align: center;
}
select{
  text-align-last:center;
}

.selection {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}
</style>

<body>

 <a href="\inventory_uas/index.php" class="w3-hover w3-hover-text-grey" style="float: left; z-index: 5;" title="Kembali">
    <i class="fa fa-chevron-circle-left w3-xxxlarge"> </i>
  </a>
 
<div class="container"  style="padding-top: 50px;" align="center">
  <h1 style="background-color: rgba(255,255,255,0.6);">INPUT PEMASUKAN</h1>

  <form action="../assets/php func/action_input_masukan.php" method="post" enctype="multipart/form-data">
    <table id="regTBL" cellpadding="6" style="padding: 10px;width: 40%;text-align: center;">
    <tbody align="center">    
      <!-- combobox barang -->
    <tr>
      <td>
    <select class="selection" id="barang" name="barang" title="Pilih Barang" style="width: 80%" required>
      <option value="" disabled selected>Pilih Barang</option>
      <?php
        while ($hasilBarang = mysqli_fetch_array($dataBarang)) {?>
          <option value="<?php echo $hasilBarang["id_brg"];?>"><?php echo "[".$hasilBarang['id_brg']."]".$hasilBarang["nama_brg"]."(".$hasilBarang['merk_brg'].")";?></option>
          <?php
        }
      ?>
    </select>
  </td>
    </tr>
    <!-- Combobox Supplier -->
    <tr>
      <td>
    <select class="selection" id="supplier" name="supplier" title="Pilih Supplier" style="width: 80%" required>
      <option value="" disabled selected>Pilih Supplier</option>
      <?php
        while ($hasilSupplier = mysqli_fetch_array($dataSupplier)) {?>
          <option value="<?php echo $hasilSupplier["id_supplier"];?>"><?php echo "[".$hasilSupplier['id_supplier']."]"."-".$hasilSupplier["perusahaan_supplier"];?></option>
          <?php
        }
      ?>
    </select>
  </td>
    </tr>

    <tr>
      <td>
    <input type="number" min="1" id="jml_masuk" name="jml_masuk" value="1" placeholder="Masukan Jumlah Barang" style="width: 80%;text-align-last: center;" required></td>
    </tr>
    <!-- Combobox Satuan -->
    <!-- Combobox Supplier -->
    <tr>
      <td>
    <select class="selection" id="satuan" name="satuan" title="Pilih Satuan" style="width: 80%" required>
      <option value="" disabled selected>Pilih Satuan</option>
      <?php
        while ($hasilBarang2 = mysqli_fetch_array($dataBarangSatuan)) {?>
          <option value="<?php echo $hasilBarang2['satuan'];?>"><?php echo $hasilBarang2['satuan'];?></option>
          <?php
        }
      ?>
    </select>
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
  
</script>

 <?php
}
?>
