<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
// $pageName = "pembelian";
// $subPageName = "staffInputPembelian";
$conn = new createCon();
$con = $conn->connect();
session_start();
$_SESSION['page'] = "PelangganInputPenawaran";
$_SESSION['subPage'] = "";


if (!isset($_SESSION['username']) && $_SESSION['privilege'] <> 'pelanggan') {
?>
    <script language="JavaScript">
        alert('Session Telah Habis!!\nAnda harus login untuk mengakses halaman ini!!');
        document.location.href = '/fargasa/index.php?action=login';
    </script>
<?php
} else {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" type="image/png" href="/fargasa/assets/Fargasa Logo Circle.png" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/fargasa/dist/font-awesome-4.7.0/css/font-awesome.css" />
        <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">

        <title>Penawaran Mobil </title>
    </head>

    <body>


        <!-- navbar -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/fargasa/sites/misc/navbar/pelangganNavbar.php"; ?>


        <h1><span class="badge badge-info mt-3 ml-3 px-5">Buat Penawaran Penjualan Mobil</span></h1>
        <hr>

        <div class="toast" id="statInputMsg" data-delay="10000">

        </div>

        <!-- Modal -->
        <div class="modal fade" id="KonfirmasiModal" tabindex="-1" aria-labelledby="KonfirmasiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="KonfirmasiModalLabel">Data Sudah Benar?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body overflow-auto" id="KonfirmasiModalBody">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitDB">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--end of modal-->

        <!--<button type="button" class="btn btn-primary" id="myBtn">Show Toast</button>-->


        <!--Input-->


        <div class="container">
            <div class="text-left">

                <div class="col align-self-center order-md-1">
                    <form class="needs-validation" novalidate id="formInput">
                        <div class="row justify-content-center shadow py-3 my-4">
                            
                            <div>
                                <img width="100" height="100" class="img-fluid border border-dark mb-4" src="/fargasa/assets/gambar/default.png" id="imgThumbnailPreview">
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="file" accept="image/*" name="gambar" id="gambar" onchange="previewImage('gambar','imgThumbnailPreview')" data-url="" required>
                                <div class="invalid-feedback text-center" style="width: 100%;">
                                    Gambar Perlu Diisi!!
                                </div>
                            </div>
                            <label class="mb-4 mt-3" for="gambar"><span class="badge-pill badge-dark font-weight-bold">Upload Gambar<span class="text-white"> *</span> </span> <span class="badge-pill badge-warning">Foto Harus Terlihat Nomor Polisinya!</span></label>
                            
                        </div>

                        <div class="mb-3">
                            <label for="tipe" class="font-weight-bold">Merk/Tipe Mobil<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="tipe" placeholder="Contoh : Avanza G A/T atau Avanza G M/T" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Tipe perlu di isi!.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="warna" class="font-weight-bold">Warna Mobil<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="warna" placeholder="Contoh: Merah" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Warna perlu di isi!.
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="tahun" class="font-weight-bold">Tahun Pembuatan Mobil<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="tahun" placeholder="Contoh: 2018" max=<?=date("Y");?> min=2000 required>
                            <div class="invalid-feedback">
                                Harap Isi Tahun Dengan Benar!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="jarakTempuh" class="font-weight-bold">Jarak Tempuh (Optional)</label>
                            <input type="number" class="form-control" id="jarakTempuh" placeholder="Jarak Tempuh Mobil Saat Ini">
                            <div class="invalid-feedback">
                                Jarak Tempuh Mengalami Error !
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="jenisBbm" class="font-weight-bold">Jenis BBM (Optional)</label>
                            <input type="text" class="form-control" id="jenisBbm" placeholder="Jenis BBM Mobil">
                            <div class="invalid-feedback">
                                Jenis BBM Mengalami Error !
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="font-weight-bold">Buka Harga Penawaran<span class="text-danger">*</span></label>
                            <input type="text" class="form-control rupiah" id="harga" placeholder="Harga Penawaran" required>
                        </div>


                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block mb-5" type="submit" data-target="#konfirmasiModal">Ajukan Penawaran Mobil</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Top Scroll Button -->
        <button type="button" id="topJumpBtn" class="btn btn-secondary border rounded-circle">
            <span class="fa fa-chevron-up align-middle" role="button">
                <!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
              </svg> -->
            </span>
        </button>
        <!-- end of Top Scroll Button -->


        <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
        <script src="/fargasa/dist/js/bootstrap.js"></script>
        <script src="/fargasa/dist/js/jquery.form.js"></script>
        <script>
            $(document).ready(function() {
                $("#myBtn").click(function() {
                    $('.toast').toast('show');
                });
                $('#statInputMsg').click(function() {
                    $(this).toast('hide');
                });

                $('#submitDB').on('click', function() {
                    var fd = new FormData();
                    var files = $('#gambar')[0].files;
                    if (files.length > 0) {
                        fd.append('gambar', files[0]);
                    }
                    fd.append('tipe', $('#tipe').val());
                    fd.append('warna', $('#warna').val());
                    fd.append('tahun', $('#tahun').val());
                    fd.append('jarak_tempuh', $('#jarakTempuh').val());
                    fd.append('jenis_bbm', $('#jenisBbm').val());
                    fd.append('harga', $('#harga').val());


                    $.ajax({
                        url: './php/SubmitterData.php',
                        type: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            $('.toast').html(response);
                            $('#KonfirmasiModal').modal('hide');

                            $('.toast').toast('show');
                            $("#formInput")[0].reset();
                            $("#formInput").removeClass('was-validated');
                            $('#imgThumbnailPreview').attr('src', "/fargasa/assets/gambar/default.png");


                        },
                    });




                });






                $('.body').click(function() {
                    $('#' + $(this).attr('id') + 'Search').hide();

                });
                //            
                //end of autosearch
                //            Top Scroll button event
                $('#topJumpBtn').each(function() {
                    $(this).click(function() {
                        $('html,body').animate({
                            scrollTop: 0
                        }, 'slow');
                        return false;
                    });
                });


                $('#gambar').change(function(event) {
                    var tmppath = URL.createObjectURL(event.target.files[0]);
                    //                $("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));

                    $(this).data('url', tmppath);
                });


                //end of Excel Reader upload
            });
            //end of jquery

            function previewImage(sumber, view) {
                document.getElementById(view).style.display = "block";
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById(sumber).files[0]);

                oFReader.onload = function(oFREvent) {
                    document.getElementById(view).src = oFREvent.target.result;
                };
            };

            function gambarToUrl(sumber) {

            }

            //Rubah input ke rupiah
            var uang = document.getElementsByClassName("rupiah");
            for (var i = 0; i < uang.length; i++) { // loop over them
                uang[i].addEventListener('keyup', function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                    this.value = formatRupiah(this.value, 'Rp. ');
                });
            }


            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            //validator bootstrap
            (function() {
                'use strict'

                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation')

                    // Loop over them and prevent submission
                    Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault()
                                event.stopPropagation()
                            } else {
                                event.preventDefault()
                                event.stopPropagation()

                                //                      console.log(document.getElementById('gambar').value);
                                $('#KonfirmasiModalBody').load("php/getterConfirm.php", {
                                    tipe: document.getElementById('tipe').value,
                                    warna: document.getElementById('warna').value,
                                    tahun: document.getElementById('tahun').value,
                                    jarak_tempuh: document.getElementById('jarakTempuh').value,
                                    jenis_bbm: document.getElementById('jenisBbm').value,
                                    harga: document.getElementById('harga').value

                                });
                                $('#KonfirmasiModal').modal('show');
                            }
                            form.classList.add('was-validated')

                        }, false)
                    })
                }, false)
            }())
        </script>

    </body>

    </html>
<?php
}
?>