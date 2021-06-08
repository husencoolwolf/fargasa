<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();


$tipe = $_GET['tipe'];
$rowName;
$query;
//versi lama
if (isset($tipe)) {
    if ($tipe == 'Init') {
        $query = "SELECT u.nama, t.id_penawaran, t.tipe, t.warna, t.tahun, t.harga, t.status from penawaran t INNER JOIN user u ON t.id_pelanggan=u.id_user ORDER BY waktu DESC";
    } else if ($tipe == 'search') {
        $keyword = $_GET['query'];
        $query = "SELECT DISTINCT u.nama, t.id_penawaran, t.tipe, t.warna, t.tahun, t.harga, t.status from penawaran t INNER JOIN user u ON t.id_pelanggan=u.id_user where t.tipe LIKE '%" . trim($keyword) . "%' OR "
            . "t.warna LIKE '%" . trim($keyword) . "%' OR "
            . "u.nama LIKE '%" . trim($keyword) . "%' OR "
            . "t.tahun LIKE '%" . trim($keyword) . "%' ORDER BY t.waktu DESC";
    } else if ($tipe == 'searchFilter') {
        $keyword = $_GET['query'];
        $filterBulan = json_decode($_GET['bulan']);
        $filterTahun = $_GET['tahun'];
        $queryBulan = "";
        $queryTahun = "";
        for ($i = 0; $i < count($filterBulan); $i++) {
            if ($i == count($filterBulan) - 1) {
                $queryBulan = $queryBulan . "month(waktu)=" . $filterBulan[$i];
            } else {
                $queryBulan = $queryBulan . "month(waktu)=" . $filterBulan[$i] . " OR ";
            }
        }

        $queryTahun = $queryTahun . "year(waktu)=" . $filterTahun;

        if (count($filterBulan) <> 0 && $filterTahun == "SEMUA TAHUN") {
            $query = "SELECT DISTINCT u.nama, t.id_penawaran, t.tipe, t.warna, t.tahun, t.harga, t.status from penawaran t INNER JOIN user u ON t.id_pelanggan=u.id_user where (t.tipe LIKE '%" . trim($keyword) . "%' OR "
                . "t.warna LIKE '%" . trim($keyword) . "%' OR "
                . "u.nama LIKE '%" . trim($keyword) . "%') AND (" . $queryBulan . ") ORDER BY waktu DESC";
        } elseif (count($filterBulan) <> 0 && $filterTahun <> "SEMUA TAHUN") {
            $query = "SELECT DISTINCT u.nama, t.id_penawaran, t.tipe, t.warna, t.tahun, t.harga, t.status from penawaran t INNER JOIN user u ON t.id_pelanggan=u.id_user where (t.tipe LIKE '%" . trim($keyword) . "%' OR "
                . "t.warna LIKE '%" . trim($keyword) . "%' OR "
                . "u.nama LIKE '%" . trim($keyword) . "%') AND (" . $queryBulan . ") AND (" . $queryTahun . ") ORDER BY waktu DESC";
        } elseif ($filterTahun <> "SEMUA TAHUN") {
            $query = "SELECT DISTINCT u.nama, t.id_penawaran, t.tipe, t.warna, t.tahun, t.harga, t.status from penawaran t INNER JOIN user u ON t.id_pelanggan=u.id_user where (t.tipe LIKE '%" . trim($keyword) . "%' OR "
                . "t.warna LIKE '%" . trim($keyword) . "%' OR "
                . "u.nama LIKE '%" . trim($keyword) . "%') AND (" . $queryTahun . ") ORDER BY waktu DESC";
        } else {
            $query = "SELECT DISTINCT u.nama, t.id_penawaran, t.tipe, t.warna, t.tahun, t.harga, t.status from penawaran t INNER JOIN user u ON t.id_pelanggan=u.id_user where t.tipe LIKE '%" . trim($keyword) . "%' OR "
                . "t.warna LIKE '%" . trim($keyword) . "%' OR "
                . "u.nama LIKE '%" . trim($keyword) . "%' OR "
                . "t.tahun LIKE '%" . trim($keyword) . "%' ORDER BY waktu DESC";
        }

        // SELECT DISTINCT * from pembelian where t.tipe LIKE '%calya%' AND (month(waktu)=1 OR month(waktu)=2 OR month(waktu)=9)
    }



    $data = mysqli_query($con, $query);
    // $result = 
    $output = '';
    if (mysqli_num_rows($data) <> 0) {
        while ($row = mysqli_fetch_array($data)) {
            $statusBadge;
            if ($row['status'] == "menunggu") {
                $statusBadge = '<td><span class="badge badge-warning">' . $row['status'] . '</span></td>';
            } elseif ($row['status'] == "selesai") {
                $statusBadge = '<td><span class="badge badge-primary">' . $row['status'] . '</span></td>';
            } elseif ($row['status'] == "dibatalkan") {
                $statusBadge = '<td><span class="badge badge-danger">' . $row['status'] . '</span></td>';
            } else {
                $statusBadge = '<td><span class="badge badge-success">' . $row['status'] . '</span></td>';
            }


            $output .= '
                      <tr>
                        <input type="hidden" value="' . $row['id_penawaran'] . '"/>
                        <td>' . $row['nama'] . '</td>
                        <td>' . $row['tipe'] . '</td>
                        <td>' . $row['warna'] . '</td>
                        <td>' . $row['tahun'] . '</td>
                        <td>' . $conn->intToRupiah((int)$row['harga']) . '</td>
                        '.$statusBadge.'
                        <td><div id="action-button" class="d-inline" style="width:100%;">
                            <a class="btn-action btn btn-dark text-white btn-sm detail" data-href="' . $row['id_penawaran'] . '" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn-action btn btn-danger text-white btn-sm delete" data-href="' . $row['id_penawaran'] . '" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        </div>
                        </td>
                      </tr>
                    ';
        }
        //        <div class="list-group-item list-group-item-action">
        echo $output;
    } else {
        echo '<td colspan="12" class="text-center bg-light"><h2>Tidak Ada data ditemukan dengan kata kunci tersebut</h2></td>';
    }
}
