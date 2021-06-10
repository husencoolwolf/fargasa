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
        $query = "SELECT penjualan.id_penjualan, penjualan.id_pembelian, penjualan.tgl_jual, penjualan.hrg_jual, pembelian.tipe, pembelian.tahun, pembelian.warna, pembelian.tgl_beli, pembelian.nopol, pembelian.hrg_beli, pembelian.id_pembelian from penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian ORDER BY penjualan.tgl_jual DESC";
    } else if ($tipe == 'search') {
        $keyword = $_GET['query'];
        $query = "SELECT DISTINCT penjualan.id_penjualan, penjualan.id_pembelian, penjualan.tgl_jual, penjualan.hrg_jual, pembelian.tipe, pembelian.tahun, pembelian.warna, pembelian.tgl_beli, pembelian.nopol, pembelian.hrg_beli, pembelian.id_pembelian from penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where pembelian.tipe LIKE '%" . trim($keyword) . "%' OR "
            . "pembelian.warna LIKE '%" . trim($keyword) . "%' OR "
            . "pembelian.nopol LIKE '%" . trim($keyword) . "%' OR "
            . "pembelian.tahun LIKE '%" . trim($keyword) . "%' ORDER BY penjualan.tgl_jual DESC";
    } else if ($tipe == 'searchFilter') {
        $keyword = $_GET['query'];
        $filterBulan = json_decode($_GET['bulan']);
        $filterTahun = $_GET['tahun'];
        $queryBulan = "";
        $queryTahun = "";
        for ($i = 0; $i < count($filterBulan); $i++) {
            if ($i == count($filterBulan) - 1) {
                $queryBulan = $queryBulan . "month(tgl_jual)=" . $filterBulan[$i];
            } else {
                $queryBulan = $queryBulan . "month(tgl_jual)=" . $filterBulan[$i] . " OR ";
            }
        }

        $queryTahun = $queryTahun . "year(tgl_jual)=" . $filterTahun;

        if (count($filterBulan) <> 0 && $filterTahun == "SEMUA TAHUN") {
            $query = "SELECT DISTINCT penjualan.id_penjualan, penjualan.id_pembelian, penjualan.tgl_jual, penjualan.hrg_jual, pembelian.tipe, pembelian.tahun, pembelian.warna, pembelian.tgl_beli, pembelian.nopol, pembelian.hrg_beli, pembelian.id_pembelian from penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where (pembelian.tipe LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.warna LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.nopol LIKE '%" . trim($keyword) . "%') AND (" . $queryBulan . ") ORDER BY penjualan.tgl_jual DESC";
        } elseif (count($filterBulan) <> 0 && $filterTahun <> "SEMUA TAHUN") {
            $query = "SELECT DISTINCT penjualan.id_penjualan, penjualan.id_pembelian, penjualan.tgl_jual, penjualan.hrg_jual, pembelian.tipe, pembelian.tahun, pembelian.warna, pembelian.tgl_beli, pembelian.nopol, pembelian.hrg_beli, pembelian.id_pembelian from penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where (pembelian.tipe LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.warna LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.nopol LIKE '%" . trim($keyword) . "%') AND (" . $queryBulan . ") AND (" . $queryTahun . ") ORDER BY penjualan.tgl_jual DESC";
        } elseif ($filterTahun <> "SEMUA TAHUN") {
            $query = "SELECT DISTINCT penjualan.id_penjualan, penjualan.id_pembelian, penjualan.tgl_jual, penjualan.hrg_jual, pembelian.tipe, pembelian.tahun, pembelian.warna, pembelian.tgl_beli, pembelian.nopol, pembelian.hrg_beli, pembelian.id_pembelian from penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where (pembelian.tipe LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.warna LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.nopol LIKE '%" . trim($keyword) . "%') AND (" . $queryTahun . ") ORDER BY penjualan.tgl_jual DESC";
        } else {
            $query = "SELECT DISTINCT penjualan.id_penjualan, penjualan.id_pembelian, penjualan.tgl_jual, penjualan.hrg_jual, pembelian.tipe, pembelian.tahun, pembelian.warna, pembelian.tgl_beli, pembelian.nopol, pembelian.hrg_beli, pembelian.id_pembelian from penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where pembelian.tipe LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.warna LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.nopol LIKE '%" . trim($keyword) . "%' OR "
                . "pembelian.tahun LIKE '%" . trim($keyword) . "%' ORDER BY penjualan.tgl_jual DESC";
        }

        // SELECT DISTINCT * from penjualan where tipe LIKE '%calya%' AND (month(tgl_jual)=1 OR month(tgl_jual)=2 OR month(tgl_jual)=9)
    }



    $data = mysqli_query($con, $query);
    //    var_dump($query);
    // $result = 
    $output = '';
    if (mysqli_num_rows($data) <> 0) {
        while ($row = mysqli_fetch_array($data)) {
            //            $statusBadge;
            //            if ($row['status'] == "Belum Terjual") {
            //                $statusBadge = '<td><span class="badge badge-warning">' . $row['status'] . '</span></td>';
            //            } elseif ($row['status'] == "siap") {
            //                $statusBadge = '<td><span class="badge badge-primary">' . $row['status'] . '</span></td>';
            //            } elseif ($row['status'] == "terjual") {
            //                $statusBadge = '<td><span class="badge badge-danger">' . $row['status'] . '</span></td>';
            //            } else {
            //                $statusBadge = '<td><span class="badge badge-success">' . $row['status'] . '</span></td>';
            //            }


            $output .= '
                      <tr>
                        <input type="hidden" value="' . $row['id_penjualan'] . '"/>
                        <td>' . $row['tipe'] . '</td>
                        <td>' . $row['nopol'] . '</td>
                        <td>' . $row['tgl_jual'] . '</td>
                        <td>'  . $row['hrg_jual'] . '</td>
                        <td><div id="action-button" class="d-inline" style="width:100%;">
                            <a class="btn-action btn btn-dark text-white btn-sm detail" data-href="' . $row['id_penjualan'] . '" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                           
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
