<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
session_start();
$conn = new createCon();
$con = $conn->connect();
include 'php/editprofil.php';


if (!isset($_SESSION['username']) && $_SESSION['privilege'] <> 'sales') {
?>
    <script language="JavaScript">
        alert('Session Telah Habis!!\nAnda harus login untuk mengakses halaman ini!!');
        document.location.href = '/fargasa/index.php?action=login';
    </script>
<?php
} else {

    if (isset($_POST['edit'])) {
        if (edit($con, $_POST) > 0) {
            $_SESSION['nama'] = $_POST['nama'];
            echo
            "
                <script>
                    alert('data berhasil diubah')
                    document.location.href='tampilProfile.php';
                </script>
                ";
        } else {
            echo "
            <script>
            alert('ada yang salah!!, data tidak bisa ditambah')
            </script>
            ";
        }
    }


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" type="image/png" href="/fargasa/assets/Fargasa Logo Circle.png" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/fargasa/dist/font-awesome-4.7.0/css/font-awesome.css" />
        <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">
        <title>Profile</title>
    </head>

    <body>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/fargasa/sites/misc/navbar/salesNavbar.php"; ?>

        <div class="container-fluid " style="margin-top: 50px;">
            <h4 class="text-center " style="font-size:40px; color:gray; font-family: Glegoo,serif;">Profil Pribadi</h4>
            <div class="container-fluid d-flex align-items-center justify-content-center">

                <div class="card m-2 pl-5 p-3 " style="width: 800px; height:auto;">
                    <input type="hidden" value="<?= $elements["id_user"]; ?>">
                    <div class="row my-3">
                        <div class="col">
                            Nama
                        </div>
                        <div class="col">
                            <?= $elements['nama']; ?>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            Username
                        </div>
                        <div class="col">
                            <?= $elements['username']; ?>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            Email
                        </div>
                        <div class="col">
                            <?= $elements['email']; ?>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            Nomor Telepon
                        </div>
                        <div class="col">
                            <?= $elements['no_hp']; ?>
                        </div>
                    </div>

                    
                </div>
            </div>

            
        </div>

        </div>
        </div>


    </body>
    <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
    <script src="/fargasa/dist/js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('.detailbtn').on('click', function() {

                $('#detailmodal').modal('show');
            });
        });
    </script>
    </script>

    </html>
<?php
}
?>