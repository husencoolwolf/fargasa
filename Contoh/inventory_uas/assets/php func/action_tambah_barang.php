<?php
//include koneksi
include dirname(__DIR__,2).'/koneksi.php';
require_once 'create-user-id.php';
require_once 'cek-id.php';
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['submit'])){

$ID = $_POST['id_brg'];
$NAMA = $_POST['nama_brg'];
$MEREK = $_POST['merk_brg'];
$SATUAN = $_POST['satuan'];
$MIN = $_POST['min_order'];
$HARGA = $_POST['harga'];
$FOTO = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];
$lokasi_dir = '';

//cek apa id udah ada.
$data = mysqli_query($sambung ,"SELECT * FROM tbl_barang WHERE id_brg='$ID'");
$hasil = mysqli_fetch_array($data);
 //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
if (cekId($sambung ,'tbl_barang', 'id_brg', $ID)<>true) {
	?>
		<script language="JavaScript">
			alert('ID sudah dipakai !, silahkan diulang kembali');
			document.location='../../fragment/input-barang.php';
		</script>
	<?php
	}
	//input data ke table 
		$input	=mysqli_query($sambung,"INSERT INTO `tbl_barang` (`id_brg`, `nama_brg`, `merk_brg`, `satuan`, `min_order`, `harga`, `gambar`) VALUES ('$ID','$NAMA','$MEREK', '$SATUAN', '$MIN', '$HARGA', '$FOTO')");
		move_uploaded_file($tmp_name, '../../assets/pic/produk/'.$FOTO);
		if (mysqli_affected_rows($sambung) >0 ) {
	//Jika Sukses
	?>
		<script language="JavaScript">
			alert('Data Barang Berhasil diinput!');
			document.location.href='../../index.php';
		</script>		
	<?php 

	}
	else { ?>
	<!-- //Jika Gagal -->
	<script language="JavaScript">
			alert('Data Barang Gagal Input! Silakan Ulangi');
			document.location='../../fragment/input-barang.php';
		</script>
	<?php  
	die (mysqli_error($sambung));}
	//Tutup koneksi engine MySQL


}
mysqli_close($sambung);
?> 

