<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$url = $_GET["url"];
?>
<html>
    <head>
        <title>Koneksi Ke Database Error!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="display-4 font-weight-bold">500 : Koneksi Database Bermasalah</h1>
            <p class="lead">Ini terjadi ketika koneksi komputer anda tidak dapat terhubung ke database.</p>
            <hr class="my-4">
            <p>Saran pemecahan masalah :</p>
            <ul>
                <li><p><strong>1. </strong>Buka Xampp Control Panel - klik start pada menu MySQL</p></li>
                <li><p><strong>2. </strong>Silahkan Hubungi Administrator untuk pemecahan masalah</p></li>
            </ul>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="<?php echo($url);?>" role="button">Muat Ulang</a>
            </p>
        </div>
    </body>
</html>
