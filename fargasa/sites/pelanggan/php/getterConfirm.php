<?php
$tipe = $_POST['tipe'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$jarak_tempuh= $_POST['jarak_tempuh'];
$jenis_bbm = $_POST['jenis_bbm'];
$tahun = $_POST['tahun'];
$harga = $_POST['harga'];


echo '<ul class="list-group mb-3">
        

        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$tipe .'</h6>
            <small class="text-muted">Merk/Tipe Mobil</small>
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
            <h6 class="my-0">'.$tahun .'</h6>
            <small>Tanggal Beli</small>
          <div>
        </li>
      
      </ul>';
