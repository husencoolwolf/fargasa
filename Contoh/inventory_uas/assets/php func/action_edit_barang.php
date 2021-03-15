<?php
//include koneksi
include dirname(__DIR__,2).'/koneksi.php';
require_once 'create-user-id.php';
require_once 'cek-id-statis.php';
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['submit'])){
$IDlama = $_GET['id_brg'];

$ID = $_POST['id_brg'];
$NAMA = $_POST['nama_brg'];
$MEREK = $_POST['merk_brg'];
$SATUAN = $_POST['satuan'];
$HARGA = $_POST['harga'];
$FOTO = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];
$lokasi_dir = '';


$data = mysqli_query($sambung ,"SELECT * FROM tbl_barang WHERE id_brg='$IDlama'");
$hasil = mysqli_fetch_array($data);

//cek apa user input foto atau tidak
if ($FOTO == "") {
	$FOTO = $hasil['gambar'];
}
 //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	//input data ke table 
		$input	=mysqli_query($sambung,"UPDATE `tbl_barang` SET `id_brg`='$ID', `nama_brg`='$NAMA',`merk_brg`='$MEREK', `satuan`= '$SATUAN', `harga`='$HARGA', `gambar`='$FOTO' WHERE id_brg='$IDlama'");
		move_uploaded_file($tmp_name, '../../assets/pic/produk/'.$FOTO);
		if (mysqli_affected_rows($sambung) >=0) {
	//Jika Sukses
	?>
		<script language="JavaScript">
			alert('Data Barang Berhasil di update!');
			document.location.href='../../fragment/detail-barang-admin.php?id_brg=<?php echo $ID;?>';
		</script>		
	<?php 

	}
	else { ?>
	<!-- //Jika Gagal -->
	<script language="JavaScript">
			alert('Update Barang Gagal Input! Silakan Ulangi');
			document.location='../../fragment/detail-barang-admin.php?id_brg=<?php echo $hasil["id_brg"];?>';
		</script>
	<?php  
	die (mysqli_error($sambung));
	}
	//Tutup koneksi engine MySQL


}
mysqli_close($sambung);
?> 

