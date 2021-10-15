<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/fargasa/dist/php/dompdf/autoload.inc.php';
$conn = new createCon();
$con = $conn->connect();

$bulan = date('m');
$query = "SELECT * from pembelian where month(tgl_beli)=$bulan ORDER BY tgl_beli DESC";
$queryPenjualan = "SELECT pembelian.tipe, pembelian.tahun, pembelian.warna, pembelian.fee_mediator as fee_mediator_beli, pembelian.pajak, pembelian.rekondisi, pembelian.hrg_beli, penjualan.fee_mediator as fee_mediator_jual, penjualan.fee_sales, penjualan.leas, penjualan.tenor, penjualan.refund, penjualan.hrg_jual, penjualan.tgl_jual from penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where leas='' ORDER BY penjualan.tgl_jual DESC";
$queryStock = "SELECT tipe, warna, tahun, nopol, month(tgl_beli) as bulan, hrg_beli, fee_mediator, pajak, rekondisi from pembelian where status!='terjual' ORDER BY tipe ASC";
$data = mysqli_query($con, $query);
$dataPenjualan = mysqli_query($con, $queryPenjualan);
$dataStok = mysqli_query($con, $queryStock);
$base = $_SERVER['DOCUMENT_ROOT'];

$bulan = $conn->dateToMonth($bulan);

ob_start();
?>
<html>
    <head>
        <title>Laporan <?=$bulan;?></title>
        <!-- <link rel="stylesheet" href="bootstrap.css" /> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <style>
            .page-break{
                page-break-before: always;
            }
            .header-pembelian > tr > th{
                font-size : 12px;
            }
            .header-penjualan > tr > th{
                font-size: 12px;
                vertical-align: central;
            }

            tr.data-pembelian{
                font-size: 10px;
            }
        </style>
    </head>
    <body>
        <!--Penjualan-->
        <img src="Fargasa Logo Circle.png" style="position: absolute;width: 60px; height: auto">
        <table style="width: 100%">
            <tr>
                <td align="center">
                    <span>
                        <h3 style="font-family: sans-serif">FARGASA MOBILINDO</h3>
                        <p style="font-size: 10; padding-left: 65px">Jl. Raya Cilegon KM. 14, Cibeber, Kecamatan Cibeber, Kedaleman, Cibeber, Kec, Cibeber, Kec. Cibeber, Kota Cilegon, Banten 42426</p>
                    </span>
                </td>
            </tr>

        </table>
        <hr class="bg-dark mb-3">
        <p class="float-right"><?= date("F j, Y"); ?></p>
        <br>
        <h2 class="text-center mb-4">LAPORAN PENJUALAN BULAN <?=strtoupper($bulan)?></h2>
        
        <table class="table table-bordered ml-0" id="tabelPenjualan">
            <thead class="header-penjualan">
                <tr>
                <th>#</th>
                <th>Tipe</th>
                <th>Tahun</th>
                <th>Warna</th>
                <th>Total Beli</th>
                <th>Fee Mediator Jual</th>
                <th>Fee Sales</th>
                <th>TGL Jual</th>
                <th>Refund</th>
                <th>Harga Jual</th>
                <th class="bg-success text-white">PROFIT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($dataPenjualan)==0){
                    echo'<tr colspan="12"><h4 class="w-100 text-warning text-center border border-secondary">Belum Ada Penjualan Bulan Ini!</h4></tr>';
                }else{
                    $i = 1;
                    while($row = mysqli_fetch_array($dataPenjualan)){
                        echo'<tr class="data-pembelian">'
                        . '<td class="text-center">'. $i .'</td>'
                        . '<td>'. $row["tipe"] .'</td>'
                        . '<td>'. $row["tahun"] .'</td>'
                        . '<td>'. $row["warna"] .'</td>'
                        . '<td>'. $conn->intToRupiah((int)$row['hrg_beli']+(int)$row['fee_mediator_beli']+(int)$row['pajak']+(int)$row['rekondisi']) .'</td>'
                        . '<td>'. $conn->intToRupiah($row["fee_mediator_jual"]) .'</td>'
                        . '<td>'. $conn->intToRupiah($row["fee_sales"]) .'</td>'
                        . '<td>'. $row["tgl_jual"] .'</td>'
                        . '<td>'. $conn->intToRupiah($row["refund"]) .'</td>'
                        . '<td>'. $conn->intToRupiah($row["hrg_jual"]) .'</td>'
                        . '<td>'. $conn->intToRupiah((int)$row['hrg_jual']+(int)$row['refund']-(int)$row['fee_mediator_jual']-(int)$row['fee_sales']-(int)$row['hrg_beli']-(int)$row['fee_mediator_beli']-(int)$row['pajak']-(int)$row['rekondisi']) .'</td>'
                                . '</tr>';
                        $i++;
                    }
                }
                
                ?>
            </tbody>
            
                
            
        </table>
        
        
        
        

    </body>
</html>

 
<?php

$html = ob_get_clean();
use Dompdf\Dompdf;

//$options = new Options();
//$options->setIsRemoteEnabled(true);
$pdf = new Dompdf();
$pdf->load_html($html);
//$pdf->set_base_path("/");
$pdf->set_option('isRemoteEnabled', TRUE);
$pdf->set_paper("A4", "landscape");
$pdf->render();
$pdf->stream('Laporan '.date("F j, Y").'.pdf', array('Attachment'=>0));
// exit(0);
//  <div>
//        <img src="/fargasa/assets/Fargasa Logo Circle.png">
//    </div>


?>
