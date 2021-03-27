<?php
    include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';
    include $_SERVER['DOCUMENT_ROOT'].'/dist/php/idGenerator.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    $tahun = $_GET['tahun'];
    $tipe = $_GET['tipe'];
        
        $outChart='';
        if ($tipe=="chartJmlBeli") {//Request chart Jumlah Pembelian
            $jml_transaksi= array();
            $data = mysqli_query($con ,"SELECT (SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='1' AND year(tgl_beli)='$tahun') as januari, "
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
            if(!$data){
                   die ("Data User Kosong" . mysqli_error($con->connect()));
            }else{
                   
                    if(mysqli_num_rows($data) == 0) {
                            return 'Kami tidak mengenali username ini!';
                    } else {
                    while($row = mysqli_fetch_array($data)) {
                        $jml_transaksi= array((int)$row['januari'],(int)$row['februari'],
                                (int)$row['maret'],(int)$row['april'],(int)$row['mei'],
                                (int)$row['juni'],(int)$row['juli'],(int)$row['agustus'],
                                (int)$row['september'],(int)$row['oktober'],(int)$row['november'],
                                (int)$row['desember']);
                        // $outChart .='{"'. $row['januari'] .'"},'
                        //                 . '{"'. $row['februari'] .'"},'
                        //                 . '{"'. $row['maret'] .'"},'
                        //                 . '{"'. $row['april'] .'"},'
                        //                 . '{"'. $row['mei'] .'"},'
                        //                 . '{"'. $row['juni'] .'"},'
                        //                 . '{"'. $row['juli'] .'"},'
                        //                 . '{"'. $row['agustus'] .'"},'
                        //                 . '{"'. $row['september'] .'"},'
                        //                 . '{"'. $row['oktober'] .'"},'
                        //                 . '{"'. $row['november'] .'"},'
                        //                 . '{"'. $row['desember'] .'"}';
                        $outChart .=$row['januari'] .','
                                       . $row['februari'] .','
                                       . $row['maret'] .','
                                       . $row['april'] .','
                                       . $row['mei'] .','
                                       . $row['juni'] .','
                                       . $row['juli'] .','
                                       . $row['agustus'] .','
                                       . $row['september'] .','
                                       . $row['oktober'] .','
                                       . $row['november'] .','
                                       . $row['desember'] .'';
                        
                    }
                    echo json_encode(array($outChart, max($jml_transaksi)));
                    // echo $outChart;
                   }
               }
               // end of request chart Jumlah Pembelian
        }elseif ($tipe=="chartJmlHarga") {
            //request chart Jumlah Harga
            $total= array();
            $data = mysqli_query($con ,"SELECT(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='1' AND year(tgl_beli)='$tahun') as januari,"
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
                    . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='12' AND year(tgl_beli)='$tahun') as desember");
            if(!$data){
                   die ("Data User Kosong euy" . mysqli_error($con->connect()));
            }else{
                   
                    if(mysqli_num_rows($data) == 0) {
                            return 'Kami tidak mengenali username ini!';
                    } else {
                    while($row = mysqli_fetch_array($data)) {
                        $total= array((int)$row['januari'],(int)$row['februari'],
                                (int)$row['maret'],(int)$row['april'],(int)$row['mei'],
                                (int)$row['juni'],(int)$row['juli'],(int)$row['agustus'],
                                (int)$row['september'],(int)$row['oktober'],(int)$row['november'],
                                (int)$row['desember']);
                        $outChart .= $conn->NullCounter($row['januari']) .','
        .$conn->NullCounter($row['februari']) .','
        .$conn->NullCounter($row['maret']) .','
        .$conn->NullCounter($row['april']) .','
        .$conn->NullCounter($row['mei']) .','
        .$conn->NullCounter($row['juni']) .','
        .$conn->NullCounter($row['juli']) .','
        .$conn->NullCounter($row['agustus']) .','
        .$conn->NullCounter($row['september']) .','
        .$conn->NullCounter($row['oktober']) .','
        .$conn->NullCounter($row['november']) .','
        .$conn->NullCounter($row['desember']) .'';
                        
                    }
                    echo json_encode(array($outChart, max($total)));
                   }
               }
        }
        
        
    ?>