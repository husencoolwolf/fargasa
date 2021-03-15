<?php
require_once dirname(__DIR__,1).'/koneksi.php';
        $data = mysqli_query($sambung ,"SELECT * FROM tbl_supplier ORDER BY 'time' DESC");
        if(!$data){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
          if(mysqli_num_rows($data) == 0) {
            echo "Data Anda Tidak Ada / Kosong!";
          }else{
          $batas =0;
          while ($hasil = mysqli_fetch_array($data) ) {
          if ($batas==4 || $batas==mysqli_num_rows($data)) {
            break;
          }else{
?>

    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="assets/pic/supplier/<?php echo$hasil['gambar'];?>" class="w3-left w3-circle w3-margin-right" style="width:42px; height: 42px;">
        <span class="w3-xlarge"><?php echo $hasil["perusahaan_supplier"];?></span><br>
      </li>
    </ul>
       
       <?php
              $batas++;
                }
              }
            }
          } 
        ?>
    </table>
  </div>