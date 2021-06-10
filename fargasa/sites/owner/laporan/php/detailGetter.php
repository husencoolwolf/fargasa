<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
$id = $_POST['id'];

$data = mysqli_query($con, "SELECT b.tipe, b.gambar, b.warna, b.tahun, b.jarak_tempuh, b.jenis_bbm, b.mediator as bMediator, j.mediator as jMediator, j.hrg_jual, b.hrg_beli, b.fee_mediator as bFee_mediator, j.fee_mediator as jFee_mediator, b.pajak, b.rekondisi, j.sales, j.fee_sales, j.leas, j.tenor, j.refund, j.id_pelanggan, b.nopol, b.tgl_beli, j.tgl_jual FROM penjualan j INNER JOIN pembelian b ON j.id_pembelian=b.id_pembelian where j.id_penjualan='" . $id . "'");

$output = mysqli_fetch_array($data);
//while ($row = mysqli_fetch_array($data)) {
//  /*0*/
//  array_push($output, $row['id_penjualan']);
//  /*1*/
//  array_push($output, $row['tipe']);
//  /*2*/
//  array_push($output, $row['nopol']);
//  /*3*/
//  array_push($output, $row['warna']);
//  /*4*/
//  array_push($output, $row['tahun']);
//  /*5*/
//  array_push($output, $row['jarak_tempuh']);
//  /*6*/
//  array_push($output, $row['jenis_bbm']);
//  /*7*/
//  array_push($output, $row['mediator']);
//  /*8*/
//  array_push($output, $row['tgl_beli']);
//  /*9*/
//  array_push($output, $conn->intToRupiah($row['hrg_jual']));
//  /*10*/
//  array_push($output, $conn->intToRupiah($row['fee_mediator']));
//  /*11*/
//  array_push($output, $conn->intToRupiah($row['pajak']));
//  /*12*/
//  array_push($output, $conn->intToRupiah($row['pajak']));
//  /*13*/
//  array_push($output, $conn->intToRupiah($row['rekondisi']));
//  /*14*/
//  array_push($output, $row['status']);
//  /*15*/
//  array_push($output, $row['gambar']);
// /*16*/ array_push($output, $row['tgl_jual']);
//}

echo '<ul class="list-group mb-3">
        
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div class="w-100 text-center">
            <img src="' . '/fargasa/assets/gambar/' . $output["gambar"] . '" width=200 height=200 class="img-fluid">
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0"> <b>' . $output["tipe"] . '</b></h6>
            <small class="text-muted">Merk/Tipe Mobil</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output["nopol"] . '</h6>
            <small class="text-muted">Nomor Polisi</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output["warna"] . '</h6>
            <small class="text-muted">Warna Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output["tahun"] . '</h6>
            <small>Tahun Mobil</small>
          </div>
          
        <li class="list-group-item list-group-item-action d-flex">
            <div class="col-sm">
                <div class="text-center">
                    <h6 class="my-0">' . $output["tgl_beli"] . '</h6>
                    <small>Tanggal Beli</small>
                </div>
            </div>
            <div class="col-sm">
                <div class="text-center">
                    <h6 class="my-0">' . $output["tgl_jual"] . '</h6>
                    <small>Tanggal Jual</small>
                </div>
            </div>
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
            <div class="col-sm">
                <div class="text-center">
                    <h6 class="my-0">' . $conn->intToRupiah($output["hrg_beli"]) . '</h6>
                    <small>Harga Beli</small>
                </div>
            </div>
            <div class="col-sm">
                <div class="text-center">
                    <h6 class="my-0">' . $conn->intToRupiah($output["hrg_jual"]) . '</h6>
                    <small>Harga Jual</small>
                </div>
            </div>
        </li>
        <li class="list-group-item list-group-item-action text-success d-flex lh-condensed font-weight-bold">
          <div>
            <h6 class="my-0">' . $conn->intToRupiah((int)$output["hrg_jual"] + (int)$output["refund"] - (int)$output["hrg_beli"] - (int)$output["bFee_mediator"] - (int)$output["jFee_mediator"] - (int)$output["fee_sales"] - (int)$output["rekondisi"] - (int)$output["pajak"]) . '</h6>
            <small>Profit</small>
          </div>
          
        </li>

        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output["jarak_tempuh"] . '</h6>
            <small>Jarak Tempuh Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output["jenis_bbm"] . '</h6>
            <small>Jenis BBM Mobil</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
            <div class="col-sm">
                <div class="text-center">
                    <h6 class="my-0">' . $output["bMediator"] . '</h6>
                    <small>Mediator Beli</small>
                </div>
            </div>
            <div class="col-sm">
                <div class="text-center">
                    <h6 class="my-0">' . $output["jMediator"] . '</h6>
                    <small>Mediator Jual</small>
                </div>
            </div>
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
            <div class="col-sm">
                <div class="text-center">
                    <h6 class="my-0">' . $output["bFee_mediator"] . '</h6>
                    <small>Fee Mediator Beli</small>
                </div>
            </div>
            <div class="col-sm">
                <div class="text-center">
                    <h6 class="my-0">' . $output["jFee_mediator"] . '</h6>
                    <small>Fee Mediator Jual</small>
                </div>
            </div>
        </li>
        
        
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">' . $conn->intToRupiah($output["pajak"]) . '</h6>
          <small>Pajak</small>
        </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">' . $conn->intToRupiah($output["rekondisi"]) . '</h6>
          <small>Biaya Rekondisi</small>
        </div>
        </li>
      </ul>';
