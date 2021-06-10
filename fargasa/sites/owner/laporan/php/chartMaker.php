<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
$tahun = $_GET['tahun'];
$tipe = $_GET['tipe'];

$outChart = '';
if ($tipe == "chartJmlJual") { //Request chart Jumlah Penjualan
        $jml_transaksi = array();
        $dataJual = mysqli_query($con, "SELECT (SELECT COUNT(id_penjualan) FROM Penjualan WHERE month(tgl_jual)='1' AND year(tgl_jual)='$tahun') as januari, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='2' AND year(tgl_jual)='$tahun') as februari, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='3' AND year(tgl_jual)='$tahun') as maret, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='4' AND year(tgl_jual)='$tahun') as april, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='5' AND year(tgl_jual)='$tahun') as mei, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='6' AND year(tgl_jual)='$tahun') as juni, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='7' AND year(tgl_jual)='$tahun') as juli, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='8' AND year(tgl_jual)='$tahun') as agustus, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='9' AND year(tgl_jual)='$tahun') as september, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='10' AND year(tgl_jual)='$tahun') as oktober, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='11' AND year(tgl_jual)='$tahun') as november, "
                . "(SELECT COUNT(id_penjualan) FROM penjualan WHERE month(tgl_jual)='12' AND year(tgl_jual)='$tahun') as desember ");
        
        $dataBeli = mysqli_query($con, "SELECT (SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='1' AND year(tgl_beli)='$tahun') as januari, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='2' AND year(tgl_beli)='$tahun') as februari, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='3' AND year(tgl_beli)='$tahun') as maret, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='4' AND year(tgl_beli)='$tahun') as april, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='5' AND year(tgl_beli)='$tahun') as mei, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='6' AND year(tgl_beli)='$tahun') as juni, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='7' AND year(tgl_beli)='$tahun') as juli, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='8' AND year(tgl_beli)='$tahun') as agustus, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='9' AND year(tgl_beli)='$tahun') as september, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='10' AND year(tgl_beli)='$tahun') as oktober, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='11' AND year(tgl_beli)='$tahun') as november, "
                    . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='12' AND year(tgl_beli)='$tahun') as desember ");
        if (!$dataJual) { //menambahkan data penjualan
                die("Data User Kosong" . mysqli_error($con->connect()));
        } else {

                if (mysqli_num_rows($dataJual) == 0) {
                        return 'Kami tidak mengenali username ini!';
                } else {
                        while ($row = mysqli_fetch_array($dataJual)) {
                            array_push($jml_transaksi, (int)$row['januari']);
                            array_push($jml_transaksi, (int)$row['februari']);
                            array_push($jml_transaksi, (int)$row['maret']);
                            array_push($jml_transaksi, (int)$row['april']);
                            array_push($jml_transaksi, (int)$row['mei']);
                            array_push($jml_transaksi, (int)$row['juni']);
                            array_push($jml_transaksi, (int)$row['juli']);
                            array_push($jml_transaksi, (int)$row['agustus']);
                            array_push($jml_transaksi, (int)$row['september']);
                            array_push($jml_transaksi, (int)$row['oktober']);
                            array_push($jml_transaksi, (int)$row['november']);
                            array_push($jml_transaksi, (int)$row['desember']);
                            
                                $outChart .= $row['januari'] . ','
                                        . $row['februari'] . ','
                                        . $row['maret'] . ','
                                        . $row['april'] . ','
                                        . $row['mei'] . ','
                                        . $row['juni'] . ','
                                        . $row['juli'] . ','
                                        . $row['agustus'] . ','
                                        . $row['september'] . ','
                                        . $row['oktober'] . ','
                                        . $row['november'] . ','
                                        . $row['desember'] . '';
                        }
                }
        }
        //penghubung antara chart jual sama beli
        $outChart.="|";
        
        if (!$dataBeli) { //menambahkan data penjualan
                die("Data User Kosong" . mysqli_error($con->connect()));
        } else {

                if (mysqli_num_rows($dataBeli) == 0) {
                        return 'Kami tidak mengenali username ini!';
                } else {
                        while ($row = mysqli_fetch_array($dataBeli)) {
                                array_push($jml_transaksi, (int)$row['januari']);
                            array_push($jml_transaksi, (int)$row['februari']);
                            array_push($jml_transaksi, (int)$row['maret']);
                            array_push($jml_transaksi, (int)$row['april']);
                            array_push($jml_transaksi, (int)$row['mei']);
                            array_push($jml_transaksi, (int)$row['juni']);
                            array_push($jml_transaksi, (int)$row['juli']);
                            array_push($jml_transaksi, (int)$row['agustus']);
                            array_push($jml_transaksi, (int)$row['september']);
                            array_push($jml_transaksi, (int)$row['oktober']);
                            array_push($jml_transaksi, (int)$row['november']);
                            array_push($jml_transaksi, (int)$row['desember']);
                             
                                $outChart .= $row['januari'] . ','
                                        . $row['februari'] . ','
                                        . $row['maret'] . ','
                                        . $row['april'] . ','
                                        . $row['mei'] . ','
                                        . $row['juni'] . ','
                                        . $row['juli'] . ','
                                        . $row['agustus'] . ','
                                        . $row['september'] . ','
                                        . $row['oktober'] . ','
                                        . $row['november'] . ','
                                        . $row['desember'] . '';
                        }
                        
                        // echo $outChart;
                }
        }
        echo json_encode(array($outChart, max($jml_transaksi)));
        // end of request chart Jumlah Penjualan
} elseif ($tipe == "chartJmlHarga") {
        //request chart Jumlah Harga
        $total = array();
        $querr = "SELECT(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='1' AND year(tgl_jual)='$tahun') as januari,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='2' AND year(tgl_jual)='$tahun') as februari,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='3' AND year(tgl_jual)='$tahun') as maret,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='4' AND year(tgl_jual)='$tahun') as april,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='5' AND year(tgl_jual)='$tahun') as mei,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='6' AND year(tgl_jual)='$tahun') as juni,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='7' AND year(tgl_jual)='$tahun') as juli,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='8' AND year(tgl_jual)='$tahun') as agustus,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='9' AND year(tgl_jual)='$tahun') as september,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='10' AND year(tgl_jual)='$tahun') as oktober,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='11' AND year(tgl_jual)='$tahun') as november,"
                . "(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(tgl_jual)='12' AND year(tgl_jual)='$tahun') as desember";
        $data = mysqli_query($con, $querr);
        if (!$data) {
                echo $querr;
                //                die("Data User Kosong euy" . mysqli_error($con->connect()));
        } else {

                if (mysqli_num_rows($data) == 0) {
                        return 'Kami tidak mengenali username ini!';
                } else {
                        while ($row = mysqli_fetch_array($data)) {
                                $total = array(
                                        (int)$row['januari'], (int)$row['februari'],
                                        (int)$row['maret'], (int)$row['april'], (int)$row['mei'],
                                        (int)$row['juni'], (int)$row['juli'], (int)$row['agustus'],
                                        (int)$row['september'], (int)$row['oktober'], (int)$row['november'],
                                        (int)$row['desember']
                                );
                                $outChart .= $conn->NullCounter($row['januari']) . ','
                                        . $conn->NullCounter($row['februari']) . ','
                                        . $conn->NullCounter($row['maret']) . ','
                                        . $conn->NullCounter($row['april']) . ','
                                        . $conn->NullCounter($row['mei']) . ','
                                        . $conn->NullCounter($row['juni']) . ','
                                        . $conn->NullCounter($row['juli']) . ','
                                        . $conn->NullCounter($row['agustus']) . ','
                                        . $conn->NullCounter($row['september']) . ','
                                        . $conn->NullCounter($row['oktober']) . ','
                                        . $conn->NullCounter($row['november']) . ','
                                        . $conn->NullCounter($row['desember']) . '';
                        }
                        echo json_encode(array($outChart, max($total)));
                }
        }
} elseif ($tipe == "chartJmlHargaBeli") {
        //request chart Jumlah Harga
        $total = array();
        $querr = "SELECT(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='1' AND year(tgl_beli)='$tahun') as januari,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='2' AND year(tgl_beli)='$tahun') as februari,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='3' AND year(tgl_beli)='$tahun') as maret,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='4' AND year(tgl_beli)='$tahun') as april,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='5' AND year(tgl_beli)='$tahun') as mei,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='6' AND year(tgl_beli)='$tahun') as juni,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='7' AND year(tgl_beli)='$tahun') as juli,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='8' AND year(tgl_beli)='$tahun') as agustus,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='9' AND year(tgl_beli)='$tahun') as september,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='10' AND year(tgl_beli)='$tahun') as oktober,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='11' AND year(tgl_beli)='$tahun') as november,"
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='12' AND year(tgl_beli)='$tahun') as desember";
        $data = mysqli_query($con, $querr);
        if (!$data) {
                echo $querr;
                //                die("Data User Kosong euy" . mysqli_error($con->connect()));
        } else {

                if (mysqli_num_rows($data) == 0) {
                        return 'Kami tidak mengenali username ini!';
                } else {
                        while ($row = mysqli_fetch_array($data)) {
                                $total = array(
                                        (int)$row['januari'], (int)$row['februari'],
                                        (int)$row['maret'], (int)$row['april'], (int)$row['mei'],
                                        (int)$row['juni'], (int)$row['juli'], (int)$row['agustus'],
                                        (int)$row['september'], (int)$row['oktober'], (int)$row['november'],
                                        (int)$row['desember']
                                );
                                $outChart .= $conn->NullCounter($row['januari']) . ','
                                        . $conn->NullCounter($row['februari']) . ','
                                        . $conn->NullCounter($row['maret']) . ','
                                        . $conn->NullCounter($row['april']) . ','
                                        . $conn->NullCounter($row['mei']) . ','
                                        . $conn->NullCounter($row['juni']) . ','
                                        . $conn->NullCounter($row['juli']) . ','
                                        . $conn->NullCounter($row['agustus']) . ','
                                        . $conn->NullCounter($row['september']) . ','
                                        . $conn->NullCounter($row['oktober']) . ','
                                        . $conn->NullCounter($row['november']) . ','
                                        . $conn->NullCounter($row['desember']) . '';
                        }
                        echo json_encode(array($outChart, max($total)));
                }
        }
}
