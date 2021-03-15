
<?php
session_start();
require_once dirname(__DIR__,2).'/koneksi.php';
  if(!isset ($_SESSION['username'])) {
    ?>
      <script language="JavaScript">
        alert('Anda harus login terlebih dahulu untuk mengakses halaman ini!!');
        document.location.href='../../index.php';
      </script>   
    <?php 
  }
  if (!isset($_POST['cbox'])) {
  	?>
      <script language="JavaScript">
        alert('Anda harus memilih minimal 1 barang untuk diproses checkout!!!');
        document.location.href='../../index.php';
      </script>   
    <?php 
  }
$idUser = $_SESSION["id"];   
$listPesanan =[];

$data = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
while ($hasil = mysqli_fetch_array($data)) {
	$listPesanan["id"][] = $hasil['id_brg'];
	$listPesanan["gambar"][] = $hasil['gambar'];
	$listPesanan["merk"][] = $hasil['merk_brg'];
	$listPesanan["harga"][] = $hasil['harga'];
	$listPesanan["stok"][] = $hasil['stok'];
	$listPesanan["satuan"][] = $hasil['satuan'];
}

$dataUser = mysqli_query($sambung ,"SELECT * FROM tbl_user where id_user='$idUser'");
$hasilUser = mysqli_fetch_array($dataUser);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../Coolwolf new logo 2 transpared.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Checkout</title>
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

<div class="w3-bar w3-top w3-text-white w3-large" style="z-index:4;background-color: rgba(0,0,0,1); ">
  <span style="font-size:30px;cursor:pointer;padding-left: 10px;">
  		<a href="../../index.php" class="w3-hover w3-hover-text-gray" style="float: left; z-index: 5;" title="Kembali">
		    <i class="fa fa-chevron-left w3-xxxlarge"> </i>
		</a>
  </span>
  <span class="w3-bar-item w3-right">Eresha Inventory</span>
</div>

 
 
<div class="container"  style="padding-top: 50px;">
  <h3>CHECKOUT</h3>
<!-- Form checkout -->
  <form action="../../assets/php func/action_checkout.php" method="post" enctype="multipart/form-data">
    <label for="txt_alamat">Alamat Pengiriman</label><br>
  	<textarea id="txt_alamat" name="txt_alamat" placeholder="Alamat" disabled style="width: 100%"><?php echo $hasilUser['alamat'];?></textarea><br>

  	<!-- <input type="radio" name="opt"> -->
  	<div style="align-content: center;width: 100%;">
  		<label>
		  	<div style="padding: 20px;display: inline-block; cursor: pointer;">
			  	<input type="radio" id="ckalm[]" name="ckalm[]" onclick="switchAlamat(1);" checked>
			  	Pakai Alamat Pribadi 
			</div>
		</label>
		<label>
			<div style="padding: 20px;display: inline-block;cursor: pointer;">
			  	<input type="radio" id="ckalm[]" name="ckalm[]" onclick="switchAlamat(2);">
			  	Pakai Alamat Kantor
			</div>
		</label>
		<label>
			<div style="padding: 20px;display: inline-block;cursor: pointer;">
			  	<input type="radio" id="ckalm[]" name="ckalm[]" onclick="switchAlamat(3);">
			  	Tulis Alamat Baru
			</div>
		</label>
	</div>

	<!-- div barang barang yg di checkout -->
	<?php

	$totalHarga=0; 
	if(!empty($_POST['cbox'])) {
	    foreach($_POST['cbox'] as $check) {
	    		$idxBarangPesanan = array_search($check, $listPesanan['id'], true);
	    		$totalHarga = $totalHarga + $listPesanan['harga'][$idxBarangPesanan];
	            ?>
	            <input type="hidden" name="id_barang[]" value="<?php echo $listPesanan['id'][$idxBarangPesanan]?>">
	            <div style="width: 100%;padding: 20px;margin-bottom: 10px;" class="w3-light-gray w3-hoverable w3-hover-gray">
					<div style="display: inline-block;vertical-align: baseline;">
						<img src="../../assets/pic/produk/<?php echo $listPesanan['gambar'][$idxBarangPesanan]?>" class="w3-circle w3-margin-right" id="fotoView" style="width:80px;height: 80px; ">
					</div>
					<div style="display: inline-block;vertical-align: baseline;">
						<strong><h4><?php echo $listPesanan['merk'][$idxBarangPesanan];?></h4></strong>
						<span>Rp. </span>
						<span><h6 name="hargaItem[]" style="display: inline;padding: 3px" class="w3-blue"><?php echo $listPesanan['harga'][$idxBarangPesanan];?></h6></span>
						<!-- bypass form value untuk harga item-->
						<input type="hidden" name="hargaItem2[]" value="<?php echo $listPesanan['harga'][$idxBarangPesanan];?>">
					</div>
					<div style="display: inline-block;float: right;vertical-align: baseline;">
						<p style="width: 80%">Jumlah</p>
						<input type="number" id="jml_keluar" name="jml_keluar[]" min="1" max="<?php echo $listPesanan['stok'][$idxBarangPesanan];?>" onchange="ralatStok(<?php echo $listPesanan['stok'][$idxBarangPesanan];?>);" value="1"  style="width: 80%;text-align-last: center;"><strong><p style="display: inline">/<?php echo $listPesanan['stok'][$idxBarangPesanan];?></p></strong>
					    <input type="hidden" name="stokBarang[]" value="<?php echo $listPesanan['stok'][$idxBarangPesanan];?>">
                    </div>
				</div>


	            <?php
	    }
	} 
?>
	<!-- Div Biaya -->
	<div style="width: 100%; padding: 20px; margin-bottom: 5%" class="w3-light-gray">
		<div>
			<span style="display: inline-block;"><h4>Total Pesanan (<?php echo count($_POST['cbox']);?> Produk) : </h4>
			</span>
			<span style="float: right; display: inline-block;">
				<h4 id="totalItem" style="color: green">Rp. <?php echo $totalHarga;?></h4>
			</span>
		</div>
		
		<div>
			<span style="display: inline-block;"><h4>Ongkos Kirim :</h4>
			</span>
			<span style="float: right; display: inline-block;">
				<span style="color: green">
					<h4 style="display: inline-block;">Rp. </h4></span>
				<span >
					<h4 id="ongkir" style="color: green;display: inline-block;">25000</h4>
				</span>
			</span>
		</div>
		<div>
			<span style="display: inline-block;">
				<h4>Total Pembayaran : </h4>
			</span>
			<span style="float: right; display: inline-block;">
				<h4 name="totalHarga" style="color: green">Rp. <?php echo $totalHarga+ 25000;?></h4>
			</span>
		</div>
	</div>
	
  <!-- footer -->
  <div class="w3-bar w3-bottom w3-text-white w3-large" style="background-color: gray; margin-top: 50">
  		<span style="display: inline-block;">
			<h6 style="margin: 0 0">Total Pembayaran : </h6>
			<h6 name="totalHarga" style="margin: 0 0;" class="w3-green" align="center">Rp. <?php echo $totalHarga+ 25000;?></h6>
		</span>
		
  
		<span class="w3-bar-item w3-right w3-green w3-button" style="margin: 0 30px">
		  	<button type="submit" name='simpan' class="w3-button w3-hover">Submit</button>
		</span>
		<span style="" class="w3-bar-item w3-right w3-red">
		  		<a href="../../index.php" class="w3-button w3-hover w3-hover-text-gray" style="" title="Kembali">
				    Batal
				</a>
		</span>
		
</div>

  </form>
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
<?php
?>