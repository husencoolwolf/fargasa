<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
$tahunData = $conn->tahunGetter();
$indTahunTerbaru = count($tahunData) - 1;
$dataChart = $conn->chartMaker($tahunData[$indTahunTerbaru]);
$dataChartTotalPembelian = $conn->ChartTotalPembelianBulanan($tahunData[$indTahunTerbaru]);

session_start();

$_SESSION['page'] = "pembelian";
$_SESSION['subPage'] = "staffLihatPenawaran";
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
        <!--<link rel="stylesheet" href="/fargasa/dist/DataTables/datatables.min.css">-->


        <title>Lihat Penawaran</title>
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
                        <button type="button" class="btn btn-success updateStatus" data-dismiss="modal" data-action="selesai">Tandai Selesai</button>
                        <button type="button" class="btn btn-danger updateStatus" data-dismiss="modal" data-action="dibatalkan">Tandai Cancel</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <div class="container mb-3 mt-5">
            <div class="shadow-lg p-2">
                <!--border-->
                <div class="row justify-content-between d-flex align-items-center">
                    <div class="col order-1">
                        <div class="form-inline my-2 float-right responsive-text">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchData">
                            <button class="btn btn-outline-primary my-2" id="filterButton" type="submit"><i class="fa fa-filter" aria-hidden="true"></i></button>

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
                <table class="table table-striped table-hover table-bordered responsive-text table-responsive-md" id="dataPembelian" style="">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama Penawar</th>
                            <th scope="col">Merk/Tipe</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Harga Penawaran</th>
                            <th scope="col">Status</th>
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



                //                Chart 1
                // chartJmlBeli = new Morris.Bar({
                //     element: 'morrisChartJmlPembelian',
                //     data: [<?php echo ($dataChart[0]); ?>
                //     ],
                //     xkey: 'b',
                //     ykeys: ['t'],
                //     hideHover: 'auto',
                //     ymax: <?php echo ($dataChart[1] + 10 - ($dataChart[1] % 10)); ?>,
                //     labels: ['Transaksi']
                // });

                // var months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

                // chartJmlHarga= new Morris.Line({
                //   element: 'morrisChartJmlHarga',
                //   data: [<?php echo ($dataChartTotalPembelian[0]); ?>],
                //   xkey: 'Bulan',
                //   ykeys: ['TtlPembelian'],
                //   hideHover: 'auto', 
                //   labels: ['Total Pembelian'],
                //   xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
                //     var month = months[x.getMonth()];
                //     return month;
                //   },

                //   dateFormat: function(x) {
                //     var month = months[new Date(x).getMonth()];
                //     return month;
                //   },
                // });

                $('#Charts > div').hide();
                $('#Charts > div').eq(0).show();
                //livesearch Data Pembelian
                $('.form-control#searchData').on('keyup', function() {
                    if (bulanss.length == 0 || bulanss.length == 12) {
                        var tipe = "";
                        if ($(this).val().length == 0) {
                            tipe = "Init";
                            $.get('php/LihatDataRequest.php?tipe=' + tipe, function(data) {
                                $('#dataPembelian tbody').html(data);
                                addActionButtonEvent();
                            });
                        } else {
                            tipe = "search";
                            $.get('php/LihatDataRequest.php?query=' + $(this).val() + '&tipe=' + tipe, function(data) {
                                $('#dataPembelian tbody').html(data);
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
                            $('#dataPembelian tbody').html(data);
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
                        $('#dataPembelian tbody').html(data);
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
                
                
                $('.updateStatus').click(function(){
                    var id = $('#core-penawaran').data('id');
                    var aksi = $(this).data('action');
                    if (confirm('Yakin Mengganti status menjadi '+aksi+', data ini?')) {
                        $.post("php/updateSubmitter.php", {
                                id: id,
                                aksi: aksi

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
                    }
                });




                //                jquery end


            });

            //Event click table
            function addActionButtonEvent() {

                //                delete button table
                $('#dataPembelian > tbody > tr > td > div > a.delete').click(function() {
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

                $('#dataPembelian > tbody > tr > td > div > a.detail').click(function() {
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
                $('#jarakTempuh').val(data[5]);
                $('#jenisBbm').val(data[6]);
                $('#tglBeli').val(data[8]);
                $('#hrgBeli').val(data[9]);
                $('#hrgJual').val(data[10]);
                $('#mediator').val(data[7]);
                $('#feeMediator').val(data[11]);
                $('#pajak').val(data[12]);
                $('#rekondisi').val(data[13]);
                //                    $('#gambarEdit').attr('src',data[15]);
            }

            function inisiateData() {
                //inisiasi tabel data
                $.get('php/LihatDataRequest.php?tipe=Init', function(data) {
                    $('#dataPembelian tbody').html(data);
                    //                      console.log(data);
                    addActionButtonEvent();

                });
            }
               

            

            //Rubah input ke rupiah
            //update Chart Event
            


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
            
            
        </script>

    </body>

    </html>
<?php

}
?>