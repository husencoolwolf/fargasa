<?php
require_once dirname(__DIR__,2).'/koneksi.php';
require_once dirname(__DIR__).'/php func/create-user-id.php';
	$id = createId();
	$nama = $_POST['txt_nama_dpn'].' '.$_POST['txt_nama_blk'];
	$username = $_POST['txt_username'];
	$password = $_POST['txt_password'];
	$nope = $_POST['nope']; 
	$alamat = $_POST['txt_alamat'];	
	// upload foto
	$lokasi_dir = '../../usr_img/';
	$namaFoto = "";
	if (isset($_POST['btn_simpan']) && isset($_FILES['fotoSource'])) {
		$name_file_foto = $_FILES['fotoSource']['name'];
		$namaFoto = $name_file_foto;
		$tmp_name = $_FILES['fotoSource']['tmp_name'];
     	if (move_uploaded_file($tmp_name, $lokasi_dir.$name_file_foto)) {
			}	
		}
	else{
		echo "Error";
	}
	// move_uploaded_file($tmp_name, $lokasi_dir.$name_file_foto);
	//info perusahaan
	$namaPerusahaan = $_POST['txt_nama_prs'];
	$alamatPerusahaan = $_POST['txt_alamat_prs'];

	$cekuser = mysqli_query($sambung , "INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nm_perusahaan`, `alamat_perusahaan`, `nama`, `alamat`, `no_tlp`, `gambar`) VALUES ('$id', '$username', '$password', '$namaPerusahaan', '$alamatPerusahaan', '$nama', '$alamat', '$nope', '$namaFoto')");
 if(!$cekuser){
 	die ("Data Admin Kosong" . mysqli_error($sambung));
 }else{
 	?>
 	<script type="text/javascript">alert("User telah dibuat!");</script>
 	<?php
 }

 header("location:../../index.php");
?>