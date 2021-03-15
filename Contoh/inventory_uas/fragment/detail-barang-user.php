<?php
if (isset($_GET['id_brg'])) {
  $id = $_GET['id_brg'];
  session_start();
  require_once dirname(__DIR__,1)."/koneksi.php";
  $id_user = $_SESSION['id'];
  $sqlUser = mysqli_query($sambung ,"SELECT * FROM tbl_user WHERE id_user='$id_user'");
  $dataUser = mysqli_fetch_array($sqlUser);
  if (isset($_POST['keranjang'])) {
            $recentKeranjang = $dataUser['keranjang'];
            $daftarKeranjang = explode(",,", $dataUser['keranjang']);
            $inputKeranjang;
            if ($recentKeranjang=="") {
              $inputKeranjang=$id;
            }else if (in_array($id, $daftarKeranjang)) {
              $inputKeranjang=$dataUser['keranjang'];
              ?>
              <script language="JavaScript">
                alert('Barang ini Sudah ada di keranjang, silahkan checkout terlebih dahulu sebelum memasukkan ke keranjang lagi!');
                document.location.href='../index.php';
              </script>
              <?php
            }else{
              $inputKeranjang= $dataUser['keranjang'].",,".$id;
            }

            $input  =mysqli_query($sambung,"UPDATE `tbl_user` SET `keranjang`='$inputKeranjang' where id_user='$id_user'");
            if (!$input) {
              echo "Error : ". die (mysqli_error($sambung));
            }else{
              ?>
            <script language="JavaScript">
                alert('Barang telah dimasukkan ke Keranjang!\nSilahkan melakukan checkout!!');
                document.location.href='../index.php';
              </script>
              <?php
            }
            
  }
  if(isset($_SESSION['username']) && $_SESSION['privilege']== 'costumer'){



$sql = mysqli_query($sambung ,"SELECT * FROM tbl_barang WHERE id_brg='$id'");
$sqlSatuan = mysqli_query($sambung ,"SELECT DISTINCT satuan FROM tbl_barang");

?>
<html>
<head>
  <title>Tampil data Barang</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
</head>

<style type="text/css">
  .loader {
  border: 8px solid #a3a199;
  border-radius: 50%;
  border-top: 8px solid black;
  width: 40px;
  height: 40px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.select-form{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.button{
        background-color: green;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
    }

</style>

<body>
  <div class="w3-main" id="bgOvr" style="margin-left:0px;margin-top:43px;">

    
<center>

<?php $data = mysqli_fetch_array($sql); 

$gambar = $data['gambar'];
?>
  <div class="imgcontainer">
    <a href="../index.php" class="w3-hover w3-hover-text-grey" style="float: left; z-index: 5;" title="Kembali"><i class="fa fa-chevron-circle-left w3-xxxlarge"></i>
    </a>
    <img src="../assets/pic/produk/<?php echo $data['gambar']; ?>" width="100" alt="Avatar" class="avatar">
  </div>
 <table border="1" class="w3-table-all w3-hoverable" style="width:80%;background-color: grey; margin-top: 100px;margin-bottom: 100px">
   <thead>
      
      <tr>
        <th>Nama Barang</th>
        <td><?php echo $data["nama_brg"];?></td>
      </tr>
      <tr>
        <th>Merek</th>
        <td><?php echo $data["merk_brg"];?></td>
      </tr>
      <tr>
        <th>Harga</th>
        <td><?php echo $data["harga"];?></td>
      </tr>
      <tr>
        <th>Stock</th>
        <td><?php echo $data["stok"];?></td>
      </tr>
      <tr>
        <th>Satuan</th>
        <td><?php echo $data["satuan"];?></td>
      </tr>
      <tr>
        <th>Aksi</th>
        <td>
           <span class="w3-hover-text-white" style="display: inline-block;"><form action="detail-barang-user.php?id_brg=<?php echo $id;?>" method="post" enctype="multipart/form-data">
          <?php if ($data["stok"]==0){?> <!-- kalau stok gk ada disable pemesanan -->
          <button disabled="" name="keranjang" title="Masukkan Ke Keranjang" style="cursor: pointer;background-color: lawngreen;display: inline;border: none;display: inline-block;"><i class="fa fa-cart-plus fa-fw"></i></button></form></span>
          <?php }else{ ?>  <!-- kalau stok ada enable pemesanan -->
          <button name="keranjang" title="Masukkan Ke Keranjang" style="cursor: pointer;background-color: lawngreen;display: inline;border: none;display: inline-block;"><i class="fa fa-cart-plus fa-fw"></i></button></form></span>
          <?php } ?>
          <span style="color: red;display: inline-block;cursor: pointer;" class="w3-hover-text-maroon">
          <a onclick="loved();"><i id="love" class="fa fa-heart-o fa-fw" title="Favourite(Update Soon)"></i></a>
        </td>
      </tr>    
    </thead>
 </tr>


 </table>


</div>
</center>
</div>



</body>
<script type="text/javascript">
  var loveCount = false;
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

function previewImage() {
    document.getElementById("fotoView").style.display = "none";
    var loader = document.getElementById("loaderImg");
    loader.style.display = 'block';
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("foto").files[0]);
    
    oFReader.onload = function(oFREvent) {
      document.getElementById("fotoView").src = oFREvent.target.result;
      loader.style.display = 'none';
      document.getElementById("fotoView").style.display = "block";
    };
  };

function loved(){
    var logo = document.getElementById('love');
    if (loveCount==false) {
      logo.className = logo.className.replace(" fa-heart-o", " fa-heart");
      loveCount=true;
    }else{
      logo.className = logo.className.replace(" fa-heart", " fa-heart-o");
      loveCount=false;
    }
}
</script>
</html>

 <?php
  }else{
      ?>
    <!-- pop up message kalau bukan admin-->
    <script type="text/javascript">alert("Anda harus login dahulu untuk mengakses page ini!");
    window.location = '../';
    </script>
    <?php
    
  }
}else{
    ?>
    <!-- pop up message kalau tidak ada var $_get -->
    <script type="text/javascript">alert("Error, silahkan coba kembali!");
    window.location = '../';
    </script>
    <?php
}

?>
