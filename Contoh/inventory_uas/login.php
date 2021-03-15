<?php
session_start();
	if(isset($_SESSION['username'])) {
		header("location:index.php");
	}else{
		?>
<!DOCTYPE html>
<html>
<title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
body {
  /* Location of the image */
  background-image: url(res/loginbg.png);
  
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
  
  /* SHORTHAND CSS NOTATION
   * background: url(background-photo.jpg) center center cover no-repeat fixed;
   */
}
.button{
        background-color: green;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        
    }
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="">
  <span class="w3-bar-item" style="padding-left: 50%" >Login</span>
</div>


<!-- !PAGE CONTENT! -->


  <!-- Header -->
  <div align="center" style="margin-top :15%;background-color: #f1f1f1;">
 <form action="validasi_login.php" method="post">
 <a href="index.php" class="w3-hover-black w3-hover-text-grey" style="float: left;" title="Kembali"><i class="fa fa-chevron-circle-left  w3-xxxlarge"></i></a>
 <!-- <h1>Masuk</h1> -->
 <table cellpadding="4">
 <tbody>
 <tr><!-- <td>Username</td> --><td><input class="w3-light-blue" name="txt_username" type="text" placeholder="Username" style="border: 2px solid; border-radius: 5px;padding:5px"></td></tr>
 <tr><!-- <td>Password</td> --><td><input class="w3-light-blue" name="txt_password" type="password" placeholder="Kata Sandi" style="border: 2px solid; border-radius: 5px;padding:5px"></td></tr>
 <tr><td align="center"><input class="button w3-button w3-hover-green" value="Login" type="submit"></td></tr>
 </tbody>
 </table>
 </form>
    <span style="color: grey">Tidak punya akun? <strong class="w3-text-black w3-hover-text-blue"><a href="frame/register.php">Daftar</a></strong></span>
</div>

  <!-- Footer -->
  

  <!-- End page content -->
<!-- </div> -->


</body>
</html>
<?php
	}
?>