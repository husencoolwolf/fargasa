<?php
require_once dirname(__DIR__,1).'/koneksi.php';
        $data = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
        if(!$data){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
          if(mysqli_num_rows($data) == 0) {
            echo "Data Anda Tidak Ada / Kosong!";
          }else{
        

          //id_brg nama_brg  merk_brg  satuan  min_order harga stok gambar 
?>
<style type="text/css">
#tableBarang td 
{
    text-align: center; 
    vertical-align: middle;
}
</style>


  <div class="w3-container">
    <div style="overflow: auto;max-height: 80%;">
    <table class=" w3-table w3-white w3-border" id="tableBarang" border="1" style='text-align:center;'>
      <tr>
        <td style="width: 160px;">Gambar</td>
        <td style="width: 340px;">Nama Produk</td>
        <td style="width: 200px;">Merek</td>
        <td style="width: 100px;">satuan</td>
        <td style="width: 30px;">Stok</td>
        <td style="width: 200px;">Harga</td>
        <td style="width: 100px;"></td>
      </tr>
        <?php
             while ($hasil = mysqli_fetch_array($data) ) {
              if ($hasil["stok"]=="0") {
                  ?>
                <tr style="background-color: pink">
                  <?php
                }else{
               ?>
              <tr>
              <?php
                }
              ?>  
        <td>
            <img class="w3-circle" src="assets/pic/produk/<?php echo$hasil['gambar'];?>" width ="70" height="70" border="0"/> 
        </td>
        <td>
            <?php echo $hasil["nama_brg"];?>  
        </td>
        <td>
            <?php echo $hasil["merk_brg"];?>
        </td>
        <td>
            <?php echo $hasil["satuan"];?>
        </td>
        <td>
            <?php echo $hasil["stok"];?>
        </td>
        <td>Rp.<?php echo $hasil["harga"];?> 
        </td>
        <td>
          <span  style="background-color: cyan;" class="w3-hover-text-white">
          <a href="fragment/detail-barang-user.php?id_brg=<?php echo $hasil["id_brg"];?>" title="Detail"><i class="fa fa-eye fa-fw"></i></a></span>
          <span style="background-color: lawngreen" class="w3-hover-text-white">
          <a href="fragment/detail-barang-user.php?id_brg=<?php echo $hasil["id_brg"];?>" title="Pesan"><i class="fa fa-cart-plus fa-fw"></i></a></span>
        </td>
            </tr>
       
       <?php
              }
            }
           } 
        ?>
    </table>
  </div>
  </div>