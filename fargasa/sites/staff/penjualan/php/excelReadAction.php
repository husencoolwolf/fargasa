<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ref/koneksi.php';
include $_SERVER['DOCUMENT_ROOT'] . '/dist/php/idGenerator.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/dist/php/excel_reader2.php';
$target = basename($_FILES['fileExcel']['name']);
move_uploaded_file($_FILES['fileExcel']['tmp_name'], $target);

//permission
$data = new Spreadsheet_Excel_Reader($_FILES['fileExcel']['name'], false);

$baris = $data->rowcount($sheet_index = 0);
$entry_success = 0;
$entry_fail = 0;
for ($i = 2; $i <= $baris; $i++) {
    $nama = $_SESSION['nama'];
    $id = createId(8);

    //cek id
    $id = checkId($con, $id);

    $tipe = $data->val($i, 2);
    $warna = $data->val($i, 4);
    $tahun = $data->val($i, 5);
    $nopol = $data->val($i, 6);
    $mediator = $data->val($i, 8);
    $tgl_beli = $data->val($i, 9);
    $hrg_beli = $data->val($i, 10);
    $feeMediator = $data->val($i, 11);
    $pajak = $data->val($i, 12);
    $rekondisi = $data->val($i, 13);



    if ($nopol != "" && $tipe != "") {
        $query = "INSERT INTO `penjualan` (`id`, `nopol`, `tipe`, `warna`, `tahun`, `mediator`, `tgl_beli`, `hrg_beli`, `fee_mediator`, `pajak`, `rekondisi`, `status`, `author`) "
            . "VALUES ('$id', "
            . "'$nopol', "
            . "'$tipe', "
            . "'$warna', "
            . "'$tahun', "
            . "'$mediator', "
            . "STR_TO_DATE('$tgl_beli', '%m/%d/%Y'), "
            . "'$hrg_beli', "
            . "'$feeMediator', "
            . "'$pajak', "
            . "'$rekondisi', "
            . "'Belum Terjual', "
            . "'$nama');";
        $input = mysqli_query($con, $query);
        if ($input) {
            $entry_success++;
        } else {
            $entry_fail++;
        }
    }
}

unlink($_FILES['fileExcel']['name']);
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
function checkId($con, $id2)
{
    $cekuser = mysqli_query($con, "SELECT id FROM user WHERE username = '$id2'");
    if (!$cekuser) {
        return $id2;
    } else {
        $id2 = createId();
        checkId($con, $id2);
    }
}
?>

