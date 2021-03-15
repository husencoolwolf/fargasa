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

    <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-in fa-fw"></i>  Login</button>
  	
    <!-- Login Modal -->
    <div id="id01" class="modal ">
          <!-- Modal Content -->
          <form class="modal-content animate" method="post" action="validasi_login.php">
            <div class="imgcontainer">
              <img src="usr_img/Users-Guest-icon.png" width="100" alt="Avatar" class="avatar">
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