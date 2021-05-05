<?php
$tipe = $_POST['tipe'];
$nopol = $_POST['nopol'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$jarak_tempuh= $_POST['jarak_tempuh'];
$jenis_bbm = $_POST['jenis_bbm'];
$tgl_beli = $_POST['tgl_beli'];
$hrg_beli = $_POST['hrg_beli'];
$hrg_jual = $_POST['hrg_jual'];
$mediator = $_POST['mediator'];
$feeMediator = $_POST['feeMediator'];
$pajak = $_POST['pajak'];
$rekondisi = $_POST['rekondisi'];

echo '<ul class="list-group mb-3">
        

        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$tipe .'</h6>
            <small class="text-muted">Merk/Tipe Mobil</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$nopol .'</h6>
            <small class="text-muted">Nomor Polisi</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$warna .'</h6>
            <small class="text-muted">Warna Mobik</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex bg-light">
          <div>
            <h6 class="my-0">'.$tahun .'</h6>
            <small>Tahun Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex bg-light">
          <div>
            <h6 class="my-0">'.$jarak_tempuh .'</h6>
            <small>Tahun Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex bg-light">
          <div>
            <h6 class="my-0">'.$jenis_bbm .'</h6>
            <small>Tahun Mobil</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">'.$tgl_beli .'</h6>
            <small>Tanggal Beli</small>
          <div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
          <div>
          <h6 class="my-0">'.$hrg_beli .'</h6>
          <small>Tanggal Beli</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">'.$mediator .'</h6>
          <small>Mediator Beli</small>
        </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">'.$feeMediator .'</h6>
          <small>Fee Mediator</small>
        </div>
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">'.$pajak .'</h6>
          <small>Pajak</small>
        </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex">
        <div>
          <h6 class="my-0">'.$rekondisi .'</h6>
          <small>Biaya Rekondisi</small>
        </div>
        </li>
      </ul>';

?>