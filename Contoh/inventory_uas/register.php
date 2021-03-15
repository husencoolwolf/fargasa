<?php
session_start();
	if(isset($_SESSION['username'])) {
		header("location:index.php");
	}else{
    if (isset($_POST['btn_simpan'])) {
      echo $_FILES['fotoSource']['name'];

    }else{
		?>
<!DOCTYPE html>
<html>
<title>Register</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/register.css">
<style>

</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="">
  <span class="w3-bar-item" style="" >Daftar</span>
</div>


<!-- !PAGE CONTENT! -->


  <!-- Header -->
  <div class="" align="center" style="margin-top :5%;background-color: rgba(241, 241, 241,0.8);">
 <form action="assets/php func/validasi_register.php" method="post" enctype="multipart/form-data">
 	<a href="index.php" class="w3-hover-black w3-hover-text-grey" style="float: left;" title="Kembali">
 		<i class="fa fa-chevron-circle-left w3-xxxlarge"> </i>
 	</a>
  <!-- register step 1 -->
<div class="w3-animate-opacity" id="reg1">
     <?php
    include 'fragment/register-1.php';
    ?>
</div>
 <!-- end register step 1 -->
<!-- register step 2 -->
<div class="w3-animate-opacity hidden" id="reg2"> 
    <?php
    include 'fragment/register-2.php';
    ?>
</div>
 <!-- end register step 2 -->
 <!-- register step 3 -->
<div class="w3-animate-opacity hidden" id="reg3"> 
    <?php
    include 'fragment/register-3.php';
    ?>
</div>
 <!-- end register step 3 -->
 </form>
    <span style="color: grey;font-weight: bold;padding: 10px">Sudah punya akun? <strong class="w3-text-black">
      <button class="w3-hover-text-blue" style="border:none;background-color: rgba(0,0,0,0);cursor: pointer;" onclick="document.getElementById('id01').style.display='block'"><!-- <i class="fa fa-user-plus fa-fw"></i> -->Login</button>
    
    <!-- Login Modal -->
        <div id="id01" class="modal ">
              <!-- Modal Content -->
              <form class="modal-content animate" method="post" action="validasi_login.php">
                <div class="imgcontainer">
                  <img src="usr_img/Users-Guest-icon.png" width="100" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                  <label for="username"><b>Username</b></label>
                  <input class="loginInput" type="text" placeholder="Enter Username" name="txt_username" required>

                  <label for="password"><b>Password</b></label>
                  <input class="loginInput" type="password" placeholder="Enter Password" name="txt_password" required>

                  <button type="submit" class="lgn">Login</button>
                  
                </div>

                <div class="container" style="background-color:#f1f1f1; ">
                  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                  <span class="password">Forgot <a href="#">password?</a></span>
                </div>
              </form>
        </div>
    </strong></span>
</div>
 <!-- Footer register status -->
 <footer>
<div class="" align="center" style="background-color: rgb(241, 241, 241);position: relative;bottom: 0px;width: 100%;padding: 10px;font-weight: bold; height: 50px;margin-top: 20px">
    <table  cellpadding="6">
        <tbody align="center">
            <tr align="center" >
                <td class="step aktif w3-animate-left">info pribadi</td>
                <td class="step w3-animate-left"> info perusahaan</td>
                <td class="step w3-animate-left">selesai</td>
            </tr>
        </tbody>
    </table>
</div>
</footer>
<!-- End page content -->

<script type="text/javascript">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   

</script>
</body>
</html>
<?php
    }
	}
?>