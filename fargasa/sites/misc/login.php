<?php

?>
<html>
    <head>
        <title>Login</title>
        <link rel="icon" type="image/png" href="/fargasa/assets/Fargasa Logo Circle.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author1" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="author2" content="Coolwolf Entertainment">
        <meta name="generator" content="Jekyll v4.1.1">
        <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.min.css">
        <link href="/fargasa/signin.css" rel="stylesheet">
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
        <form class="form-signin" action="/fargasa/index.php?action=login" method="POST">
            <img class="mb-4" src="/fargasa/assets/Fargasa Logo Circle.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Silahkan Log in</h1>
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
                <input type="checkbox" value="remember-me"> Ingat Saya
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" name="loginSubmit" type="submit">LOG IN</button>
            <p class="mt-3">Belum terdaftar? <a href="/fargasa/index.php?action=register">Daftar disini</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </body>

</html>