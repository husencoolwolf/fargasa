<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/fargasa/dist/php/dompdf/autoload.inc.php';
$conn = new createCon();
$con = $conn->connect();

$base = $_SERVER['DOCUMENT_ROOT'];
$bulan = date('m');
$bulan = $conn->dateToMonth($bulan);

ob_start();
?>
<html>
    <head>
        <title>Laporan <?=$bulan;?></title>
        <!--<link rel="stylesheet" href="bootstrap.css" />-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>
        <img src="Fargasa Logo Circle.png" style="position: absolute;width: 60px; height: auto">
        <table style="width: 100%">
            <tr>
                <td align="center">
                    <span>
                        <h3>FARGASA MOBILINDO</h3>
                        <p style="font-size: 10; padding-left: 65px">Jl. Raya Cilegon KM. 14, Cibeber, Kecamatan Cibeber, Kedaleman, Cibeber, Kec, Cibeber, Kec. Cibeber, Kota Cilegon, Banten​ 42426</p>
                    </span>
                </td>
            </tr>

        </table>
        <hr class="bg-dark">

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
$pdf->set_paper("A4");
$pdf->render();
$pdf->stream('Laporan '.$bulan.'.pdf',array('Attachment'=>FALSE));
//  <div>
//        <img src="/fargasa/assets/Fargasa Logo Circle.png">
//    </div>


?>
