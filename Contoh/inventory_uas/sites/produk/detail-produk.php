<link rel="stylesheet" type="text/css" href="../../assets/css/index.css">
<?php
require_once dirname(__DIR__,2).'/koneksi.php';
		$data = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
        if(!$data){
          die ("Koneksi Error : check koneksi anda " . mysqli_error($sambung));
        }else{
          $hasil = mysqli_fetch_array($data);
          if(mysqli_num_rows($data) == 0) {
            echo "Error:404 Data Barang Tidak Ditemukan";
          }else{
            echo '<img src="/inventory_uas/usr_img/Users-Guest-icon.png" width="100" alt="Avatar" class="avatar">';
          }
      }
?>