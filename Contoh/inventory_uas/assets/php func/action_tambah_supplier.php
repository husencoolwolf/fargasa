<?php
//include koneksi
include dirname(__DIR__,2).'/koneksi.php';
require_once 'create-user-id.php';
require_once 'cek-id.php';
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['submit'])){

$ID = createId();
$NAMA = $_POST['nama_supp'];
$FOTO = $_FILES['fotoSource']['name'];
$tmp_name = $_FILES['fotoSource']['tmp_name'];
$lokasi_dir = '';

//cek apa id udah ada.
$data = mysqli_query($sambung ,"SELECT * FROM tbl_supplier WHERE id_supplier='$ID'");
$hasil = mysqli_fetch_array($data);
 //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
if (cekId($sambung ,'tbl_supplier', 'id_supplier', $ID)<>true) {
	?>
		<script language="JavaScript">
			alert('ID sudah dipakai !, silahkan diulang kembali');
			document.location='../../fragment/input-supplier.php';
		</script>
	<?php
	}
	//input data ke table 
		$input	=mysqli_query($sambung,"INSERT INTO `tbl_supplier` (`id_supplier`, `perusahaan_supplier`, `gambar`) VALUES ('$ID','$NAMA','$FOTO')");
		move_uploaded_file($tmp_name, '../../assets/pic/supplier/'.$FOTO);
		if (mysqli_affected_rows($sambung) >0 ) {
	//Jika Sukses
	?>
		<script language="JavaScript">
			alert('Data Supplier Berhasil diinput!');
			document.location.href='../../index.php';
		</script>		
	<?php 

	}
	else { ?>
	<!-- //Jika Gagal -->
	<script language="JavaScript">
			alert('Data Supplier Gagal Input! Silakan Ulangi');
			document.location='../../fragment/input-barang.php';
		</script>
	<?php  
	die (mysqli_error($sambung));}
	//Tutup koneksi engine MySQL


}
mysqli_close($sambung);
?> 

