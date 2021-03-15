<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../assets/css/index.css">
	<title>Keranjang Saya</title>
</head>
<body>
	<?php
		session_start();
        require_once dirname(__DIR__,2).'/koneksi.php';
        $ID_USER = $_SESSION['id'];
        $data = "";
        $hasilKeranjang = mysqli_fetch_assoc(mysqli_query($sambung ,"SELECT keranjang FROM tbl_user WHERE id_user='$ID_USER'" ));


        if (isset($_POST['sboxSubmit'])) {
            $searchValue = $_POST['sbox'];
            $barangDicari = [];
            $data = mysqli_query($sambung ,"SELECT * FROM tbl_barang WHERE id_brg like '%$searchValue%' OR nama_brg LIKE '%$searchValue%' OR merk_brg LIKE '%$searchValue%'");
            if (mysqli_num_rows($data)==0) {
            	$listPesanan["id"]=[];
            }
            while ($hasil = mysqli_fetch_array($data)) {
			$listPesanan["id"][] = $hasil['id_brg'];
			$listPesanan["nama"][] = $hasil['nama_brg'];
			$listPesanan["gambar"][] = $hasil['gambar'];
			$listPesanan["merk"][] = $hasil['merk_brg'];
			$listPesanan["harga"][] = $hasil['harga'];
			$listPesanan["stok"][] = $hasil['stok'];
			$listPesanan["satuan"][] = $hasil['satuan'];
			}
			if ($hasilKeranjang['keranjang']=="") {
				echo "Keranjang Masih kosong. Silahkan untuk belanja terlebih dahulu!!";
				$listKeranjang = [];
			}else{
				$listKeranjang = explode(",,", $hasilKeranjang['keranjang']);

				for ($i=0; $i < count($listPesanan['id']);$i) {
					$check = array_search($listPesanan['id'][$i],$listKeranjang,true);
					// echo "cek [".$i."]".$check."<br>";
					if ($check == false) {
						array_splice($listPesanan['id'], $i, 1);
						array_splice($listPesanan['nama'], $i, 1);
						array_splice($listPesanan['gambar'], $i, 1);
						array_splice($listPesanan['merk'], $i, 1);
						array_splice($listPesanan['harga'], $i, 1);
						array_splice($listPesanan['stok'], $i, 1);
						array_splice($listPesanan['satuan'], $i, 1);
						// print_r($listPesanan['id']);echo "O<br>";
					}else{
						// $barangDicari[$check] = $listPesanan['id'][$check];
						array_push($barangDicari, $listPesanan['id'][$i]);
						// echo "index ke - ".$i."=".$check."<br>";
						$i++;
					}
					// var_dump($barangDicari);echo "hasil<br>";
					}
				}
			
				// print_r($listPesanan['id']);echo "<br>";
			// var_dump($listKeranjang);echo "<br>";
			
				
			
			// var_dump($check);
			if (count($barangDicari)>0) {
				$listKeranjang = $barangDicari;
			}else{
				$listKeranjang = [];
			}
			
            ?>
              <script type="text/javascript">
                document.getElementById("sboxForm").reset();
              </script>
            <?php
        }else if (isset($_POST['sboxReset'])) {
          $data = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
          while ($hasil = mysqli_fetch_array($data)) {
			$listPesanan["id"][] = $hasil['id_brg'];
			$listPesanan["nama"][] = $hasil['nama_brg'];
			$listPesanan["gambar"][] = $hasil['gambar'];
			$listPesanan["merk"][] = $hasil['merk_brg'];
			$listPesanan["harga"][] = $hasil['harga'];
			$listPesanan["stok"][] = $hasil['stok'];
			$listPesanan["satuan"][] = $hasil['satuan'];
		}
			if ($hasilKeranjang['keranjang']=="") {
				echo "Keranjang Masih kosong. Silahkan untuk belanja terlebih dahulu!!";
				$listKeranjang = [];
			}else{
				$listKeranjang = explode(",,", $hasilKeranjang['keranjang']);
			}
        }
        else{
          $data = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
          while ($hasil = mysqli_fetch_array($data)) {
			$listPesanan["id"][] = $hasil['id_brg'];
			$listPesanan["nama"][] = $hasil['nama_brg'];
			$listPesanan["gambar"][] = $hasil['gambar'];
			$listPesanan["merk"][] = $hasil['merk_brg'];
			$listPesanan["harga"][] = $hasil['harga'];
			$listPesanan["stok"][] = $hasil['stok'];
			$listPesanan["satuan"][] = $hasil['satuan'];
		}
			if ($hasilKeranjang['keranjang']=="") {
				echo "Keranjang Masih kosong. Silahkan untuk belanja terlebih dahulu!!";
				$listKeranjang = [];
			}else{
				$listKeranjang = explode(",,", $hasilKeranjang['keranjang']);
			}
        }
        if(!$data){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
          if(mysqli_num_rows($data) == -1) {
            echo "Data Anda Tidak Ada / Kosong!";
          }else{
          	
        // masukin data dari db ke array assosiative
         


          //id_brg nama_brg  merk_brg  satuan  min_order harga stok gambar 
?>
<style type="text/css">
#tableBarang table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  height: 500px;
  border: 1px solid #ddd;
}

#tableBarang th {
  padding: 8px;
  text-align: center;
  position: sticky;
  top: 0px;
  background-color: #f1f1f1 
}
#tableBarang td{
   text-align: center; 
   vertical-align: middle;
}

.cb{
  width: 15px;
  height: 15px;
  vertical-align: baseline;
}

</style>
<?php
	// echo $hasilKeranjang['keranjang'];
	
?>
	<!DOCTYPE html>
	<html>
	<head>
	  <title>Tampil Barang</title>
	</head>
	<body>
	  <div class="w3-bar w3-top w3-text-white w3-large" style="z-index:4;background-color: rgba(0,0,0,1); ">
	  <span style="font-size:30px;cursor:pointer;padding-left: 10px;">
	      <a href="../../index.php" class="w3-hover w3-hover-text-gray" style="float: left; z-index: 5;" title="Kembali">
	        <i class="fa fa-chevron-left w3-xxxlarge"> </i>
	    </a>
	  </span>
	  <span class="w3-bar-item w3-right">Eresha Inventory</span>
	</div>
	  <div class="w3-container" style="margin-top: 50px">
	    <div style="overflow: auto;max-height: 80%;margin: 16 0">
	      <div style="float: right;width: 30%">
	      <span>
	      <form action="detail-keranjang.php" id="sboxForm" method="post" enctype="multipart/form-data" style="display: inline;">
	        
	        <span><input type="text" name="sbox" id="sbox" placeholder="Cari Barang" required style="width:50%;"></span>
	        <span><input class="w3-button w3-blue w3-margin" type="submit" value="Cari" name="sboxSubmit"></span>
	      </form>
	      </span>
	      <span>
	      <form action="detail-keranjang.php" method="post" enctype="multipart/form-data" style="display: inline;">
	        <span>
	        <input class="w3-button w3-blue" type="submit" value="reset" name="sboxReset"></span>
	      </form>
	      </span>
	      </div>
	      <form action="checkout.php" id="checkoutForm" method="post" enctype="multipart/form-data">
	    <table class=" w3-table w3-white w3-border" id="tableBarang" border="1" style='text-align:center;'>
	      <tr>
	        <td style="width: 160px;">Gambar</td>
	        <td style="width: 340px;">Nama Produk</td>
	        <td style="width: 200px;">Merek</td>
	        <td style="width: 100px;">satuan</td>
	        <td style="width: 30px;">Stok</td>
	        <td style="width: 200px;">Harga</td>
	        <td style="width: 50px;"></td>
	      </tr>
	        <?php
	             for($i=0; $i<count($listKeranjang);$i++) { 
	              $idxBarang = array_search($listKeranjang[$i],$listPesanan['id'],true);
	              if ($listPesanan["stok"][$idxBarang]=="0") {
	                ?>
	                  <tr style="background-color: pink">
	                <?php
	              }else{
	               ?>
	              <tr>
	              <?php
	                }
	              ?> 
	        <td>
	            <img class="w3-circle" src="../../assets/pic/produk/<?php echo $listPesanan["gambar"][$idxBarang];?>" width ="70" height="70" border="0"/> 
	        </td>
	        <td>
	            <?php echo $listPesanan["nama"][$idxBarang];?>  
	        </td>
	        <td>
	            <?php echo $listPesanan["merk"][$idxBarang];?>
	        </td>
	        <td>
	            <?php echo $listPesanan["satuan"][$idxBarang]?>
	        </td>
	        <td>
	            <?php echo $listPesanan["stok"][$idxBarang];?>
	        </td>
	        <td>Rp.<?php echo $listPesanan["harga"][$idxBarang];?> 
	        </td>
	        <td>
	            <input type="checkbox" name="cbox[]" class="cb" value="<?php echo $listPesanan['id'][$idxBarang];?>">
	            <span style="background-color: red;" class="w3-hover-text-white">
          			<a href="../../assets/php func/action_delete_keranjang.php?id_brg=<?php echo $listPesanan["id"][$idxBarang]?>" title="Hapus dari keranjang"><i class="fa fa-trash fa-fw"></i></a></span>
	        </td>
	            </tr>
	       
	       <?php
	              }
	            }
	           } 
	        ?>
    </table>
  </div>
  <div class="w3-bar w3-bottom w3-text-white w3-large" style="background-color: gray; margin-top: 50">
  		
		
  
		<span class="w3-bar-item w3-right w3-green w3-button" style="margin: 0 30px">
		  	<button type="submit" name='checkout' class="w3-button w3-hover">Checkout</button>
		</span>
		<span style="" class="w3-bar-item w3-right w3-red">
		  		<a href="../../index.php" class="w3-button w3-hover w3-hover-text-gray" style="" title="Kembali">
				    Batal
				</a>
		</span>
		
</div>
</div>
</body>
</html>
<?php
	 //penutup exeption keranjang kosong
?>