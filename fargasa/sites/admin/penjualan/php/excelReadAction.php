<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/fargasa/dist/php/excel_reader2.php';
$target = $_SERVER['DOCUMENT_ROOT']."/fargasa/assets/excel cache/".basename($_FILES['fileExcel']['name']);
move_uploaded_file($_FILES['fileExcel']['tmp_name'], $target);

//permission
$data = new Spreadsheet_Excel_Reader($target, false);

$baris = $data->rowcount($sheet_index = 0);
$entry_success = 0;
$entry_fail = 0;
for ($i = 2; $i <= $baris; $i++) {
    $nama = $_SESSION['nama'];
    $id = createId(8);

    //cek id
    $id = checkId($con, $id);

    $nopol = $data->val($i, 2);
    $tgl_beli = $data->val($i, 3);
    $sales = $data->val($i, 4);
    $feeMediator = $data->val($i, 5);
    $feeSales = $data->val($i, 6);
    $tgl_jual = $data->val($i, 7);
    $hrg_jual = $data->val($i, 8);
    $leas = $data->val($i, 9);
    $refund = $data->val($i, 10);
    $tenor = $data->val($i, 11);

    $id_pembelian2 = mysqli_query($con, "SELECT id_pembelian from pembelian where nopol='$nopol' AND tgl_beli=STR_TO_DATE('$tgl_beli', '%m/%d/%Y');");
    $id_pembelian = mysqli_fetch_array($id_pembelian2);

    if ($nopol != "" && $tgl_beli != "") {
        $query = "INSERT INTO `penjualan` (`id_penjualan`, `id_pembelian`, `mediator`, `sales`, `tgl_jual`, `hrg_jual`, `fee_mediator`, `fee_sales`, `leas`, `tenor`, `refund` , `author`, `id_pelanggan`) "
            . "VALUES ($id, "
            . "'".$id_pembelian[0]."', "
            . "'', "
            . "'$sales', "
            . "STR_TO_DATE('$tgl_jual', '%m/%d/%Y'), "
            . "'$hrg_jual', "
            . "'$feeMediator', "
            . "'$feeSales', "
            . "'$leas', "
            . "'$tenor', "
            . "'$refund', "
            . "'$nama', "
            . "NULL);";
        $input = mysqli_query($con, $query);
        if ($input) {
            $entry_success++;
        } else {
            $entry_fail++;
        }
    }
}

unlink($target);
if ($entry_success == $baris - 1 && $entry_fail == 0) {
    echo '<div class="alert alert-success text-center">
                  ' . $entry_success . ' Entry telah berhasil dimasukkan.<br>
                  ' . $entry_fail . ' Entry Gagal Dimasukkan
                </div>';
} else {
    echo '<div class="alert alert-danger text-center">
                  ' . $entry_success . ' Entry telah berhasil dimasukkan.<br>
                  ' . $entry_fail . ' Entry Gagal Dimasukkan
                </div>';
}
?>

<?php
function checkId($con,$id2){
    $cekuser = mysqli_query($con ,"SELECT id_penjualan FROM penjualan WHERE id_penjualan = '$id2'");
        if(mysqli_num_rows($cekuser)==0){
            return $id2;
        }else{
            $id2 = createId($con,$id2);
            checkId($con,$id2);
           }
}
?>

