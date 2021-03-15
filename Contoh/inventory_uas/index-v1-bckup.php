<?php
session_start();
require_once("koneksi.php");
	if(!isset($_SESSION['username'])) {
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
<link rel="stylesheet" type="text/css" href="assets/css/index.css">

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <!-- <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button> -->
  <span style="font-size:30px;cursor:pointer;padding-left: 10px;" onclick="openNav()">&#9776; Menu</span>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class=" w3-top w3-collapse w3-white w3-animate-opacity" style="z-index:4;width:300px;height: 100%;display: none;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">	
      
      <img src="usr_img/Users-Guest-icon.png" class="w3-circle w3-margin-right" style="width:70px;height: 70px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span style="padding-right: 15px;">Halo, <strong>Guest</strong></span>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">

    <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-plus fa-fw"></i>Login</button>
  	
    <!-- Login Modal -->
    <div id="id01" class="modal ">
          <!-- Modal Content -->
          <form class="modal-content animate" method="post" action="validasi_login.php">
            <div class="imgcontainer">
              <img src="/inventory_uas/usr_img/Users-Guest-icon.png" width="100" alt="Avatar" class="avatar">
            </div>

            <div class="container">
              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="txt_username" required>

              <label for="password"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="txt_password" required>

              <button type="submit" class="lgn">Login</button>
              
            </div>

            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="password">Forgot <a href="#">password?</a></span>
            </div>
          </form>
    </div>
    <a href="register.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-plus fa-fw"></i>  Daftar</a>
    
   	<br><br>
  </div>
  <!-- Tombol tutup side bar -->

    <div style="position: absolute;bottom: 0px;width: 100%;text-align: left;">
   	<hr>
  	<a href="javascript:void(0)" class="w3-button w3-padding-16 w3-hover-text-red" style="width: 100%;" onclick="closeNav()"><i class="fa fa-remove fa-fw"></i> Tutup</a>
  </div>

</nav>



<!-- Overlay effect when opening sidebar on small screens -->

<!-- !PAGE CONTENT! -->

<div class="w3-main" id="bgOvr" style="margin-left:0px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:40px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-dropbox w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Barang</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-light-blue w3-text-white w3-padding-16"  style="color: white;">
        <div class="w3-left"><i class="fa fa-paper-plane w3-xxxlarge""></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Supplier</h4>
      </div>
    </div>

    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-shopping-cart w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Transaksi</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-heart w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Costumers</h4>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <table class="w3-table w3-white w3-border" border="1">
      <tr>
        <td style="width: 180px;">Gambar</td>
        <td style="width: 340px;">Nama Produk</td>
        <td style="width: 200px;">Merek</td>
        <td style="width: 30px;">Stok</td>
        <td style="width: 200px;">Harga</td>
        <td style="width: 80px;"></td>
      </tr>

    </table>
  </div>
  <div class="w3-container">
    <h5>Supplier Terbaru</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>

    
  <hr>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Kontak</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");



// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

function openNav() {
  // document.getElementById("mySidebar").style.width = "300px";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("bgOvr").style.marginLeft = "300px";
  
}

function closeNav() {
  // document.getElementById("mySidebar").style.width = "0px";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("bgOvr").style.marginLeft = "0px";
  
}

var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
<!-- selesai page guest -->
		<?php
	}else{
        $username = $_SESSION['username'];

        $data = mysqli_query($sambung ,"SELECT * FROM tbl_user WHERE username = '$username'");
        if(!$data){
          die ("Error : Data User Kosong - " . mysqli_error($sambung));
        }else{
          $hasil = mysqli_fetch_array($data);
          if(mysqli_num_rows($data) == 0) {
            echo "Data Anda TIdak Ada!";
          }else{
            $dirGambar = $hasil['gambar'];
          }

		?>
<!-- jika sudah login maka.. -->
<!-- mulai page user -->

<!DOCTYPE html>
<html>
<title>Eresha Inventory</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <!-- <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button> -->
  <span style="font-size:30px;cursor:pointer;padding-left: 10px;" onclick="openNav()">&#9776; Menu</span>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class=" w3-top w3-collapse w3-white w3-animate-opacity" style="z-index:4;width:300px;height: 100%;display: none;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/inventory_uas/usr_img/<?php echo$dirGambar;?>" class="w3-circle w3-margin-right" style="width:70px;height:70px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span style="padding-right: 15px;">Welcome, <strong><?php echo $_SESSION['username']?></strong></span>
      <br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
  	
    <!-- <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>X</a> -->
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Cek Pesanan</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Views</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out  fa-fw"></i>  Logout</a><br><br>
  </div>

  <!-- Tombol tutup side bar -->

    <div style="position: absolute;bottom: 0px;width: 100%;text-align: left;">
   	<hr>
  	<a href="javascript:void(0)" class="w3-button w3-padding-16 w3-hover-text-red" style="width: 100%;" onclick="closeNav()"><i class="fa fa-remove fa-fw"></i> Tutup</a>
  </div>

</nav>
  



<!-- Overlay effect when opening sidebar on small screens -->
<!-- <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div> -->

<!-- !PAGE CONTENT! -->

<div class="w3-main" id="bgOvr" style="margin-left:0px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:40px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-dropbox w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Barang</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-light-blue w3-text-white w3-padding-16"  style="color: white;">
        <div class="w3-left"><i class="fa fa-paper-plane w3-xxxlarge""></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Supplier</h4>
      </div>
    </div>

    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-shopping-cart w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Transaksi</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-heart w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Costumers</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Regions</h5>
        <img src="/w3images/region.jpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="w3-twothird">
        <h5>Feeds</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td>New record, over 90 views.</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td>Database error.</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>New record, over 40 users.</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>New comments.</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Check transactions.</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
            <td>CPU overload.</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>New shares.</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Supplier</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

function openNav() {
  // document.getElementById("mySidebar").style.width = "300px";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("bgOvr").style.marginLeft = "300px";
  
}

function closeNav() {
  // document.getElementById("mySidebar").style.width = "0px";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("bgOvr").style.marginLeft = "0px";
  
}
</script>

</body>
</html>

<!-- selesai page user -->

		<?php
	}}
?>