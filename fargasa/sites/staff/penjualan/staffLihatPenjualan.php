<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();

session_start();

$_SESSION['page'] = "penjualan";
$_SESSION['subPage'] = "staffLihatPenjualan";
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


    <title>Lihat Penjualan</title>
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
                  <input type="text" class="form-control live-search-input" id="tipe" placeholder="Tipe Mobil" value="" required disabled>
                  <div class="list-group liveSearch" id="tipeSearch"></div>
                  <div class="invalid-feedback">
                    Tipe wajib di isi!.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="nopol" class="font-weight-bold">Nomor Polisi<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nopol" placeholder="A 0000 AAA" value="" required disabled>
                  <div class="invalid-feedback">
                    Nopol wajib di isi!.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="warna" class="font-weight-bold">Warna<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" id="warna" placeholder="Warna Mobil" value="" required disabled>
                  <div class="invalid-feedback" style="width: 100%;">
                    Warna perlu di isi!.
                  </div>
                </div>
              </div>


              <div class="mb-3">
                <label for="tahun" class="font-weight-bold">Tahun <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="tahun" placeholder="Tahun Mobil" value="" required disabled>
                <div class="invalid-feedback">
                  Tahun perlu di isi.
                </div>
              </div>

              <div class="mb-3">
                <label for="jarakTempuh" class="font-weight-bold">Harga Jual</label>
                <input type="text" class="form-control rupiah" id="hrgJual" placeholder="Harga Penjualan" value="" required>
                <div class="invalid-feedback">
                  Harga Penjualan Harus Di isi!
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="sales" class="font-weight-bold live-search-input">Sales</label>
                  <input type="text" class="form-control live-search-input" id="sales" placeholder="Sales Jual" value="" required>
                  <div class="list-group liveSearch" id="salesSearch"></div>
                  <div class="invalid-feedback">
                    Sales Wajib diisi!.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="feeSales" class="font-weight-bold">Fee Sales</label>
                  <input type="text" class="form-control rupiah" id="feeSales" placeholder="Fee Sales Jual" value="">
                  <div class="invalid-feedback">
                    Fee Sales Error!.
                  </div>
                </div>
              </div>


              <div class="mb-3">
                <label for="tglJual" class="font-weight-bold">Tanggal Jual<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="tglJual" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Tanggal Jual perlu di isi.
                </div>
              </div>


              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="mediator" class="font-weight-bold live-search-input">Mediator</label>
                  <input type="text" class="form-control live-search-input" id="mediator" placeholder="Mediator Jual" value="">
                  <div class="list-group liveSearch" id="mediatorSearch"></div>
                  <div class="invalid-feedback">
                    Mediator Error!.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="feeMediator" class="font-weight-bold">Fee Mediator</label>
                  <input type="text" class="form-control rupiah" id="feeMediator" placeholder="Fee Mediator Jual" value="">
                  <div class="invalid-feedback">
                    Fee Mediator Error!.
                  </div>
                </div>
              </div>
                
                <div class="mb-3">
                    <label for="pajak" class="font-weight-bold">Leasing</label>
                    <input type="text" class="form-control" id="leas" placeholder="Perusahaan Leasing" value="">
                    <div class="invalid-feedback">
                      Leasing Error!.
                    </div>
                </div>
                
              <div class="mb-3">
                <label for="tenor" class="font-weight-bold">Tenor</label>
                <input type="number" class="form-control" id="tenor" placeholder="Lama Angsuran Leasing" value="">
                <div class="invalid-feedback">
                  Tenor Error!.
                </div>
              </div>


              <div class="mb-5">
                <label for="rekondisi" class="font-weight-bold">Refund / Bunga</label>
                <input type="text" class="form-control rupiah" id="refund" placeholder="Refund / Bunga dari Leasing" value="">
                <div class="invalid-feedback">
                  Refund mengalami kesalahan!!!.
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

    <!--Chart-->
    <div class="container">
      <div class="d-flex tabs justify-content-between align-items-center">
        <ul class="nav nav-tabs h-100" style="overflow-x: auto;flex-wrap: nowrap;overflow-y: hidden;">
          <li class="nav-item">
            <a class="nav-link active" style="cursor: pointer">Banyak Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " style="cursor: pointer">Total Penjualan</a>
          </li>
          <!-- <li class="nav-item">
                <a class="nav-link " style="cursor: pointer">Total Penjualan</a>
            </li> -->
        </ul>
        <ul class="px-2 m-0">
          <select class="form-control form-control-sm" id="filterGrafik">
            <option disabled selected value>Default</option>
            <option>tes</option>
          </select>
        </ul>
      </div>


      <!-- FilterGrafik -->


      <div id="Charts" class="border-bottom border-right border-left rounded-bottom shadow" style="border-color: rgb(222, 226, 230);">

        <div id="morrisChartJmlPenjualan" style="height: 20rem" class="">
          <canvas id="chartJmlJual"></canvas>
        </div>
        <div id="morrisChartJmlHarga" style="height: 20rem" class="">
          <canvas id="chartJmlHarga"></canvas>
        </div>
      </div>

    </div>
    <hr>



    <div class="container mb-3">
      <div class="shadow-lg p-2">
        <!--border-->
        <div class="row justify-content-between d-flex align-items-center">
          <div class="col order-1">
            <div class="form-inline my-2 float-right responsive-text">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchData">
              <button class="btn btn-outline-primary my-2" id="filterButton" type="submit"><i class="fa fa-filter" aria-hidden="true"></i></button>

            </div>

          </div>
          <div class="col order-0">
            <div id="action-button" class="responsive-text" style="height: 100%">
              <a href="staffInputPenjualan.php"><button class="btn btn-outline-dark" title="Tambah Data"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button></a>

            </div>
          </div>
        </div>
        <div id="filterBulan" class="border border-primary mb-2">
          <!-- filter Bulan -->
          <!-- Tahun -->
          <div class="row mt-2 mb-2 p-2">
            <div class="col-md">
              <div class="form-group">
                <label for="filterTahun ml-2">Tahun</label>
                <select class="form-control" id="filterTahun">
                  <option>Semua Tahun</option>

                </select>
              </div>
            </div>

          </div>
          <!-- Bulan -->
          <!-- Januari -->
          <div class="row mb-2 p-2">
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="1" id="filter-januari">
                <label class="form-check-label" for="filter-januari">
                  Januari
                </label>
              </div>
            </div>
            <!-- februari -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="2" id="filter-februari">
                <label class="form-check-label" for="filter-februari">
                  Februari
                </label>
              </div>
            </div>
            <!-- Maret -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="3" id="filter-maret">
                <label class="form-check-label" for="filter-maret">
                  Maret
                </label>
              </div>
            </div>
            <!-- April -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="4" id="filter-april">
                <label class="form-check-label" for="filter-april">
                  April
                </label>
              </div>
            </div>
            <!-- Mei -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="5" id="filter-mei">
                <label class="form-check-label" for="filter-mei">
                  Mei
                </label>
              </div>
            </div>
            <!-- Juni -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="6" id="filter-juni">
                <label class="form-check-label" for="filter-juni">
                  Juni
                </label>
              </div>
            </div>
            <!-- end of row -->
          </div>
          <div class="row mb-2 p-2">
            <!-- Juli -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="7" id="filter-juli">
                <label class="form-check-label" for="filter-juli">
                  Juli
                </label>
              </div>
            </div>
            <!-- Agustus -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="8" id="filter-agustus">
                <label class="form-check-label" for="filter-agustus">
                  Agustus
                </label>
              </div>
            </div>
            <!-- September -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="9" id="filter-september">
                <label class="form-check-label" for="filter-september">
                  September
                </label>
              </div>
            </div>
            <!-- Oktober -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="10" id="filter-oktober">
                <label class="form-check-label" for="filter-oktober">
                  Oktober
                </label>
              </div>
            </div>
            <!-- November -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="11" id="filter-november">
                <label class="form-check-label" for="filter-november">
                  November
                </label>
              </div>
            </div>
            <!-- Desember -->
            <div class="col-md">
              <div class="form-check">
                <input class="form-check-input filterBulan" type="checkbox" value="12" id="filter-desember">
                <label class="form-check-label" for="filter-desember">
                  Desember
                </label>
              </div>
            </div>
            <!-- end of row 2 -->
          </div>
          <div class="row my-2 justify-content-between px-2">
            <div class="col-md-auto my-2">
              <button class="btn btn-info" id="checkedBulan">Ceklis Semua</button>
              <button class="btn btn-secondary" id="ResetFilter">Reset</button>
            </div>
            <div class="col-md-auto my-2">
              <button class="btn btn-primary" id="submitFilter">Filter</button>
            </div>
          </div>

        </div>


        <!-- <div  class="scrollTable"> -->
        <table class="table table-striped table-hover table-bordered responsive-text table-responsive-md" id="dataPenjualan" style="">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Merk/Tipe</th>
              <th scope="col">Tahun</th>
              <th scope="col">Warna</th>
              <th scope="col">Tgl Beli</th>
              <th scope="col">Tgl Jual</th>
              <th scope="col">Nopol</th>
              <th scope="col">Hrg Beli</th>
              <th scope="col">Hrg Jual</th>
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
//        inisiateDataTables();
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

        $('#filterGrafik').on('change', function() {
          // event ajax filter grafik morris
          updateChart($(this).val());

          // $.get('php/chartMaker.php?tahun='+$(this).val()+"&tipe=chartJmlHarga" , function(data){
          //     var result = jQuery.parseJSON(data)
          //     // console.log(result);
          //     var stringifys = JSON.stringify('['+result[0]+']');
          //     // console.log(stringifys);
          //     // console.log("parse sekali : "+jQuery.parseJSON(stringifys));
          //     // console.log("parse dua kali : "+ jQuery.parseJSON(jQuery.parseJSON(stringifys)));
          //     chartJmlHarga.options["ymax"] = result[1] + 10 -(result[1]%10);
          //     chartJmlHarga.setData(jQuery.parseJSON(jQuery.parseJSON(stringifys)));
          //     chartJmlHarga.options["xkey"] = "Bulan";
          // });

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
//          console.log(dataEdit);

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
        $('#tipe').val(data[1]);
        $('#nopol').val(data[2]);
        $('#warna').val(data[3]);
        $('#tahun').val(data[4]);
        $('#hrgJual').val(data[5]);
        $('#sales').val(data[6]);
        $('#feeSales').val(data[10]);
        $('#tglJual').val(data[8]);
        $('#mediator').val(data[7]);
        $('#feeMediator').val(data[9]);
        $('#leas').val(data[11]);
        $('#tenor').val(data[12]);
        $('#refund').val(data[13]);

        //                    $('#gambarEdit').attr('src',data[15]);
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

//      function inisiateDataTables() {
//        // $("#dataPenjualan").DataTable().destroy()
//        $('#dataPenjualan').DataTable({
//          "searching": false,
//          "processing": true,
//          "scrollY": "28rem",
//          // "sScrollX": "100%",
//          "scrollCollapse": true,
//          "paging": false,
//          "info": false,
//          "ordering": false
//        });
//      }

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
                      id:  $('input[name ="idEdit"]').val(),
                      hrgJual:  $('#hrgJual').val(),
                      sales:  $('#sales').val(),
                      feeSales:  $('#feeSales').val(),
                      tglJual:  $('#tglJual').val(),
                      mediator:  $('#mediator').val(),
                      feeMediator:  $('#feeMediator').val(),
                      leas:  $('#leas').val(),
                      tenor:  $('#tenor').val(),
                      refund:  $('#refund').val()
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