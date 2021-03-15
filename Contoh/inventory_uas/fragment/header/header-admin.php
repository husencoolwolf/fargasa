<?php

	$id = $_SESSION['id'];
	require_once dirname(__DIR__,2).'/koneksi.php';
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
  <span style="float: right;">Welcome Admin !!!</span>
  
</div>

<?php
}
?>