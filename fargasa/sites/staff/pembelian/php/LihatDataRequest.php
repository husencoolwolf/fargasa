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
        $query = "SELECT * from pembelian ORDER BY tgl_beli DESC ";
    } else if ($tipe == 'search') {
        $keyword = $_GET['query'];
        $query = "SELECT DISTINCT * from pembelian where tipe LIKE '%".trim($keyword)."%' OR "
                . "warna LIKE '%".trim($keyword)."%' OR "
                . "nopol LIKE '%".trim($keyword)."%' OR "
                . "tahun LIKE '%".trim($keyword)."%' OR "
                . "mediator LIKE '%".trim($keyword)."%' ORDER BY tgl_beli DESC";
    }else if($tipe == 'searchFilter'){
        $keyword = $_GET['query'];
        $filterBulan = json_decode($_GET['bulan']);
        $filterTahun = $_GET['tahun'];
        $queryBulan = "";
        $queryTahun = "";
        for ($i = 0; $i < count($filterBulan); $i++) {
            if ($i == count($filterBulan) - 1) {
                $queryBulan = $queryBulan . "month(tgl_beli)=" . $filterBulan[$i];
            } else {
                $queryBulan = $queryBulan . "month(tgl_beli)=" . $filterBulan[$i] . " OR ";
            }
        }

        $queryTahun = $queryTahun . "year(tgl_beli)=" . $filterTahun;

        if (count($filterBulan) <> 0 && $filterTahun == "SEMUA TAHUN") {
            $query = "SELECT DISTINCT * from pembelian where (tipe LIKE '%" . trim($keyword) . "%' OR "
                . "warna LIKE '%" . trim($keyword) . "%' OR "
                . "nopol LIKE '%" . trim($keyword) . "%' OR "
                . "mediator LIKE '%" . trim($keyword) . "%') AND (" . $queryBulan . ") ORDER BY tgl_beli DESC";
        } elseif (count($filterBulan) <> 0 && $filterTahun <> "SEMUA TAHUN") {
            $query = "SELECT DISTINCT * from pembelian where (tipe LIKE '%" . trim($keyword) . "%' OR "
                . "warna LIKE '%" . trim($keyword) . "%' OR "
                . "nopol LIKE '%" . trim($keyword) . "%' OR "
                . "mediator LIKE '%" . trim($keyword) . "%') AND (" . $queryBulan . ") AND (" . $queryTahun . ") ORDER BY tgl_beli DESC";
        } elseif ($filterTahun <> "SEMUA TAHUN") {
            $query = "SELECT DISTINCT * from pembelian where (tipe LIKE '%" . trim($keyword) . "%' OR "
                . "warna LIKE '%" . trim($keyword) . "%' OR "
                . "nopol LIKE '%" . trim($keyword) . "%' OR "
                . "mediator LIKE '%" . trim($keyword) . "%') AND (" . $queryTahun . ") ORDER BY tgl_beli DESC";
        } else {
            $query = "SELECT DISTINCT * from pembelian where tipe LIKE '%" . trim($keyword) . "%' OR "
                . "warna LIKE '%" . trim($keyword) . "%' OR "
                . "nopol LIKE '%" . trim($keyword) . "%' OR "
                . "tahun LIKE '%" . trim($keyword) . "%' OR "
                . "mediator LIKE '%" . trim($keyword) . "%' ORDER BY tgl_beli DESC";
        }

        // SELECT DISTINCT * from pembelian where tipe LIKE '%calya%' AND (month(tgl_beli)=1 OR month(tgl_beli)=2 OR month(tgl_beli)=9)
    }



    $data = mysqli_query($con, $query);
    // $result = 
    $output = '';
    if (mysqli_num_rows($data) <> 0) {
        while ($row = mysqli_fetch_array($data)) {
            $statusBadge;
            if ($row['status'] == "Belum Terjual") {
                $statusBadge = '<td><span class="badge badge-warning">' . $row['status'] . '</span></td>';
            } elseif ($row['status'] == "siap") {
                $statusBadge = '<td><span class="badge badge-primary">' . $row['status'] . '</span></td>';
            } else {
                $statusBadge = '<td><span class="badge badge-success">' . $row['status'] . '</span></td>';
            }


            $output .= '
                      <tr>
                        <input type="hidden" value="'.$row['id_pembelian'].'"/>
                        <td>'.$row['tipe'].'</td>
                        <td>'.$row['tahun'].'</td>
                        <td>'.$row['tgl_beli'].'</td>
                        <td>'.$row['warna'].'</td>
                        <td>'.$row['nopol'].'</td>
                        <td>'.$conn->intToRupiah((int)$row['hrg_beli']+(int)$row['fee_mediator']+(int)$row['pajak']+(int)$row['rekondisi']).'</td>
                        '.$statusBadge.'
                        <td><div id="action-button" class="d-inline" style="width:100%;">
                            <a class="btn-action btn btn-dark text-white btn-sm detail" data-href="' . $row['id_pembelian'] . '" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn-action btn btn-primary text-white btn-sm edit" data-href="' . $row['id_pembelian'] . '" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a class="btn-action btn btn-danger text-white btn-sm delete" data-href="' . $row['id_pembelian'] . '" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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
