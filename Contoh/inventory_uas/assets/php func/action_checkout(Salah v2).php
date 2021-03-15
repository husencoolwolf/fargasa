<?php
//include koneksi
session_start();
include dirname(__DIR__,2).'/koneksi.php';
require_once 'create-user-id.php';
require_once 'cek-id.php';
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['simpan'])){
$idBarang = $_POST['id_barang'];
$jumlahBarang = $_POST['jml_keluar'];
$id_user = $_SESSION['id'];
$harga = $_POST['hargaItem2'];


$queryUser = mysqli_query($sambung ,"SELECT * FROM tbl_user WHERE id_user='$id_user'");
// $queryBarang = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
if (!$queryUser) {
	die('Database Error Table User: ' . mysqli_error($sambung));
}else{
	$hasilUser= mysqli_fetch_array($queryUser);
	}
		$final="";
		// $input	= mysqli_query($sambung,"SELECT keranjang FROM tbl_user WHERE id_user='$ID_USER'");
		// $hasilKeranjang = mysqli_fetch_assoc($input);
		$itemlist = explode(",,", $hasilUser['keranjang']);
		// echo "item sbelum dirubah : " . var_dump($itemlist)."<br>";
		// echo "Hasil Query : " . var_dump($hasilKeranjang)."<br>";

//$barangCheckout;

// for ($i=0; $i < count($dataBarang['id']);$i) {
// 					$check = array_search($dataBarang['id'][$i],$listKeranjang,true);
// 					// echo "cek [".$i."]".$check."<br>";
// 					if ($check == false) {
// 						array_splice($dataBarang['id'], $i, 1);
// 						array_splice($dataBarang['nama'], $i, 1);
// 					}else{
// 						array_push($barangDicari, $listPesanan['id'][$i]);

// 						$i++;
// 					}
// 					// var_dump($barangDicari);echo "hasil<br>";
// 					}
		
$idKeluaran =  createId();
for ($i=0; $i < count($idBarang) ; $i++) {
	$total[$i] = $harga[$i] * $jumlahBarang[$i];
	
	

	$cek = cekId($sambung ,'tbl_barang', 'id_brg', $idKeluaran[$i]);
	if ($cek<>true) {
		$idKeluaran[$i] = $cek;
	}

	$newStok[$i] = hitungStok("stok", $idBarang[$i], $jumlahBarang[$i]);

	//input data ke table 
	$temp = hitungStok( "satuan", $idBarang[$i], $jumlahBarang[$i]);
	$input[$i]	= mysqli_query($sambung,"INSERT INTO `tbl_keluaran` (`id_keluaran`, `id_user`, `id_brg`, `jml_keluar`, `satuan`, `jml_harga`) VALUES ('$idKeluaran','$id_user','$idBarang[$i]', '$jumlahBarang[$i]', '$temp[$i]', '$total[$i]')");
	$update[$i] = mysqli_query($sambung,"UPDATE `tbl_barang` SET `stok`='$newStok[$i]' WHERE id_brg='$idBarang[$i]'");

		$idx[$i] = array_search($idBarang[$i],$itemlist,true);
		array_splice($itemlist, $idx[$i], 1);

	if (!$input[$i] || !$update[$i]) {
     die('Invalid query update stok/insert keluaran: ' . mysqli_error($sambung));
    }
}//end for

		for ($j=0; $j < count($itemlist); $j++) { 
			if ($i==count($itemlist)-1){  //inx terakhir
				$final = $final . $itemlist[$j];
			}else{
				$final = $final . $itemlist[$j].",,";
			}
		}

		$update2[$i] = mysqli_query($sambung,"UPDATE `tbl_user` SET `keranjang`='$final' WHERE id_user='$id_user'");
		if (!$update2) {
	     die('Invalid query update user: ' . mysqli_error($sambung));
	    }else{
    	?>
    		<script language="JavaScript">
			alert('Pemesanan telah berhasil');
			document.location='../../index.php';
			</script>
    	<?php
    }



}
function hitungStok($pilihan , $idBarang, $jumlahBarang){
//	global $queryBarang;
	while ($hasilBarang = mysqli_fetch_array(mysqli_query($sambung ,"SELECT * FROM tbl_barang"))) {
		$dataBarang['id'][] = $hasilBarang['id_brg'];
		$dataBarang['satuan'][] = $hasilBarang['satuan'];
		$dataBarang['stok'][] = $hasilBarang['stok'];
	}
	echo "hasilBarang ".var_dump($hasilBarang)."<br>";
	echo "queryBarang ".var_dump($queryBarang)."<br>";
	$idxBarang = array_search($idBarang, $dataBarang['id'],true);	
	$temp = $dataBarang['satuan'][$idxBarang];
	$stok = $dataBarang['stok'][$idxBarang];
	$newStok = $stok - $jumlahBarang;
	if ($pilihan=="stok") {
		return $newStok;
		echo "dataBarang ".var_dump($dataBarang)."<br>";
		echo "idxBarang ".var_dump($idxBarang)."<br>";
		echo "stok ".var_dump($stok)."<br>";
		echo "newStok ".var_dump($newStok)."<br>";
	}elseif ($pilihan="satuan") {
		return $temp;
		echo "satuan".var_dump($newStok)."<br>";
	}else{
		echo "Funct HitungStok error!";
	}
}

mysqli_close($sambung);

?> 

