<?php 
require_once dirname(__DIR__,1).'/koneksi.php';
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

<!DOCTYPE html>
<html>
<title>Inventory</title>
<meta charset="UTF-8">

<body class="w3-light-grey">



<!-- Sidebar/menu -->
<nav class=" w3-top w3-collapse w3-white w3-animate-opacity" style="z-index:6;width:300px;height: 100%;display: none;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="usr_img/<?php echo$dirGambar;?>" class="w3-circle w3-margin-right" style="width:70px;height:70px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span style="padding-right: 15px;">Welcome, <strong><?php echo $_SESSION['username']?></strong></span>
      <br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="fragment/detail-user.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard Administrator</h5>
  </div>
  <div class="w3-bar-block">
    
    <!-- <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>X</a> -->
    <a href="index.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw "></i>  Overview</a>

    <a onclick="myFunction('Demo1', 'dropperUser')" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw "></i>  User <i id="dropperUser" class= "fa fa-caret-down fa-fw" style="float: right;"></i></a>

		<div id="Demo1" class="w3-hide w3-container w3-animate-opacity">
   				 <a href="fragment/tampil-user.php" class="w3-bar-item w3-button w3-padding">  Tampil User</a>
 		</div>

		<a onclick="myFunction('Demo2', 'dropperSupplier')" class="w3-bar-item w3-button w3-padding "><i class= "fa fa-truck fa-fw" ></i>  Supplier
      <i id="dropperSupplier" class= "fa fa-caret-down fa-fw" style="float: right;"></i>
		</a>	
			<div id="Demo2" class="w3-hide w3-container">
  					 <a href="fragment/input-supplier.php" class="w3-bar-item w3-button w3-padding">Input Supplier</a>
   					 <a href="fragment/tampil-supplier.php" class="w3-bar-item w3-button w3-padding">tampil Supplier</a>
             <a href="fragment/input_masukan.php" class="w3-bar-item w3-button w3-padding">Input Pemasukan</a>  		
			</div>
		<a onclick="myFunction('Demo3','dropperBarang')" class="w3-bar-item w3-button w3-padding"><i   class= "fa fa-dropbox fa-fw" ></i>  Barang
      <i id="dropperBarang" class= "fa fa-caret-down fa-fw" style="float: right;"></i>
		</a>	
			<div id="Demo3" class="w3-hide w3-container">
  					 <a href="fragment/input-barang.php" class="w3-bar-item w3-button w3-padding">Input Barang</a>
   					 <a href="fragment/tampil-barang-admin.php" class="w3-bar-item w3-button w3-padding">Tampil Barang</a>		
			</div>
	 <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bookmark fa-fw"></i> Tampil Transaksi</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out  fa-fw"></i>  Logout</a><br><br>
  </div>

  <!-- Tombol tutup side bar -->

    <div style="position: absolute;bottom: 0px;width: 100%;text-align: left;">
    <hr>
    <a href="javascript:void(0)" class="w3-button w3-padding-16 w3-hover-text-red" style="width: 100%;" onclick="closeNav()"><i class="fa fa-remove fa-fw"></i> Tutup</a>
  </div>

</nav>
<?php
  }//ending else
?>