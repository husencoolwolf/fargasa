<?php
session_start();
require_once 'koneksi.php';
//xdebug.remote_log = E:/Server/tmp/xdebug.log;
$sqlBarang = mysqli_query($sambung ,"SELECT * FROM tbl_barang");
        if(!$sqlBarang){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
          $arrayglobal =[];
          // $globalBarang = mysqli_fetch_assoc($sqlBarang);
          // $indexx = 0;

          while ($globalBarang = mysqli_fetch_array($sqlBarang)) {
            $arrayglobal["id"][] = $globalBarang['id_brg'];
            $arrayglobal["gambar"][] = $globalBarang['gambar'];
            $arrayglobal["merk"][] = $globalBarang['merk_brg'];
            $arrayglobal["harga"][] = $globalBarang['harga'];
          }
        }
?>
<!-- jika belum login maka.. -->
<!-- mulai page guest -->
<!DOCTYPE html>
<html>
<title>Eresha Inventory</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/index.css">

<style>
  .footergambar {
  background-image: url(https://i.imgur.com/lpmG50q.jpg);
  
  /* Image is centered vertically and horizontally at all times */
  background-position: center center;
  
  /* Image doesn't repeat */
  background-repeat: no-repeat;
  
  /* Makes the image fixed in the viewport so that it doesn't move when 
     the content height is greater than the image height */
  background-attachment: fixed;
  
  /* This is what makes the background image rescale based on its container's size */
  background-size: cover;
  
  /* Pick a solid background color that will be displayed while the background image is loading */
  background-color:#464646;

  height: 576px;

  width: 100%;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;

}
.headerQuote {
  width: 70%;
  background-color: rgba(122, 122, 122,0.6);
  color: white;
  border: 2px solid white;
  padding: 12px;
  margin: 18px;
}
.notif{
  width: 40px;
  height: 40px;
  background-color: white;
  border-radius: 30px;
  box-sizing: border-box;
  text-align: center;
}
.notif .num{
  position: absolute;
  font-size: 15px;
  top: 0;
  right: 0;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background-color: rgba(255, 0, 0,1);
  color: white;
  line-height: 18px;
  text-align: center;
}

.notif:hover{
  opacity: 0.8;
}

</style>

<body class="w3-light-grey">


<!-- Top container -->

<?php
include 'controller/header-control.php';
?>

<!-- end of top container -->

<div class="w3-container w3-dark-grey footergambar" style="margin-top: 100px">
    <a onclick="indexingQuote('mundur');" class="w3-hover w3-hover-text-grey" style="position: absolute;left: 0;margin-left: 10px;cursor: pointer;" title="Kembali"><i class="fa fa-chevron-circle-left w3-xxxlarge"></i>
        </a>

    
    <div class="headerQuote w3-animate-right" id="quote1" style="">
      
        <center>
        <h1>Eresha Inventory</h1>
        </center>
      
    </div>
  

    <div class="headerQuote w3-animate-right" style="display: none;" id="quote2">
      
        <center>
        <h1>Program Diperuntukkan untuk UAS</h1><strong><h1 style="color: cyan">Pemrograman Web 2</strong></h1>
      </center>
      
    </div>

    <div class="headerQuote w3-animate-right" style="display: none;" id="quote3">
      
        <center>
        <h1>Achmad Alfa Rizky (171021400077)</h1>
        <strong><h2 style="color: OrangeRed">Front-End Developer</h2></strong>
        <br>
        <h1>Muhammad Ali Vellayati Husaini (171021400077)</h1>
        <strong><h2 style="color: cyan">Back-End Developer</h2></strong>
      </center>
      
    </div>

    <a onclick="indexingQuote('maju');" class="w3-hover w3-hover-text-grey" style="position: absolute;right: 0;margin-right: 10px;cursor: pointer;" title="Kembali"><i class="fa fa-chevron-circle-right w3-xxxlarge"></i>
        </a>
  </div>

<!-- Sidebar/menu controller -->

<?php
include 'controller/sidebar-control.php';
?>

<!-- !PAGE CONTENT! -->

<div class="w3-main" id="bgOvr" style="margin-left:0px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:40px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom">
    
    <!-- status bar -->
    <?php
      include 'fragment/status-bar.php';
    ?>

  </div>
  <hr>

  <div class="w3-container">
    <h5>Produk Kami<span style="float: right;"><a href="fragment/tampil-barang-user.php">Lebih Banyak >></a></span></h5>
  </div>
  <!-- Produk viewer -->
  <?php
  include 'controller/produk-viewer-control.php';
  ?>
  <!-- End Produk viewer -->
  

  <hr>
  <div class="w3-container">
    <h5>Supplier Terbaru</h5>
      <?php
        include 'fragment/recent-supplier.php';
      ?>
  </div>

    
  <hr>
  <br>
  

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    <p>Build By <a href="https://github.com/husencoolwolf">CoolWolf Entertainment</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
var notifCount = false;
var menuCount = false;
var indexQuote = 1;
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");



// Toggle between showing and hiding the sidebar, and add overlay effect

function openNav() {
  // document.getElementById("mySidebar").style.width = "300px";
  if (notifCount==true) {
    document.getElementById('notifContent').style.display = 'none';
  }
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("bgOvr").style.marginLeft = "300px";
  menuCount=true;
}

function closeNav() {
  // document.getElementById("mySidebar").style.width = "0px";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("bgOvr").style.marginLeft = "0px";
  menuCount=false;
}

var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function notifShow(){
  var x = document.getElementById('notifContent');
  if (menuCount==true) {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("bgOvr").style.marginLeft = "0px";
  }

  if (notifCount==false) {
    x.style.display = 'block';
    notifCount=true;
  } else {
    x.style.display = 'none';
    notifCount=false;
  }
}


function myFunction(id, id2) {
  var x = document.getElementById(id);
  var y = document.getElementById(id2);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";//show dropdown
    x.className += " w3-animate-left";//animasiin dropdown
    y.className = y.className.replace(" fa-caret-down", " fa-caret-right");//rubah icon child div (iconnya)
  } else {
    x.className = x.className.replace(" w3-animate-left", "");//reset animasi dropdown
    x.className = x.className.replace(" w3-show", "");//sembunyiin dropdown
    y.className = y.className.replace(" fa-caret-right", " fa-caret-down");//ganti icon
  }
}

function pindahQuote(i, j){
  var x = document.getElementById("quote"+i);
  var y = document.getElementById("quote"+j);
  x.style.display = 'none';
  y.style.display = 'block';
}

function indexingQuote(action){
  if(action=='maju'){
    if(indexQuote==3){
      var indBaru = 1;
      pindahQuote(indexQuote, indBaru);
      indexQuote = indBaru;
    }else{
      pindahQuote(indexQuote, indexQuote+1);
      indexQuote += 1;
    }
  }else if(action=='mundur'){
    if(indexQuote== 1){
      var indBaru = 3;
      pindahQuote(indexQuote, indBaru);
      indexQuote = indBaru;
    }else{
      pindahQuote(indexQuote, indexQuote-1);
      indexQuote -= 1;
    }
  }
}

</script>


</body>
</html>
<?php
?>
<!-- selesai page guest