<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();

$dataBook = mysqli_query($con, "SELECT stok.id_pembelian, stok.id_stok, stok.nopol, stok.tipe,stok.tahun, stok.hrg_jual, stok.gambar, book.id_booking,book.id_pembelian,book.id_pelanggan, book.booking_stop FROM stok LEFT JOIN book ON stok.id_pembelian=book.id_pembelian where (book.booking_stop >= now())"); //query book
$cek = array();//array holder book
$stok = array();//array holder stok
$b = array();
$i=0;
while($fetch = mysqli_fetch_array($dataBook)){

    $b["id_pembelian"] = $fetch[0];
    $cek[$i] = $b;
    $i++;
    unset($b);
}


$tipe = $_GET['tipe'];
$rowName;
$query;
//versi lama
if (isset($tipe)) {
    if ($tipe == 'Init') {
        $query = "SELECT * from stok ORDER BY id_stok DESC";
    } else if ($tipe == 'search') {
        $keyword = $_GET['query'];
        $query = "SELECT DISTINCT * from stok where tipe LIKE '%" . trim($keyword) . "%' OR "
            . "warna LIKE '%" . trim($keyword) . "%' OR "
            . "nopol LIKE '%" . trim($keyword) . "%' OR "
            . "tahun LIKE '%" . trim($keyword) . "%' ORDER BY id_stok DESC";
    } else if ($tipe == 'searchFilter') {
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
            $query = "SELECT DISTINCT * from stok where (tipe LIKE '%" . trim($keyword) . "%' OR "
                . "warna LIKE '%" . trim($keyword) . "%' OR "
                . "nopol LIKE '%" . trim($keyword) . "%') AND (" . $queryBulan . ") ORDER BY tgl_beli DESC";
        } elseif (count($filterBulan) <> 0 && $filterTahun <> "SEMUA TAHUN") {
            $query = "SELECT DISTINCT * from stok where (tipe LIKE '%" . trim($keyword) . "%' OR "
                . "warna LIKE '%" . trim($keyword) . "%' OR "
                . "nopol LIKE '%" . trim($keyword) . "%') AND (" . $queryBulan . ") AND (" . $queryTahun . ") ORDER BY tgl_beli DESC";
        } elseif ($filterTahun <> "SEMUA TAHUN") {
            $query = "SELECT DISTINCT * from stok where (tipe LIKE '%" . trim($keyword) . "%' OR "
                . "warna LIKE '%" . trim($keyword) . "%' OR "
                . "nopol LIKE '%" . trim($keyword) . "%') AND (" . $queryTahun . ") ORDER BY tgl_beli DESC";
        } else {
            $query = "SELECT DISTINCT * from stok where tipe LIKE '%" . trim($keyword) . "%' OR "
                . "warna LIKE '%" . trim($keyword) . "%' OR "
                . "nopol LIKE '%" . trim($keyword) . "%' OR "
                . "tahun LIKE '%" . trim($keyword) . "%' ORDER BY tgl_beli DESC";
        }

        // SELECT DISTINCT * from penjualan where tipe LIKE '%calya%' AND (month(tgl_beli)=1 OR month(tgl_beli)=2 OR month(tgl_beli)=9)
    }



    $data = mysqli_query($con, $query);//query stok
    $i=0; // set ulang index
    while($fetch = mysqli_fetch_array($data)){ //Fetch ke array
        $b["id_pembelian"] = $fetch["id_pembelian"];
        $b["tipe"] = $fetch["tipe"];
        $b["tahun"] = $fetch["tahun"];
        $b["warna"] = $fetch["warna"];
        $b["nopol"] = $fetch["nopol"];
        $b["hrg_jual"] = $fetch["hrg_jual"];
        $stok[$i] = $b;
        $i++;
        unset($b);
      
    }
    $i=0;//set ulang index
    foreach($stok as $x){
        if (in_array($x["id_pembelian"], array_column($cek, "id_pembelian")) == true){
            $stok[$i]["booked"]= array_count_values(array_column($cek, 'id_pembelian'))[$x["id_pembelian"]];
        }else{
            $stok[$i]["booked"] = 0;
        }
        $i++;
    }
    
    // $result = 
    $output = '';
    if (mysqli_num_rows($data) <> 0) {
        foreach ($stok as $row) {
            $statusBadge;
            if ($row['booked'] == 0) {
                $statusBadge = '<td><span class="badge badge-primary">Siap</span></td>';
            } elseif ($row['booked'] <3) {
                $statusBadge = '<td><span class="badge badge-dark">' . $row['booked'] . ' Terbooking</span></td>';
            } else {
                $statusBadge = '<td><span class="badge badge-secondary">Terbooking Full</span></td>';
            }


            $output .= '
                      <tr>
                        <input type="hidden" value="' . $row['id_pembelian'] . '"/>
                        <td>' . $row['tipe'] . '</td>
                        <td>' . $row['tahun'] . '</td>
                        <td>' . $row['warna'] . '</td>
                        <td>' . $row['nopol'] . '</td>
                        <td>' . $conn->intToRupiah((int)$row['hrg_jual']) . '</td>
                        ' . $statusBadge . '
                        <td><div id="action-button" class="d-inline" style="width:100%;">
                            <a class="btn-action btn btn-dark text-white btn-sm detail" data-href="' . $row['id_pembelian'] . '" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn-action btn btn-primary text-white btn-sm edit" data-href="' . $row['id_pembelian'] . '" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

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
