<?php
  session_start();
  require_once dirname(__DIR__,1)."/koneksi.php";
  if(isset($_SESSION['username'])){

$id = $_SESSION['username'];
$sql = mysqli_query($sambung ,"SELECT * FROM tbl_user WHERE username='$id'");
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
input[type=number], textarea{
   width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
#tableDetail th{
  width: 30%
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
    <img src="../usr_img/<?php echo $gambar; ?>" width="100" alt="Avatar" class="avatar">
  </div>
 <table border="1" class="w3-table-all w3-hoverable" id="tableDetail" style="width:80%;background-color: grey; margin-top: 100px;margin-bottom: 100px">
   <thead>
      
      <tr>
         <th>Nama</th>
         <td><?php echo $data["nama"];?></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td><?php echo $data["alamat"];?></td>
      </tr>
      <tr>
        <th>Nama Perusahaan</th>
        <td><?php echo $data["nm_perusahaan"];?></td>
      </tr>
      <tr>
        <th>Alamat Perusahaan</th>
        <td><?php echo $data["alamat_perusahaan"];?></td>
      </tr>
      <tr>
        <th>No. Telp</th>
        <td><?php echo $data["no_tlp"];?></td>
      </tr>
      <tr>
        <th>Edit</th>
        <td>
        
          <span style="background-color: lawngreen" class="w3-hover-text-white">
          <a title="Edit" style="cursor: pointer" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil fa-fw"></i></a></span>
        </td>
      </tr>    
    </thead>
 </tr>


 </table>


</div>
</form>
</center>
</div>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="margin-top: -65px;dis">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
       <h3>Edit barang</h3>

            <form action="../assets/php func/action_edit_user.php?id_user=<?php echo $data['id_user'];?>" method="post" enctype="multipart/form-data">
              
              <label for="nama">Nama</label>
              <input type="text" id="nama" name="nama" value="<?php echo $data["nama"];?>" required>

              <label for="alamat">Alamat</label><br>
              <textarea id="alamat" name="alamat" required><?php echo $data["alamat"];?></textarea><br>
              
               <label for="nm_perusahaan">Nama Perusahaan</label>
              <input type="text" id="nm_perusahaan" name="nm_perusahaan" value="<?php echo $data["alamat"];?>" required>

              <label for="alamat_perusahaan">Alamat Perusahaan</label><br>
              <textarea id="alamat_perusahaan" name="alamat_perusahaan" required><?php echo $data["alamat_perusahaan"];?></textarea><br>

              <label for="nope">No. Telp</label><br>
              <input type="number" id="nope" name="nope" value="<?php echo $data["no_tlp"];?>"><br>

              <span style="float: left;margin-bottom: 10px">
                <div class="loader " id="loaderImg" style="width:80px;height: 80px;display: none ">
                </div>
              <img src="../usr_img/<?php echo $gambar; ?>" class="w3-circle w3-margin-right" id="fotoView" style="width:80px;height: 80px ">
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
    <script type="text/javascript">alert("Anda harus login  dahulu untuk mengakses page ini!");
    window.location = '../';
    </script>
    <?php
    
  }
// include('footer.php');
?>
