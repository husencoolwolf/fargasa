<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    $id = $_POST['id'];
    
    $data = mysqli_query($con ,"SELECT * FROM penawaran INNER JOIN user ON penawaran.id_pelanggan=user.id_user where id_penawaran='".$id."'");
    $output = array();
    while($row = mysqli_fetch_array($data)) {
/*0*/        array_push($output, $row['tipe']);
/*1*/        array_push($output, $row['warna']);
/*2*/        array_push($output, $row['tahun']);
/*3*/        array_push($output, $row['jarak_tempuh']);
/*4*/        array_push($output, $row['jenis_bbm']);
/*5*/        array_push($output, $conn->intToRupiah($row['harga']));
/*6*/        array_push($output, $row['gambar']);
/*7*/        array_push($output, $row['status']);
/*8*/        array_push($output, $row['waktu']);
/*9*/        array_push($output, $row['nama']);
/*10*/       array_push($output, $row['alamat']);
/*11*/       array_push($output, $row['no_hp']);
/*12*/       array_push($output, $row['email']);
/*13*/       array_push($output, $row['id_penawaran']);
///*14*/       array_push($output, $row['status']);
///*15*/       array_push($output, $row['gambar']);
    
    }
echo '<div><span class="badge badge-pill badge-primary mb-2">Informasi Mobil</span></div>
    
    <ul class="list-group mb-3 info-mobil">
        <div id="core-penawaran" data-id="'. $output[13] .'"></div>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div class="w-100 text-center">
            <img src="'.'/fargasa/assets/gambar/penawaran/'.$output[6].'" width=200 height=200 class="img-fluid">
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$output[0] .'</h6>
            <small class="text-muted">Merk/Tipe Mobil</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$output[1] .'</h6>
            <small class="text-muted">Warna Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">'.$output[2] .'</h6>
            <small>Tahun Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">'.$output[3] .'</h6>
            <small>Jarak Tempuh Mobil</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">'.$output[4] .'</h6>
            <small>Jenis BBM Mobil</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
          <div>
          <h6 class="my-0">'.$output[5] .'</h6>
          <small>Harga Penawaran</small>
          </div>
        </li>
        </ul>
        

        <div><span class="badge badge-pill badge-primary mb-2">Informasi Pelanggan</span></div>
      <ul class="list-group mb-3 info-pelanggan">
        
        <li class="list-group-item list-group-item-action d-flex">
            <div>
              <h6 class="my-0">'.$output[9] .'</h6>
              <small>Nama Penawar</small>
            </div>
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
            <div>
              <h6 class="my-0">'.$output[10] .'</h6>
              <small>Alamat</small>
            </div>
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
            <div>
              <h6 class="my-0">'.$output[11] .'</h6>
              <small>Nomer Telepon</small>
            </div>
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
            <div>
              <h6 class="my-0">'.$output[12] .'</h6>
              <small>E-Mail</small>
            </div>
        </li>
      </ul>
        ';

?>