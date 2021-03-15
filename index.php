<?php
include 'ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
$errorLoginMsg="";
session_start();
//$_SESSION['privilege'] = 'stranger'; 
if(isset($_SESSION['privilege'])){
//    mysqli_query($con ,"Select * from user");
    if ($_SESSION['privilege']=='staff'){
        header("Location: sites/staff/staffMainMenu.php");
    }
    
}else{
    
    if(isset($_POST['loginSubmit'])){
        $periksa = $conn ->verified_login($_POST['username'], $_POST['password']);
        if ($periksa=="0"){
            header("Location: index.php");
        }else{
            $errorLoginMsg = $periksa;
        }
        
    }

?>

<html>
    <head>
        <title>Welcome Page Fargasa Mobilindo</title>
        <link rel="icon" type="image/png" href="assets/Fargasa Logo Circle.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author1" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="author2" content="Coolwolf Entertainment">
        <meta name="generator" content="Jekyll v4.1.1">
        <link rel="stylesheet" href="/dist/css/bootstrap.min.css">
        <link href="signin.css" rel="stylesheet">
        <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    </head>
    <body class="text-center">
        <form class="form-signin" action="index.php" method="POST">
            <img class="mb-4" src="assets/Fargasa Logo Circle.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <?php 
            if($errorLoginMsg<>""){
                echo '<div class="alert alert-danger" role="alert"> '.$errorLoginMsg.' </div>';
                
            } ?>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" name="username" class="form-control my-3" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" name="loginSubmit" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
        </form>
    </body>

</html>


<?php
    
}
?>