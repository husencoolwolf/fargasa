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
    $stokBarang = $_POST['stokBarang'];
    $tipeError = 0;
//    variable control keranjang
    $final="";
    $queryKeranjang	= mysqli_query($sambung,"SELECT keranjang FROM tbl_user WHERE id_user='$id_user'");
    $hasilKeranjang = mysqli_fetch_assoc($queryKeranjang);
    $itemlist = explode(",,", $hasilKeranjang['keranjang']);

    //buat id tag keluaran, berfungsi pengakses data per transaksi.
	$tagKeluaran = createId();
	//cek id keluaran
	$cekTag = cekId($sambung ,'tbl_keluaran', 'tag_keluaran', $tagKeluaran);
	if ($cekTag<>true) {
        $tagKeluaran = $cekTag;
	}
	//input sebanyak banyak barang
	for ($i=0; $i < count($idBarang) ; $i++) {
        $idKeluaran[$i] =  createId();
        $cek = cekId($sambung ,'tbl_keluaran', 'id_keluaran', $idKeluaran[$i]);
        if ($cek<>true) {
            $idKeluaran[$i] = $cek;
        }

        $total[$i] = $harga[$i] * $jumlahBarang[$i];
        $newStok = $stokBarang[$i] - $jumlahBarang[$i];

        $hasilBarang = mysqli_fetch_array(mysqli_query($sambung ,"SELECT * FROM tbl_barang WHERE id_brg='$idBarang[$i]'"));

        //input data ke table
        $temp = $hasilBarang['satuan'];
        $input[$i]	= mysqli_query($sambung,"INSERT INTO `tbl_keluaran` (`id_keluaran`, `tag_keluaran` ,`id_user`, `id_brg`, `jml_keluar`, `satuan`, `jml_harga`) VALUES ('$idKeluaran[$i]', '$tagKeluaran','$id_user','$idBarang[$i]', '$jumlahBarang[$i]', '$temp', '$total[$i]')");
            if (!$input[$i]) {
                $tipeError = 1;
            }
        $updateStok[$i] = mysqli_query($sambung, "UPDATE `tbl_barang` SET `stok`='$newStok' WHERE id_brg='$idBarang[$i]'");
            if (!$updateStok[$i]) {
                $tipeError = 2;
            }
	}
	//proses delete item checkout dari keranjang
    for ($j=0; $j < count($idBarang) ; $j++){
        $idx = array_search($idBarang[$j],$itemlist,true);
        array_splice($itemlist, $idx, 1);
    }
    for ($k=0; $k < count($itemlist); $k++) {
        if ($k==count($itemlist)-1){  //inx terakhir
            $final = $final . $itemlist[$k];
        }else{
            $final = $final . $itemlist[$k].",,";
        }
    }
        $updateKeranjang = mysqli_query($sambung, "UPDATE `tbl_user` SET `keranjang`='$final' WHERE id_user='$id_user'");
    //error controller
	if ($tipeError==1 || $tipeError==2 || $tipeError==3){
	    if ($tipeError==1){
            echo die('Invalid query INSERT[] : ' . mysqli_error($sambung))."<br><a href='../../index.php'>Kembali</a>";
        }else if ($tipeError==2){
            echo die('Invalid query Update Stok[] : ' . mysqli_error($sambung))."<br><a href='../../index.php'>Kembali</a>";
        }else{
            echo die('Invalid query Update Keranjang[] : ' . mysqli_error($sambung))."<br><a href='../../index.php'>Kembali</a>";
        }
    }else{
	    //case berhasil
        ?>
        <script language="JavaScript">
            alert('Pesanan Berhasil diinput!');
            document.location.href='../../index.php';
        </script>
        <?php
    }

}else{ //kalau user asal masuk
    header("location:../../index.php");
}
mysqli_close($sambung);
?>