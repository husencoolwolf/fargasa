<?php
    include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
    include $_SERVER['DOCUMENT_ROOT'].'/fargasa/dist/php/idGenerator.php';
    $conn = new createCon();
    $con = $conn->connect();
    session_start();

    $id = createId(8);

    //cek id
          $id = checkId($con,$id);  
    //

    $dataArray = $data;
    $nama = $dataArray['nama'];
    $username = $dataArray['username'];
    $password = $dataArray['password'];
    $email = $dataArray['email'];
    $nope = $dataArray['nope'];

    $input	= mysqli_query($con,"INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `no_hp`) "
            . "VALUES ('$id', "
            . "'$nama', "
            . "'$username', "
            . "'$password', "
            . "'$email', "
            . "'$nope');");
        if ($input) {
            //Jika Sukses
            //update stok
            echo   '<div class="toast-body alert alert-success text-center" id="isiStat" value="success">
                      Data Telah Berhasil di Input!!!
                    </div>';
        }else {
            echo   '<div class="toast-body alert alert-danger text-center" id="isiStat" value="error">
                      Upps, Ada kesalahan dalam program saat input data!!!<br>Silahkan Hubungi Administrator!!!<br>'.mysqli_error($con).'
                    </div>';

        }
    function checkId($con,$id2){
        $cekuser = mysqli_query($con ,"SELECT id_user FROM user WHERE id_user = '$id2'");
            if(!$cekuser){
                return $id2;
            }else{
                $id2 = createId();
                checkId($con,$id2);
               }
    }
?>