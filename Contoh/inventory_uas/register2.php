<?php
session_start();
  if(isset($_SESSION['username'])) {
    header("location:index.php");
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
.aktif{
  color: blue;
  background: rgb(210, 210, 210);
  background-size: 100%;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 4; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;

}
/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5px auto; /* 15% from the top and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}
/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}
@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}
@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}
/* Set a style for all buttons */
button.lgn{
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
button:hover {
  opacity: 0.8;
}
/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
img.avatar {
  width: 30%;
  border-radius: 10%;
}
.container {
  padding: 16px;
}
.loginInput {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}
/*Template step*/

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  color: black;
  background-color: #bbbbbb;
  border: none;  
  opacity: 0.5;
}

.step.active {
  color: blue;
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="">
  <span class="w3-bar-item" style="" >Daftar</span>
</div>


<!-- !PAGE CONTENT! -->


  <!-- Header -->
  <div class="" align="center" style="margin-top :5%;background-color: rgba(241, 241, 241,0.8);">
 <form action="validasi_login.php" id="regForm" method="post">
  <a href="index.php" class="w3-hover-black w3-hover-text-grey" style="float: left;" title="Kembali">
    <i class="fa fa-chevron-circle-left w3-xxxlarge"> </i>
  </a>
 <table cellpadding="6" border="0" style="padding: 10px">
 <tbody align="center">
<div class="tab">
 <tr>
  <!-- Nama -->
  <td><input class="" type="text" name="txt_nama_dpn" placeholder="Nama Depan" oninput="this.className = ''" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%"/></td>
  </tr>
  <tr>
  <td><input class="" type="text" name="txt_nama_dpn" placeholder="Nama Belakang" oninput="this.className = ''" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%"/></td>
 </tr>
</div>
 <!-- username -->
<div class="tab">
 <tr>
  <td><input class="" type="text" name="txt_username" placeholder="Username" oninput="this.className = ''" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%"/></td>
  </tr>
 <!-- password -->
  <tr>
  <td><input class="" type="password" name="txt_password" placeholder="Password" oninput="this.className = ''" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%"/></td>
 </tr>
 <tr>
  <td><input class="" type="password" name="re_txt_password" placeholder="Re-type Password" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%"/></td>
 </tr>
</div>
 <!-- Alamat -->
 <div class="tab">
<tr>
 <td>
 <textarea class="" name="txt_alamat" placeholder="Alamat" style="border: 2px solid; border-radius: 5px;padding:5px;width: 80%; height: 100px;"></textarea>
 </tr>
 <tr>
    <td>
      <input class="w3-white" type="file" name="fileUpload" id="fileUpload" title="foto" style="border: 2px solid; border-radius: 5px;width: 100%;padding:5px"/></td>
  </tr>
</td>
 <tr >
 <td><button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button></td>
 </tr>
 </tbody>
 </table>
 </form>
    <span style="color: grey;font-weight: bold;padding: 10px">Sudah punya akun? <strong class="w3-text-black">
      <button class="w3-hover-text-blue" style="border:none;background-color: rgba(0,0,0,0);" onclick="document.getElementById('id01').style.display='block'"><!-- <i class="fa fa-user-plus fa-fw"></i> -->Login</button>
    
    <!-- Login Modal -->
        <div id="id01" class="modal ">
              <!-- Modal Content -->
              <form class="modal-content animate" method="post" action="validasi_login.php">
                <div class="imgcontainer">
                  <img src="/inventory_uas/usr_img/Users-Guest-icon.png" width="100" alt="Avatar" class="avatar">
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
<div class="" align="center" style="background-color: rgb(241, 241, 241);position: fixed;bottom: 0px;width: 100%;padding: 10px;font-weight: bold;">
    <table  cellpadding="6">
        <tbody align="center">
            <tr align="center" >
                <td class="step">info pribadi</td>
                <td class="step">info perusahaan</td>
                <td class="step">selesai</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- End page content -->

<script type="text/javascript">
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
</body>
</html>
<?php
  }
?>