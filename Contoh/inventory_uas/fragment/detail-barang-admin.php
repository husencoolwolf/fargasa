<?php
if (isset($_GET['id_brg'])) {
  session_start();
  require_once dirname(__DIR__,1)."/koneksi.php";
  if(isset($_SESSION['username']) && $_SESSION['privilege']== 'admin'){

$id = $_GET['id_brg'];
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
  <div style="overflow: auto;max-height: 80%;">
 <table border="1" class="w3-table-all w3-hoverable" style="width:80%;background-color: grey; margin-top: 100px;margin-bottom: 100px">
   <thead>
      
      <tr class="w3-light-grey">
         <th>ID</th>
         <td><?php echo $data["id_brg"];?></td>
      </tr>
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
        <th>Edit</th>
        <td>
        
          <span style="background-color: lawngreen" class="w3-hover-text-white">
          <a title="Edit" style="cursor: pointer" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil fa-fw"></i></a></span>
          <span style="background-color: red" class="w3-hover-text-white">
          <a href="../assets/php func/action_delete_barang.php?id_brg=<?php echo $id?>" title="Delete"><i class="fa fa-trash fa-fw"></i></a></span>
        </td>
      </tr>    
    </thead>
 </tr>


 </table>
</span>


</div>
</form>
</center>
</div>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="margin-top: -65px;dis">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
       <h3>Edit barang</h3>

            <form action="../assets/php func/action_edit_barang.php?id_brg=<?php echo $id?>" method="post" enctype="multipart/form-data">
              
              <label for="id_brg">ID Barang</label>
              <input type="text" id="id_brg" name="id_brg" value="<?php echo $data["id_brg"];?>" required>

              <label for="nama_brg">Nama Barang</label>
              <input type="text" id="nama_brg" name="nama_brg" value="<?php echo $data["nama_brg"];?>" required>
              
               <label for="merk_brg">Merek Barang</label>
              <input type="text" id="merk_brg" name="merk_brg" value="<?php echo $data["merk_brg"];?>" required>

              <label for="satuan">Satuan</label><br>
              <select id="satuan" class="select-form" name="satuan" selected>
               <?php while ($listSatuan = mysqli_fetch_array($sqlSatuan)){
                // set default combobox nya disamakan satuan nya dengan db.
                if ($listSatuan["satuan"] == $data["satuan"]) {
                  ?> 
                    <option class="select-form" value="<?php echo $listSatuan["satuan"];?>" selected><?php echo $listSatuan["satuan"];?></option>
                   <?php
                }else{
                ?> 
                <option class="select-form" value="<?php echo $listSatuan["satuan"];?>"><?php echo $listSatuan["satuan"];?></option>
               <?php
                  }
                }
               ?>
              </select>
              <br>
              <label for="harga">Harga</label>
              <input type="text" id="harga" name="harga" value="Rp.<?php echo $data["harga"];?>">

              <span style="float: left;margin-bottom: 10px">
                <div class="loader " id="loaderImg" style="width:80px;height: 80px;display: none ">
                </div>
              <img src="../assets/pic/produk/<?php echo $gambar; ?>" class="w3-circle w3-margin-right" id="fotoView" style="width:80px;height: 80px ">
              </span>
              <span style="float: left  ">
              <input id="foto" class="w3-white" type="file" name="foto"  title="foto" style="border:none;width: 100%; margin-top: 15px; padding:5px" onchange="previewImage()"/>
            </span>
              <input type="submit" class="button" value="submit" name='submit' style="float: right;">
            </form>
      </div>
    </div>



</body>
<script type="text/javascript">
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


</script>
</html>

 <?php
  }else{
      ?>
    <!-- pop up message kalau bukan admin-->
    <script type="text/javascript">alert("Anda harus login sebagai admin dahulu untuk mengakses page ini!");
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
// include('footer.php');
?>
