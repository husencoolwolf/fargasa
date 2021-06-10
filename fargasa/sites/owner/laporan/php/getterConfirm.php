<?php
    include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
    $conn = new createCon();
    $con = $conn->connect();

$output = "";    
    
$id_pembelian = $_POST['id_pembelian'];
$tglJual = $_POST['tglJual'];
$hrgJual = $_POST['hrgJual'];
$mediator = $_POST['mediator'];
$feeMediator= $_POST['feeMediator'];
$sales = $_POST['sales'];
$feeSales = $_POST['feeSales'];
$leas = $_POST['leas'];
$tenor = $_POST['tenor'];
$refund = $_POST['refund'];
$id_pelanggan = $_POST['id_pelanggan'];

$dataMobil = mysqli_query($con, "SELECT id_pembelian, tipe, tahun, warna, nopol, gambar FROM pembelian where id_pembelian='".$id_pembelian."';");
$dataPelanggan;
if($id_pelanggan<>""){
    $dataPelanggan = mysqli_query($con, "SELECT id_user, nama, email from user WHERE privilege='pelanggan' AND id_user='".$id_pelanggan."'");
}else{
    $dataPelanggan="";
}
foreach ($dataMobil as $dataMobil){
    $output .= '<ul class="list-group mb-3">
        
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div class="w-100 text-center">
            <img src="'.'/fargasa/assets/gambar/'.$dataMobil["gambar"].'" width=200 height=200 class="img-fluid">
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$dataMobil["tipe"] .'</h6>
            <small class="text-muted">Merk/Tipe Mobil</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$dataMobil["tahun"] .'</h6>
            <small class="text-muted">Tahun Mobil</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$dataMobil["warna"] .'</h6>
            <small class="text-muted">Warna Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$tglJual .'</h6>
            <small>Tanggal Jual</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$hrgJual .'</h6>
            <small>Harga Jual Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$mediator .'</h6>
            <small>Mediator Jual</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$feeMediator .'</h6>
            <small>Fee Mediator Jual</small>
          <div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
          <h6 class="my-0">'.$sales .'</h6>
          <small>Sales</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
          <h6 class="my-0">'.$feeSales .'</h6>
          <small>Fee Sales</small>
          </div>
        </li>
        

        <li class="list-group-item list-group-item-action d-flex lh-condensed">
        <div>
          <h6 class="my-0">'.$leas .'</h6>
          <small>Leasing</small>
        </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
        <div>
          <h6 class="my-0">'.$tenor .'</h6>
          <small>Tenor</small>
        </div>
        </li>
        
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
        <div>
          <h6 class="my-0">'.$refund .'</h6>
          <small>Refund / Bunga</small>
        </div>
        </li>
        ';
}


if($dataPelanggan ==""){
    $output.= '<li class="list-group-item list-group-item-action d-flex lh-condensed">
        <div>
          <h6 class="my-0"></h6>
          <small>Pelanggan</small>
        </div>
        </li>
      </ul>';
}else{
    foreach($dataPelanggan as $dataPelanggan){
        $output.= '<li class="list-group-item list-group-item-action d-flex lh-condensed">
            <div>
              <h6 class="my-0">'.$dataPelanggan["nama"] .'</h6>
              <small>Pelanggan</small>
            </div>
            </li>
          </ul>';
    }
}


echo $output;


?>