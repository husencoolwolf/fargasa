<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    $id = $_POST['id'];
    
    $data = mysqli_query($con ,"SELECT * FROM pembelian where id_pembelian='".$id."'");
    $output = array();
    while($row = mysqli_fetch_array($data)) {
/*0*/        array_push($output, $row['id_pembelian']);
/*1*/        array_push($output, $row['tipe']);
/*2*/        array_push($output, $row['nopol']);
/*3*/        array_push($output, $row['warna']);
/*4*/        array_push($output, $row['tahun']);
/*5*/        array_push($output, $row['jarak_tempuh']);
/*6*/        array_push($output, $row['jenis_bbm']);
/*7*/        array_push($output, $row['mediator']);
/*8*/        array_push($output, $row['tgl_beli']);
/*9*/        array_push($output, $conn->intToRupiah($row['hrg_beli']));
/*10*/       array_push($output, $conn->intToRupiah($row['hrg_jual']));
/*11*/       array_push($output, $conn->intToRupiah($row['fee_mediator']));
/*12*/       array_push($output, $conn->intToRupiah($row['pajak']));
/*13*/       array_push($output, $conn->intToRupiah($row['rekondisi']));
/*14*/       array_push($output, $row['status']);
/*15*/       array_push($output, $row['gambar']);
    
    }

echo '<ul class="list-group mb-3">
        
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div class="w-100 text-center">
            <img src="'.'/fargasa/assets/gambar/'.$output[15].'" width=200 height=200 class="img-fluid">
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$output[1] .'</h6>
            <small class="text-muted">Merk/Tipe Mobil</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$output[2] .'</h6>
            <small class="text-muted">Nomor Polisi</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$output[3] .'</h6>
            <small class="text-muted">Warna Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex bg-light">
          <div>
            <h6 class="my-0">'.$output[4] .'</h6>
            <small>Tahun Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex bg-light">
          <div>
            <h6 class="my-0">'.$output[5] .'</h6>
            <small>Jarak Tempuh Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex bg-light">
          <div>
            <h6 class="my-0">'.$output[6] .'</h6>
            <small>Jenis BBM Mobil</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">'.$output[8] .'</h6>
            <small>Tanggal Beli</small>
          <div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
          <div>
          <h6 class="my-0">'.$output[9] .'</h6>
          <small>Harga Beli</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
          <div>
          <h6 class="my-0">'.$output[10] .'</h6>
          <small>Harga Jual</small>
          </div>
        </li>
        

        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">'.$output[7] .'</h6>
          <small>Mediator Beli</small>
        </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">'.$output[11] .'</h6>
          <small>Fee Mediator</small>
        </div>
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">'.$output[12] .'</h6>
          <small>Pajak</small>
        </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">'.$output[13] .'</h6>
          <small>Biaya Rekondisi</small>
        </div>
        </li>
      </ul>';

?>