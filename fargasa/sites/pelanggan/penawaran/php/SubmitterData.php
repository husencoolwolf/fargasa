<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();

$filename = "default.png";
if (isset($_FILES['gambar']['name'])) {
    $filename = $_FILES['gambar']['name'];
    $location = $_SERVER['DOCUMENT_ROOT'] . "/fargasa/assets/gambar/penawaran/" . $filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], $location);
}


$id = createId(8);
//$idstok = createId(8);

//cek id
$id = checkId($con, $id);
//      $idstok = checkId($con,$idstok);
//
$id_pelanggan = $_SESSION["id_user"];
$tipe = $_POST['tipe'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$jarak_tempuh = $_POST['jarak_tempuh'];
$jenis_bbm = $_POST['jenis_bbm'];
$harga = $_POST['harga'];
$harga = $conn->rupiahToInt($harga);

$query="INSERT INTO `penawaran` (`id_penawaran`, `id_pelanggan`, `tipe`, `warna`, `tahun`, `jarak_tempuh`, `jenis_bbm`, `harga`, `gambar`, `author`) 
    VALUES ('" . $id . "', "
    . "'" . $id_pelanggan . "', "
    . "'" . $tipe . "', "
    . "'" . $warna . "', "
    . "'" . $tahun . "', "
    . "'" . $jarak_tempuh . "', "
    . "'" . $jenis_bbm . "', "
    . "'" . $harga . "', "
    . "'" . $filename . "',"
    . "'" . $_SESSION['nama'] . "');";
$input    = mysqli_query($con, $query);


if ($input) {
    //Jika Sukses
    //update stok
    echo   '<div class="toast-body alert alert-success text-center" id="isiStat" value="success">
                  Penawaran Telah dibuat<br>Sales Kami akan menghubungi anda
                </div>';
} else {
    echo   '<div class="toast-body alert alert-danger text-center" id="isiStat" value="error">
                  Upps, Ada kesalahan dalam program saat input data!!!<br>Silahkan Hubungi Administrator!!!<br>' . mysqli_error($con) . '
                </div>';
}
function checkId($con, $id2)
{
    $cekuser = mysqli_query($con, "SELECT id FROM penawaran WHERE id_penawaran = '$id2'");
    if (!$cekuser) {
        return $id2;
    } else {
        $id2 = createId();
        checkId($con, $id2);
    }
}
