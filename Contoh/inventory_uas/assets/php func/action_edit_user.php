<?php
//include koneksi
include dirname(__DIR__,2).'/koneksi.php';
require_once 'create-user-id.php';
require_once 'cek-id-statis.php';
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['submit'])){
$IDlama = $_GET['id_user'];


$NAMA = $_POST['nama'];
$ALAMAT = $_POST['alamat'];
$NM_PERUSAHAAN = $_POST['nm_perusahaan'];
$ALAMAT_PERUSAHAAN = $_POST['alamat_perusahaan'];
$NOPE = $_POST['nope'];
$FOTO = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];
$lokasi_dir = '';


$data = mysqli_query($sambung ,"SELECT * FROM tbl_user WHERE id_user='$IDlama'");
$hasil = mysqli_fetch_array($data);

//cek apa user input foto atau tidak
if ($FOTO <> "") {
	move_uploaded_file($tmp_name, '../../usr_img/'.$FOTO);
}
else{
	$FOTO = $hasil['gambar'];
}
 //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	//input data ke table 
		$input	=mysqli_query($sambung,"UPDATE `tbl_user` SET  `nama`='$NAMA',`alamat`='$ALAMAT', `nm_perusahaan`= '$NM_PERUSAHAAN', `alamat_perusahaan`='$ALAMAT_PERUSAHAAN', `no_tlp`='$NOPE' ,`gambar`='$FOTO' WHERE id_user='$IDlama'");
		
		if (mysqli_affected_rows($sambung) >=0) {
	//Jika Sukses
	?>
		<script language="JavaScript">
			alert('User Berhasil di UPDATE!');
			document.location.href='../../fragment/detail-user.php';
		</script>		
	<?php 

	}
	else { ?>
	<!-- //Jika Gagal -->
	<script language="JavaScript">
			alert('User Gagal Update! Silakan Ulangi');
			document.location='../../fragment/detail-user.php';
		</script>
	<?php  
	die (mysqli_error($sambung));
	}
	//Tutup koneksi engine MySQL


}
mysqli_close($sambung);
?> 

