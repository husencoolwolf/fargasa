<?php
    include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';
    include $_SERVER['DOCUMENT_ROOT'].'/dist/php/idGenerator.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    $tahun = $_GET['tahun'];
        $jml_transaksi= array();
        $outChart='';
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
               die ("Data User Kosong" . mysqli_error($this->connect()));
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
                    $outChart .= "{Bulan:'Januari', Transaksi:'". $row['januari'] ."'},"
                            . "{Bulan:'Februari', Transaksi:'". $row['februari'] ."'},"
                            . "{Bulan:'Maret', Transaksi:'". $row['maret'] ."'},"
                            . "{Bulan:'April', Transaksi:'". $row['april'] ."'},"
                            . "{Bulan:'Mei', Transaksi:'". $row['mei'] ."'},"
                            . "{Bulan:'Juni', Transaksi:'". $row['juni'] ."'},"
                            . "{Bulan:'Juli', Transaksi:'". $row['juli'] ."'},"
                            . "{Bulan:'Agustus', Transaksi:'". $row['agustus'] ."'},"
                            . "{Bulan:'September', Transaksi:'". $row['september'] ."'},"
                            . "{Bulan:'Oktober', Transaksi:'". $row['oktober'] ."'},"
                            . "{Bulan:'November', Transaksi:'". $row['november'] ."'},"
                            . "{Bulan:'Desember', Transaksi:'". $row['desember'] ."'}";
                    
                }
                echo json_encode(array($outChart, max($jml_transaksi)));
               }
           }
        
    ?>