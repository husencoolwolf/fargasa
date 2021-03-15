<?php
 session_start();
 require_once("koneksi.php");
 $username = $_POST['txt_username'];
 $pass = $_POST['txt_password'];
 $cekuser = mysqli_query($sambung ,"SELECT * FROM tbl_user WHERE username = '$username' and password='$pass'");
 if(!$cekuser){
 	die ("Data Admin Kosong" . mysqli_error($sambung));
 }else{
 	$hasil = mysqli_fetch_array($cekuser);
	 if(mysqli_num_rows($cekuser) == 0) {
		 ?>
	 	<script type="text/javascript">alert("Kami tidak mengenali username ini!");
	 		window.location = 'index.php';
	 	</script>
	 	<?php
	 } else {
	 if($pass <> $hasil['password']) {
	 	?>
	 	<script type="text/javascript">alert("Password Anda Salah!");
	 		window.location = 'index.php';
	 	</script>
	 	<?php
	 	
	 } else {
	 $_SESSION['id'] = $hasil['id_user'];
	 $_SESSION['username'] = $hasil['username'];
	 $_SESSION['privilege'] = $hasil['privilege'];
	 header("location:index.php");
 		}
 	}
 }
?>