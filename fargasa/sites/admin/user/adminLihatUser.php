<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();

session_start();

$_SESSION['page'] = "user";
$_SESSION['subPage'] = "adminLihatUser";
if (!isset($_SESSION['username']) && $_SESSION['privilege'] <> 'staff') {
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


    <title>Manage User</title>
  </head>

  <body>

    <!-- navbar -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/fargasa/sites/misc/navbar/adminNavbar.php"; ?>

    <!--Toast-->
    <div class="toast" id="statInputMsg" data-delay="10000">

    </div>
    <!--end of Toast-->



    <!-- Detail Modal -->
    <div class="modal fade" id="DetailModal" tabindex="-1" aria-labelledby="DetailModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="DetailModalLabel">Detail User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body overflow-auto" id="DetailModalBody">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!--Edit Modal-->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EditModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="needs-validation" novalidate id="formInput">
            <!-- input edit-->
            <div class="modal-body overflow-auto" id="EditModalBody">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <input type="hidden" name="idEdit" value="">
                  <label for="nama" class="font-weight-bold">Nama<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nama" placeholder="Nama User" value="" required>
                  <div class="invalid-feedback">
                    Nama wajib di isi!.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="username" class="font-weight-bold">Username<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="username" placeholder="Username User" value="" required>
                  <div class="invalid-feedback">
                    Username User wajib di isi!.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="password" class="font-weight-bold">Password<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" placeholder="Password User" value="" required>
                  <div class="invalid-feedback" style="width: 100%;">
                    Password perlu di isi!.
                  </div>
                </div>
              </div>


              <div class="mb-3">
                <label for="alamat" class="font-weight-bold">Alamat <span class="text-danger">*</span></label>
                <textarea type="text" class="form-control" id="alamat" placeholder="Alamat User" value="" required></textarea>
                <div class="invalid-feedback">
                  Alamat User perlu di isi.
                </div>
              </div>

              <div class="mb-3">
                <label for="email" class="font-weight-bold">E-Mail</label>
                <input type="email" class="form-control" id="email" placeholder="E-Mail User" value="">
                <div class="invalid-feedback">
                  Error : Input E-Mail bermasalah!
                </div>
              </div>

              <div class="mb-3">
                <label for="nope" class="font-weight-bold">Nomer Telepon/HP</label>
                <input type="text" class="form-control" id="nope" placeholder="Nomer Telepon/HP User" value="" required>
                <div class="invalid-feedback">
                  Nomer Telepon/HP User perlu di isi.
                </div>
              </div>


              <div class="mb-3">
                <label for="privilege" class="font-weight-bold">Tanggal Jual<span class="text-danger">*</span></label>
                <select class="form-control" id="privilege" required>
                    <option value="admin">ADMIN</option>
                    <option value="owner">OWNER</option>
                    <option value="staff">STAFF</option>
                    <option value="sales">SALES</option>
                    <option value="pelanggan">PELANGGAN</option>
                </select>
                <div class="invalid-feedback">
                  Privilege perlu di isi.
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit" id="submitDB" data-target="#konfirmasiModal">Save changes</button>
              <!--<button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Simpan Data Penjualan</button>-->
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End of Modal-->


    <div class="container mb-3">
      <div class="">
        <!--border-->
        <div class="row justify-content-between d-flex align-items-center">
          <div class="col order-1">
            <div class="form-inline my-2 float-right responsive-text">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchData">


            </div>
          </div>
          <div class="col order-0">
                <div id="action-button" class="responsive-text" style="height: 100%">
                    <a href="adminInputUser.php"><button class="btn btn-outline-dark" title="Tambah User"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button></a>
                    
                </div>
            </div>
        </div>
      </div>




      <!-- <div  class="scrollTable"> -->
      <table class="table table-striped table-hover table-bordered responsive-text table-responsive-md" id="dataPenjualan" style="">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">No Hp</th>
            <th scope="col">Privilege</th>
            <th scope="col">Aksi</th>
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
        <!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
              </svg> -->
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

        // $('#filterButton').toggle(
        //     function(){
        //         $('#panel').animate({
        //             height: "150", 
        //             padding:"20px 0",
        //             backgroundColor:'#000000',
        //             opacity:.8
        //         }, 500);

        //     },
        //     function(){
        //         $('#panel').animate({
        //             height: "0", 
        //             padding:"0px 0",
        //             opacity:.2
        //         }, 500);     

        // });


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

        // $('input.filterBulan').click(function(){
        //   if($(this).is(':checked')){
        //     $(this).attr('checked','checked');
        //   }else{
        //     $(this).removeAttr('checked');
        //   }
        // });
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

      function setNilaiEditDialog(data) {

        $('input[name ="idEdit"]').val(data[0]);
        $('#nama').val(data[1]);
        $('#username').val(data[2]);
        $('#password').val(data[3]);
        $('#email').val(data[4]);
        $('#nope').val(data[5]);
        $('#privilege').val(data[6]);
        $('#alamat').html(data[7]);
        
      }

      function inisiateData() {
        //inisiasi tabel data
        $.get('php/LihatDataRequest.php?tipe=Init', function(data) {
          $('#dataPenjualan tbody').html(data);
          //                      console.log(data);
          addActionButtonEvent();

        });

        //inisisasi filter Grafik data
        $.get('php/TahunGetter.php', function(data) {
          $('#filterTahun').html('<option>SEMUA TAHUN</option>' + data);
          $('#filterGrafik').html(data);
          var dd = $('#filterGrafik');
          var tahunTerbaru = $('#filterGrafik > option').eq(dd.length - 1).val();
          // dd.val(tahunTerbaru);
          dd.val(tahunTerbaru);
          // console.log(dd.val());
          // console.log(tahunTerbaru);

          updateChart(tahunTerbaru);
          // updateChart(tahunTerbaru);
        });
        // console.log($('#filterGrafik').val());
        //inisisasi chartJmlBeli data

      }

      

      //Rubah input ke rupiah
      //update Chart Event
      function updateChart(tahun) {
        $.get('php/chartMaker.php?tahun=' + tahun + "&tipe=chartJmlJual", function(data) {
          var result = jQuery.parseJSON(data);
          var masukan = result[0].split(",");
          chartJmlJual.config.options.scales.yAxes[0].ticks.max = result[1] + 10 - (result[1] % 10);
          chartJmlJual.data.datasets[0].data = masukan;
          chartJmlJual.update();
        });

        $.get('php/chartMaker.php?tahun=' + tahun + "&tipe=chartJmlHarga", function(data) {
          var result = jQuery.parseJSON(data);
          var masukan = result[0].split(",");
          // debugger;
          for (var i = masukan.length - 1; i >= 0; i--) {
            masukan[i] = masukan[i] / 1000000;
          }
          var maxPerJuta = result[1] / 1000000;
          chartJmlHarga.config.options.scales.yAxes[0].ticks.max = maxPerJuta + 100 - (maxPerJuta % 100);
          // chartJmlHarga.config.options.scales.yAxes[0].ticks.max = 500;
          chartJmlHarga.data.datasets[0].data = masukan;
          chartJmlHarga.update();
        });
      }


      function addActionRupiah() {
        var uang = document.getElementsByClassName("rupiah");
        for (var i = 0; i < uang.length; i++) { // loop over them
          uang[i].addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            this.value = formatRupiah(this.value, 'Rp. ');
          });
        }
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
      //        fungsi formedit
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
                      nama: $('#nama').val(),
                      username: $('#username').val(),
                      password: $('#password').val(),
                      alamat: $('#alamat').val(),
                      email: $('#email').val(),
                      nope: $('#nope').val(),
                      privilege: $('#privilege').val()
                      
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