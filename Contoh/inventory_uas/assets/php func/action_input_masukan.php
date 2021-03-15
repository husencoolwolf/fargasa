<?php
session_start();
include dirname(__DIR__,2).'/koneksi.php';
if (isset($_POST['submit'])){
    require_once 'create-user-id.php';
    require_once 'cek-id.php';
    $ID = createId();
    $idBarang = $_POST['barang'];
    $idSupplier = $_POST['supplier'];
    $jml_masuk = $_POST['jml_masuk'];
    $satuan = $_POST['satuan'];
    $check = cekId($sambung, 'tbl_masukan', 'id_masukan', $ID); // cek apakah id yg di generate sama dengan id yg sudah ada?
    if ($check<>true){
        $ID = $check;
    }
    $queryBarang = mysqli_query($sambung,"SELECT * FROM tbl_barang WHERE id_brg='$idBarang';");
    $hasilBarang = mysqli_fetch_array($queryBarang);
    $newStok = $hasilBarang['stok'] + $jml_masuk;
    $inputMasukan	= mysqli_query($sambung,"INSERT INTO `tbl_masukan` (
        `id_masukan`,
        `id_brg`,
        `id_supplier`,
        `jml_masuk`,
        `satuan`) VALUES (
        '$ID',
        '$idBarang',
        '$idSupplier',
        '$jml_masuk',
        '$satuan')");
    if ($inputMasukan) {
        //Jika Sukses
        //update stok
        $updateStok = mysqli_query($sambung, "UPDATE tbl_barang SET `stok`='$newStok' where id_brg='$idBarang'");
        if (!$updateStok) {
            die('Invalid query UPDATE Stok : ' . mysqli_error($sambung));
        }
        ?>
        <script language="JavaScript">
            alert('Data Supplier Berhasil diinput!');
            document.location.href='../../index.php';
        </script>
        <?php
    }else { ?>
        <!-- //Jika Gagal -->
        <script language="JavaScript">
            alert('Data Supplier Gagal Input! Silakan Ulangi');
            document.location='../../index.php';
        </script>
        <?php
        die(mysqli_error($sambung));
    }
}else{
    header("location:../../index.php");
}
?>