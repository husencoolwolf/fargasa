<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();

session_start();

$_SESSION['page'] = "logactivity";
$_SESSION['subPage'] = "";
if (!isset($_SESSION['username']) && $_SESSION['privilege'] <> 'admin') {
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
    <link rel="stylesheet" href="/fargasa/dist/font-awesome-4.7.0/css/font-awesome.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/fargasa/dist/DataTables/datatables.min.css">


    <title>Lihat Penjualan</title>
  </head>

  <body>

    <!-- navbar -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/fargasa/sites/misc/navbar/adminNavbar.php"; ?>

    <!--Toast-->
    <div class="toast" id="statInputMsg" data-delay="10000">

    </div>
    <!--end of Toast-->



    <div class="container mt-5">





      <!-- <div  class="scrollTable"> -->
      <table class="table table-striped table-hover table-bordered responsive-text" id="dataPenjualan">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Aktivitas</th>
          </tr>
        </thead>
        <tbody class="align-middle">
        </tbody>
      </table>
    </div>
    </div>
    <!-- </div> -->

    <!-- Top Scroll Button -->
    <button type="button" id="topJumpBtn" class="btn btn-dark rounded-circle">
      <span class="fa fa-chevron-up align-middle" role="button">

      </span>
    </button>
    <!-- end of Top Scroll Button -->

    <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
    <script src="/fargasa/dist/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/fargasa/dist/DataTables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <script>
      //            reg js start
      //            morris chart



      //            reg js end
    </script>

    <script src="js/chartJS.js"></script>

    <script>
      $(document).ready(function() {
        //                jquery start
        //                data inisiate
        inisiateData();
        inisiateDataTables();
        addActionRupiah();
        var bulanss = [];
        // Data Tables inisiasi


        $('#statInputMsg').click(function() {
          $(this).toast('hide');
        });

        $('.nav-tabs > li').click(function() {
          $('.nav-tabs > li > a').removeClass('active');
          $(this).children().addClass('active');
          $('#Charts > div').hide();
          $('#Charts > div').eq($(this).index()).show();
        });

        $('#Charts > div').hide();
        $('#Charts > div').eq(0).show();
        //livesearch Data Penjualan
        $('.form-control#searchData').on('keyup', function() {
          if (bulanss.length == 0 || bulanss.length == 12) {
            var tipe = "";
            if ($(this).val().length == 0) {
              tipe = "Init";
              $.get('php/LihatDataRequest.php?tipe=' + tipe, function(data) {
                $('#dataPenjualan tbody').html(data);
                addActionButtonEvent();
              });
            } else {
              tipe = "search";
              $.get('php/LihatDataRequest.php?query=' + $(this).val() + '&tipe=' + tipe, function(data) {
                $('#dataPenjualan tbody').html(data);
                addActionButtonEvent();
              });
            }
          } else {
            bulanss = [];
            for (var i = 0; i < $('#filterBulan input:checked').length; i++) {
              var data = $('#filterBulan input:checked').eq(i).val();
              bulanss.push(data);
            }
            var bulan2 = JSON.stringify(bulanss);
            $.get('php/LihatDataRequest.php?tipe=' + 'searchFilter&bulan=' + bulan2 + '&query=' + $('.form-control#searchData').val(), function(data) {
              $('#dataPenjualan tbody').html(data);
              addActionButtonEvent();
            });
          }


        });

        $('#topJumpBtn').each(function() {
          $(this).click(function() {
            $('html,body').animate({
              scrollTop: 0
            }, 'slow');
            return false;
          });
        });


        $('#filterButton').on('click', function() {
          $('#filterBulan').toggle(
            function() {
              //                      console.log("buka");
              $(this).animate({
                height: "100%"
              }, 500, function() {
                $('#filterButton').removeClass('btn-outline-primary');
                $('#filterButton').addClass('btn-primary');
              });

            },
            function() {

              $(this).animate({
                height: "0%"
              }, 500, function() {
                $('#filterButton').removeClass('btn-primary');
                $('#filterButton').addClass('btn-outline-primary');
              });

            });


        });

        // Filter di submit
        $('#submitFilter').click(function() {
          bulanss = [];
          for (var i = 0; i < $('#filterBulan input:checked').length; i++) {
            var data = $('#filterBulan input:checked').eq(i).val();
            bulanss.push(data);
          }
          var bulan2 = JSON.stringify(bulanss);
          var tahun = $('#filterTahun').val();
          $.get('php/LihatDataRequest.php?tipe=' + 'searchFilter&bulan=' + bulan2 + '&query=' + $('.form-control#searchData').val() + '&tahun=' + tahun, function(data) {
            $('#dataPenjualan tbody').html(data);
          });
          $('#filterBulan').toggle(function() {
            $(this).animate({
              height: "0%"
            }, 500);
          });
        });


        //filter check smua button
        $('#checkedBulan').click(function() {
          // $('.filterBulan').attr('checked','checked');
          $('.filterBulan').prop('checked', true);
        });
        $('#ResetFilter').click(function() {
          $('.filterBulan').prop('checked', false);
          $("#filterTahun").val($("#filterTahun option:first").val());
        });






        //                jquery end


      });

      //Event click table
      function addActionButtonEvent() {
        //edit button table
        $('#dataPenjualan > tbody > tr > td > div > .btn-action.edit').on("click", function() {

          var id = $(this).attr('data-href');
          var dataEdit = [];
          //                        debugger;
          $.ajax({
            url: 'php/editGetter.php',
            type: 'post',
            data: {
              id: id
            },
            success: function(response) {

              dataEdit = JSON.parse(response);
              setNilaiEditDialog(dataEdit);
            },
          });
          console.log(dataEdit);

          addActionRupiah();
          $('#EditModal').modal('show');

        });

        //                delete button table
        $('#dataPenjualan > tbody > tr > td > div > a.delete').click(function() {
          var ids = $(this).attr('data-href');
          if (confirm('Yakin Menghapus data ini?')) {
            $.post("php/deleteSubmitter.php", {
                id: ids

              },
              function(data, status) {
                if (status == "success") {
                  $('#statInputMsg').html(data);
                  $('#statInputMsg').toast('show');
                  inisiateData();
                } else {
                  alert("Error tidak bisa mengirim data!");
                }

                // alert("Data: " + data + "\nStatus: " + status);
              });
          } else {
            //tidak terjadi apa apa
          }
        });

        $('#dataPenjualan > tbody > tr > td > div > a.detail').click(function() {
          var id = $(this).attr('data-href');
          $('#DetailModalBody').load("php/detailGetter.php", {
            id: id
          });
          $('#DetailModal').modal('show');
        });
      }



      function inisiateData() {
        //inisiasi tabel data
        $.get('php/LihatDataRequest.php?tipe=Init', function(data) {
          $('#dataPenjualan tbody').html(data);
          //                      console.log(data);
          addActionButtonEvent();

        });

        //inisisasi filter Grafik data


        // console.log($('#filterGrafik').val());
        //inisisasi chartJmlBeli data

      }

      function inisiateDataTables() {
        // $("#dataPenjualan").DataTable().destroy()
        $('#dataPenjualan').DataTable({
          "searching": false,
          "processing": true,
          "scrollY": "28rem",
          // "sScrollX": "100%",
          "scrollCollapse": true,
          "paging": false,
          "info": false
        });
      }




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
                if (confirm('Yakin edit data ini?')) {
                  $.post("php/editSubmitter.php", {
                      id: $('input[name ="idEdit"]').val(),
                      tipe: $('#tipe').val(),
                      nopol: $('#nopol').val(),
                      warna: $('#warna').val(),
                      tahun: $('#tahun').val(),
                      jarak_tempuh: $('#jarakTempuh').val(),
                      jenis_bbm: $('#jenisBbm').val(),
                      tglJual: $('#tglJual').val(),
                      hrgJual: $('#hrgJual').val(),
                      mediator: $('#mediator').val(),
                      feeMediator: $('#feeMediator').val(),
                      pajak: $('#pajak').val(),
                      rekondisi: $('#rekondisi').val()
                      //Nanti mengembalikan kalau berhasil di edit bernilai 1 kalau gagal nilai 0
                    },
                    function(data, status) {
                      if (status == "success") {
                        //                            console.log(typeof data);
                        //                            console.log(data);
                        $('#statInputMsg').html(data);
                        $('#statInputMsg').toast('show');
                        inisiateData();
                        $('#EditModal').modal('hide');
                        $('#formInput').removeClass('was-validated');
                      } else {
                        $('#formInput').removeClass('was-validated');
                        alert("Error tidak bisa mengirim data!");
                      }

                      // alert("Data: " + data + "\nStatus: " + status);
                    });

                  // inisiateData();
                } else {
                  $('#formInput').removeClass('was-validated');
                }
                //TODO : Tambah event ajax masukin data edit modal ke database. lalu refresh ulang table Penjualan

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