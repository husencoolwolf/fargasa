<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();

session_start();

$_SESSION['page'] = "user";
$_SESSION['subPage'] = "staffLihatUser";
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


    <title>Data Pelanggan</title>
  </head>

  <body>

    <!-- navbar -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/fargasa/sites/misc/navbar/staffNavbar.php"; ?>

    <!--Toast-->
    <div class="toast" id="statInputMsg" data-delay="10000">

    </div>
    <!--end of Toast-->



    <!-- Detail Modal -->
    <div class="modal fade" id="DetailModal" tabindex="-1" aria-labelledby="DetailModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="DetailModalLabel">Detail Mobil</h5>
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
                  <label for="tipe" class="font-weight-bold">Tipe<span class="text-danger">*</span></label>
                  <input type="text" class="form-control live-search-input" id="tipe" placeholder="Tipe Mobil" value="" required>
                  <div class="list-group liveSearch" id="tipeSearch"></div>
                  <div class="invalid-feedback">
                    Tipe wajib di isi!.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="nopol" class="font-weight-bold">Nomor Polisi<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nopol" placeholder="A 0000 AAA" value="" required>
                  <div class="invalid-feedback">
                    Nopol wajib di isi!.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="warna" class="font-weight-bold">Warna<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" id="warna" placeholder="Warna Mobil" value="" required>
                  <div class="invalid-feedback" style="width: 100%;">
                    Warna perlu di isi!.
                  </div>
                </div>
              </div>


              <div class="mb-3">
                <label for="tahun" class="font-weight-bold">Tahun <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="tahun" placeholder="Tahun Mobil" value="" required>
                <div class="invalid-feedback">
                  Tahun perlu di isi.
                </div>
              </div>

              <div class="mb-3">
                <label for="jarakTempuh" class="font-weight-bold">Jarak Tempuh</label>
                <input type="number" class="form-control" id="jarakTempuh" placeholder="Jarak Tempuh Mobil" value="">
                <div class="invalid-feedback">
                  Error : Input Jarak temput bermasalah!
                </div>
              </div>

              <div class="mb-3">
                <label for="jenisBbm" class="font-weight-bold">Jenis BBM</label>
                <input type="text" class="form-control" id="jenisBbm" placeholder="Jenis BBM Mobil" value="">
                <div class="invalid-feedback">
                  Error : Input Jenis BBM bermasalah!
                </div>
              </div>


              <div class="mb-3">
                <label for="tglJual" class="font-weight-bold">Tanggal Jual<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="tglJual" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Tanggal Beli perlu di isi.
                </div>
              </div>



              <div class="mb-3">
                <label for="hrgJual" class="font-weight-bold">Harga Jual<span class="text-danger">*</span></label>
                <input type="text" class="form-control rupiah" id="hrgJual" placeholder="Harga Jual" value="" required>
                <div class="invalid-feedback">
                  Harga Jual perlu di isi.
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="mediator" class="font-weight-bold live-search-input">Mediator</label>
                  <input type="text" class="form-control live-search-input" id="mediator" placeholder="Mediator Beli" value="">
                  <div class="list-group liveSearch" id="mediatorSearch"></div>
                  <div class="invalid-feedback">
                    Mediator Error!.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="feeMediator" class="font-weight-bold">Fee Mediator</label>
                  <input type="text" class="form-control rupiah" id="feeMediator" placeholder="Fee Mediator" value="">
                  <div class="invalid-feedback">
                    Fee Mediator Error!.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="pajak" class="font-weight-bold">Pajak</label>
                <input type="text" class="form-control rupiah" id="pajak" placeholder="Bulan Pajak" value="">
                <div class="invalid-feedback">
                  Pajak perlu di isi.
                </div>
              </div>


              <div class="mb-5">
                <label for="rekondisi" class="font-weight-bold">Rekondisi</label>
                <input type="text" class="form-control rupiah" id="rekondisi" placeholder="Biaya Rekondisi" value="">
                <div class="invalid-feedback">
                  rekondisi mengalami kesalahan!!!.
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
        </div>
      </div>




      <!-- <div  class="scrollTable"> -->
      <table class="table table-striped table-hover table-bordered responsive-text table-responsive-md" id="dataUser" style="">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">No Hp</th>
            <th scope="col">Alamat</th>
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






        //livesearch Data Penjualan
        $('.form-control#searchData').on('keyup', function() {
            var tipe = "";
            if ($(this).val().length == 0) {
              tipe = "Init";
              $.get('php/LihatDataRequest.php?tipe=' + tipe, function(data) {
                $('#dataUser tbody').html(data);
                addActionButtonEvent();
              });
            } else {
              tipe = "search";
              $.get('php/LihatDataRequest.php?query=' + $(this).val() + '&tipe=' + tipe, function(data) {
                $('#dataUser tbody').html(data);
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
            $('#dataUser tbody').html(data);
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
        
//detail button event
        $('#dataUser > tbody > tr > td > div > a.detail').click(function() {
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
          $('#dataUser tbody').html(data);
          //                      console.log(data);
          addActionButtonEvent();

        });


          // updateChart(tahunTerbaru);
       
        // console.log($('#filterGrafik').val());
        //inisisasi chartJmlBeli data

      }


      //Rubah input ke rupiah

      


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
      
    </script>

  </body>

  </html>
<?php

}
?>