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

                    <button class="btn btn-primary mx-auto d-flex justify-content-center detailbtn mt-5" data-toggle="modal" data-target="#detailmodal" data-id="<?= $elements["id_user"]; ?>">
                        Ubah Data
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tipe">Profil Pribadi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="data_pribadi">
                            <div class="container">
                                <div class="text-left">

                                    <div class="col align-self-center order-md-1">
                                        <form method="POST" action="">

                                            <input type="hidden" name="id" value="<?= $elements["id_user"]; ?>">
                                            <div class="mb-3">
                                                <label for="nama" class="font-weight-bold">Nama</label>
                                                <input type="text" class="form-control" name="nama" value="<?= $elements['nama']; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="username" class="font-weight-bold">Username </span></label>
                                                <input type="text" class="form-control" name="username" value="<?= $elements['username']; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="font-weight-bold">Password</label>
                                                <input type="password" class="form-control" name="password" value="<?= $elements['password']; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="font-weight-bold">Email </label>
                                                <input type="text" class="form-control" name="email" value="<?= $elements['email']; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="no_hp" class="font-weight-bold">Nomor Telepon </span></label>
                                                <input type="number" class="form-control" name="no_hp" value="<?= $elements['no_hp']; ?>" required>
                                            </div>




                                            <hr class="mb-4">

                                            <button class="btn btn-primary btn-lg btn-block mb-5" type="submit" name="edit">Simpan Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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