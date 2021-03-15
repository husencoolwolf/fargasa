<?php
session_start();
//include koneksi
include dirname(__DIR__,2).'/koneksi.php';
//cek dahulu, jika var get di set
if(isset($_GET['id_brg'])){
$IDlama = $_GET['id_brg'];
$ID_USER = $_SESSION['id'];
		$final="";
		$input	= mysqli_query($sambung,"SELECT keranjang FROM tbl_user WHERE id_user='$ID_USER'");
		$hasilKeranjang = mysqli_fetch_assoc($input);
		$itemlist = explode(",,", $hasilKeranjang['keranjang']);
		// echo "item sbelum dirubah : " . var_dump($itemlist)."<br>";
		// echo "Hasil Query : " . var_dump($hasilKeranjang)."<br>";

		$idx = array_search($IDlama,$itemlist,true);
		array_splice($itemlist, $idx, 1);
		for ($i=0; $i < count($itemlist); $i++) { 
			if ($i==count($itemlist)-1){  //inx terakhir
				$final = $final . $itemlist[$i];
			}else{
				$final = $final . $itemlist[$i].",,";
			}
		}
		// echo "item stelah dirubah : " . var_dump($itemlist)."<br>";
		$update = mysqli_query($sambung,"UPDATE `tbl_user` SET  `keranjang`='$final' WHERE id_user='$ID_USER'");
		// echo $final;
		if (mysqli_affected_rows($sambung) >0) {
	//Jika Sukses
	?>
		<script language="JavaScript">
			alert('Data Barang Berhasil di Delete!');
			document.location.href='../../index.php';
		</script>		
	<?php 

	}
	else { ?>
	<!-- //Jika Gagal -->
	<script language="JavaScript">
			alert('Delete Barang Gagal Silakan Ulangi!');
			document.location='../../index.php';
		</script>
	<?php  
	die (mysqli_error($sambung));
	}
	//Tutup koneksi engine MySQL


}else{//kalau var get gk ada
	?>
	<script type="text/javascript">
		alert('Delete Barang Gagal Silakan Ulangi!');
			document.location='../../index.php';
	</script>
	<?php
}
mysqli_close($sambung);
?> 

