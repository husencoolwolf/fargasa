<?php

?>
<html>
    <head>
        <title>Daftar</title>
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
        <form class="form-signin needs-validation" novalidate id="formInput">
                  
            <img class="mb-4" src="/fargasa/assets/Fargasa Logo Circle.png" alt="" width="72" height="72">
            <h1 class="font-weight-bold">DAFTAR</h1>
            <h1 class="h3 mb-3 font-weight-normal">Isi Data Diri</h1>
            <?php 
            if($errorLoginMsg<>""){
                echo '<div class="alert alert-danger" role="alert"> '.$errorLoginMsg.' </div>';
                
            } ?>
            <hr>
                  <div class="row">
                    
                    <div class="col-md mb-3">
                      <label for="nama" class="font-weight-bold">NAMA<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Anda" value="" required><span class="invalid-feedback"></span>
                      
                      
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="username" class="font-weight-bold">USERNAME<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <input type="text" class="form-control live-check-input" name="username" id="username" placeholder="Username Akun" required>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                        

                  <div class="mb-3">
                    <label for="password" class="font-weight-bold">PASSWORD <span class="text-danger">*</span></label>
                    <input type="password" class="form-control live-password-input" name="password" id="password" placeholder="Password Akun" required>
                    <div class="invalid-feedback">
                      
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="alamat" class="font-weight-bold">ALAMAT<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Akun" style="height: 100px" required></textarea>
                    <!-- <input type="email" > -->
                  </div>


                  <div class="mb-3">
                    <label for="email" class="font-weight-bold">EMAIL</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Akun">
                  </div>
                        
                  <div class="mb-3">
                    <label for="nope" class="font-weight-bold">NOMOR HP / WHATSAPP<span class="text-danger">*</span></label>
                    <input type="number" class="form-control nomor-only" name="nope" id="nope" placeholder="Nomor HP / Whatsapp Akun" maxlength="13" required>
                  </div>

                  
                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">DAFTAR</button>
                </form>
    </body>
    <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
    <script src="/fargasa/dist/js/jquery-validate/jquery.validate.min.js"></script>
    <script src="/fargasa/dist/js/bootstrap.js"></script>
    <script>
        
        
        
        
    </script>

</html>