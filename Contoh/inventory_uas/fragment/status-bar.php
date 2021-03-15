<?php
    $data = mysqli_query($sambung ,"SELECT COUNT('id_brg') AS gabung FROM tbl_barang UNION ALL SELECT COUNT(id_supplier) AS gabung FROM tbl_supplier UNION ALL SELECT COUNT(DISTINCT `tgl_keluar`) AS gabung FROM tbl_keluaran UNION ALL (SELECT COUNT('id_user') AS gabung FROM tbl_user where privilege='costumer')");
        if(!$data){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
          $arrayHasil = array();
          $i=0;
          while ( $hasil = mysqli_fetch_array($data)) {
            $arrayHasil[$i] = $hasil['gabung'];
            $i++;
          }

        }
?>
<div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-dropbox w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $arrayHasil[0];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Barang</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-light-blue w3-text-white w3-padding-16"  style="color: white;">
        <div class="w3-left"><i class="fa fa-paper-plane w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $arrayHasil[1];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Supplier</h4>
      </div>
    </div>

    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-shopping-cart w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $arrayHasil[2];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Transaksi</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-heart w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $arrayHasil[3];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Costumers</h4>
      </div> 
    </div>
    <?php 
    // print_r($hasil);
    // print_r($arrayHasil);
    ?>