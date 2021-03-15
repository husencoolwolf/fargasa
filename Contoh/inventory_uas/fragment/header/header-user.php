<?php

	$id = $_SESSION['id'];
	
        $keranjang = mysqli_query($sambung ,"SELECT keranjang FROM tbl_user WHERE id_user='$id'" );
        if(!$keranjang){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
    		$hasilKeranjang = mysqli_fetch_assoc($keranjang);
    		// print_r($hasilKeranjang);
    		if ($hasilKeranjang['keranjang']=="") {
    			$hasil =[];
    		}else{
    		$hasil = explode(",,", $hasilKeranjang['keranjang']);
    		}
?>
<div class="w3-bar w3-top w3-text-white w3-large" style="z-index:4;background-color: rgba(0,0,0,0.6); ">
 
  <span style="font-size:30px;cursor:pointer;padding-left: 10px;" onclick="openNav()">&#9776; Menu</span>
  <span onclick="notifShow();" style="float: right;cursor: pointer;margin-right: 10px;">
  	<div class="notif" style="">
  		<i class="fa fa-shopping-cart" style="font-size: 30px;line-height: 40px;color: black">
  			
  		</i>
  	<span class="num" style="margin-right: 10px"><?php echo count($hasil);?></span>
  	</div>
  </span>
  
</div>
<div class="  w3-collapse w3-white w3-animate-top" style="z-index:4;width:300px;height: 50%;display: none;position: fixed;right: 0;top: 0;" id="notifContent">
  <!-- content notif -->
  <div style="padding: 12px 12px">
  <?php
  // print_r($hasil);
  // echo "ini".array_search("GLP-001",$arrayglobal['id'],true);
  // print_r($arrayglobal);
  // var_dump($globalBarang['id_brg']);
    $batas=3;
    if (count($hasil)<$batas) {
      $batas = count($hasil);
    }
    for ($i=0; $i < $batas; $i++) {
      $indIDKeranjang = array_search($hasil[$i],$arrayglobal['id'],true);

      ?>
      <form action="fragment/transaksi/checkout.php" method="post" enctype="multipart/form-data">
      <div class="w3-hoverable w3-hover-light-gray" style="padding: 8px 5px;vertical-align: baseline;">
        <label style="cursor: pointer;">
        <div style="display: inline-block;vertical-align: baseline;">
          <input type="checkbox" name="cbox[]" value="<?php echo $arrayglobal['id'][$indIDKeranjang];?>" style ="width: 15px;height: 15px;margin-right: 12px;"/>
        </div>
        <div style="display: inline-block;vertical-align: baseline;">
          <img src="assets/pic/produk/<?php echo$arrayglobal['gambar'][$indIDKeranjang];?>" class="w3-circle" style="width:70px;height:70px;">
        </div>
        <div style="display: inline-block;width: 60%;vertical-align: middle;">
          <STRONG><?php echo $arrayglobal['merk'][$indIDKeranjang];?></STRONG><br>
          <!-- test<br> -->
          <strong class="w3-blue" style="padding: 2px;margin: 4px 0px;"><?php echo "Rp. ".$arrayglobal['harga'][$indIDKeranjang];?></strong>
        </div>
        </label>
      </div>



    <?php
    }
  ?>
    </div>
  
    <div style="position: absolute;bottom: 0;width: 100%; margin-bottom: 35px">
      <div>
    <button class="w3-button w3-hover-blue" name="btnPesan" style="width: 50%;padding: 5px"><i class="fa fa-shopping-cart fa-fw"></i> Pesan</button>
    <a href="fragment/transaksi/detail-keranjang.php" class="w3-button w3-hover-blue" style="width: 50%;float: right;padding: 5px" onclick="notifShow();"><i class="fa fa-eye fa-fw"></i> Detail Keranjang</a>
  </div>
  </div>
  <!-- Tombol tutup side bar -->

    <div style="position:absolute;bottom: 0;width: 100%;text-align: left;">
    <a href="javascript:void(0)" class="w3-button w3-padding-8 w3-hover-red" style="width: 100%;" onclick="notifShow();"><i class="fa fa-remove fa-fw"></i> Tutup</a>
  </div>
</div>
</form>



<?php
}
?>