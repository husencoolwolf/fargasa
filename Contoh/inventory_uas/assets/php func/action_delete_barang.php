<?php
//include koneksi
include dirname(__DIR__,2).'/koneksi.php';
//cek dahulu, jika var get di set
if(isset($_GET['id_brg'])){
$IDlama = $_GET['id_brg'];

		$input	=mysqli_query($sambung,"DELETE FROM tbl_barang WHERE id_brg='$IDlama'");
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

