<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/index.css">

<?php
        require_once dirname(__DIR__,1).'/koneksi.php';
        $data = "";
        if (isset($_POST['sboxSubmit'])) {
            $searchValue = $_POST['sbox'];
            $data = mysqli_query($sambung ,"SELECT * FROM tbl_barang WHERE id_brg like '%$searchValue%' OR nama_brg LIKE '%$searchValue%' OR merk_brg LIKE '%$searchValue%'");
            ?>
              <script type="text/javascript">
                document.getElementById("sboxForm").reset();
              </script>
            <?php
        }else if (isset($_POST['sboxReset'])) {
          $data = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
        }
        else{
          $data = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
        }
        if(!$data){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
          if(mysqli_num_rows($data) == 0) {
            echo "Data Anda Tidak Ada / Kosong!";
          }else{
        

          //id_brg nama_brg  merk_brg  satuan  min_order harga stok gambar 
?>
<style type="text/css">
#tableBarang table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  height: 500px;
  border: 1px solid #ddd;
}

#tableBarang th {
  padding: 8px;
  text-align: center;
  position: sticky;
  top: 0px;
  background-color: #f1f1f1 
}
#tableBarang td{
   text-align: center; 
   vertical-align: middle;
}
</style>


  <div class="w3-container">
    <div style="overflow: auto;max-height: 80%;margin: 16 0">
      <a href="../index.php" class="w3-hover w3-hover-text-grey" style="float: left; z-index: 5;" title="Kembali"><i class="fa fa-chevron-circle-left w3-xxxlarge"></i></a>
      <div style="float: right;width: 30%">
      <span>
      <form action="tampil-barang-admin.php" id="sboxForm" method="post" enctype="multipart/form-data" style="display: inline;">
        
        <span><input type="text" name="sbox" id="sbox" placeholder="Cari Barang" required style="width:50%;"></span>
        <span><input class="w3-button w3-blue w3-margin" type="submit" value="Cari" name="sboxSubmit"></span>
      </form>
      </span>
      <span>
      <form action="tampil-barang-admin.php" method="post" enctype="multipart/form-data" style="display: inline;">
        <span>
        <input class="w3-button w3-blue" type="submit" value="reset" name="sboxReset"></span>
      </form>
      </span>
      </div>
      
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
            <img class="w3-circle" src="../assets/pic/produk/<?php echo$hasil['gambar'];?>" width ="70" height="70" border="0"/> 
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
          <span style="background-color: cyan;" class="w3-hover-text-white">
          <a href="detail-barang-admin.php?id_brg=<?php echo $hasil["id_brg"];?>" title="Detail"><i class="fa fa-eye fa-fw"></i></a></span>
          <span style="background-color: lawngreen" class="w3-hover-text-white">
          <a href="detail-barang-admin.php?id_brg=<?php echo $hasil["id_brg"];?>" title="Edit"><i class="fa fa-pencil fa-fw"></i></a></span>
          <span style="background-color: red" class="w3-hover-text-white">
          <a href="../assets/php func/action_delete_barang.php?id_brg=<?php echo $hasil["id_brg"];?>" title="Delete"><i class="fa fa-trash fa-fw"></i></a>
          </span>
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