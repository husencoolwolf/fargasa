<?php
include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
if(!isset($_SESSION['username']) && $_SESSION['privilege']<>'staff'){
    ?>
    <script language="JavaScript">
        alert('Session Telah Habis!!\nAnda harus login untuk mengakses halaman ini!!');
        document.location.href='/';
    </script>
    <?php
}else{
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" type="image/png" href="/assets/Fargasa Logo Circle.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/dist/font-awesome-4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="/dist/css/bootstrap.css">

    <title>Input Pembelian</title>
  </head>
  <body>
      <div class="bg-white border-dark" id="excelForm">
          <div class="p-4">
            <a href=""><button class="btn btn-info"><h5>Download Template untuk melakukan Multi Input</h5></button>
          </div>
          <div class="d-flex text-center align-items-center justify-content-center h-100">
              <!--<button>Test</button>-->
              <div class="border border-success p-3">
                <h3>Masukkan File Excel untuk di input</h3>
                <br>
                <form action="php/excelReadAction.php" id="Form-Excel" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <input type="file" class="form-control-file" accept=".xls, .xlsx" name="fileExcel" id="excelInput">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" id="uploadSubmit">
                    </div>
                    
                    
                  
                  <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      </div>
                  </div>
                  <div id="statusUpload"></div>
                </form>
              </div>
          </div>
      </div>
    
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
          <img class="" src="/assets/Fargasa Logo Circle.png" alt="Dashboard">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Dashboard </a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="#">Cek Stok</a>
            </li>
            
            <li class="nav-item px-3 dropdown active">
              <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdownPembelian" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pembelian
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownPembelian">
                  <a class="dropdown-item" href="/sites/staff/pembelian/staffLihatPembelian.php">Lihat Pembelian</a>
                <a class="dropdown-item active font-weight-bold" href="/sites/staff/pembelian/staffInputPembelian.php">Input Pembelian<span class="sr-only">(current)</span></a>
              </div>
            </li>
            <li class="nav-item px-3 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPenjualan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Penjualan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownPenjualan">
                <a class="dropdown-item" href="#">Lihat Penjualan</a>
                <a class="dropdown-item" href="#">Input Penjualan</a>
              </div>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="#">Laporan</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item px-3 dropdown">
              <a class="nav-link dropdown-toggle text-primary font-weight-bold" href="#" id="navbarDropdownAkun" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo strtoupper($_SESSION['nama']); ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownAkun">
                <a class="dropdown-item" href="#">Profil</a>
                <a class="dropdown-item text-danger" href="/sesDes.php">Logout</a>
              </div>
            </li>
          </ul>
            
        </div>
      </nav>
      
      <h1><span class="badge badge-info mt-3 ml-3 px-5">Input Pembelian</span></h1>
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
      <button class="btn bg-success text-white" id="ExcelBtn" title="Input Excel" style="position: fixed; right: 0px;top: 50%;z-index:3;">
          <i class="fa fa-file-excel-o" aria-hidden="true"></i>
        </button>
      
      <div class="container">
          <div class="text-left">
              
                <div class="col align-self-center order-md-1">
                    <form class="needs-validation" novalidate id="formInput">
                  <div class="row">
                    
                    <div class="col-md-6 mb-3">
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
                      <input type="text" class="form-control" id="warna" placeholder="Warna Mobil" required>
                      <div class="invalid-feedback" style="width: 100%;">
                        Warna perlu di isi!.
                      </div>
                    </div>
                  </div>
                        

                  <div class="mb-3">
                    <label for="tahun" class="font-weight-bold">Tahun <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="tahun" placeholder="Tahun Mobil" required>
                    <div class="invalid-feedback">
                      Tahun perlu di isi.
                    </div>
                  </div>


                  <div class="mb-3">
                    <label for="tglBeli" class="font-weight-bold">Tanggal Beli<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tglBeli" placeholder="" required>
                  </div>
                        
                  <div class="mb-3">
                    <label for="hrgBeli" class="font-weight-bold">Harga Beli<span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah" id="hrgBeli" placeholder="Harga Beli" required>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="mediator" class="font-weight-bold live-search-input">Mediator</label>
                        <input type="text" class="form-control live-search-input" id="mediator" placeholder="Mediator Beli">
                        <div class="list-group liveSearch" id="mediatorSearch"></div>
                      <div class="invalid-feedback">
                        Mediator wajib di isi!.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="feeMediator" class="font-weight-bold">Fee Mediator</label>
                        <input type="text" class="form-control rupiah" id="feeMediator" placeholder="Fee Mediator">
                      <div class="invalid-feedback">
                        Fee Mediator Error!.
                      </div>
                    </div>
                  </div>
                    
                  <div class="mb-3">
                    <label for="pajak" class="font-weight-bold">Pajak</label>
                    <input type="number" class="form-control" id="pajak" placeholder="Bulan Pajak">
                    <div class="invalid-feedback">
                      Pajak perlu di isi.
                    </div>
                  </div>
                    
                    
                  <div class="mb-5">
                    <label for="rekondisi" class="font-weight-bold">Rekondisi</label>
                    <input type="text" class="form-control rupiah" id="rekondisi" placeholder="Biaya Rekondisi">
                    <div class="invalid-feedback">
                      rekondisi mengalami kesalahan!!!.
                    </div>
                  </div>
                  
                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Simpan Data Pembelian</button>
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
      


<!--<div class="moreHeight"></div>-->
      
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    
    <script src="/dist/js/jquery-3.5.1.js"></script>
    <script src="/dist/js/bootstrap.js"></script>
    <script src="/dist/js/jquery.form.js"></script>
    <script>
        $(document).ready(function(){
            $("#myBtn").click(function(){
              $('.toast').toast('show');
            });
            $('#statInputMsg').click(function(){
                $(this).toast('hide');
            });
            
            $('#submitDB').on('click', function(){
                $('#statInputMsg').load("php/SubmitterData.php",{
                    
                    tipe: document.getElementById('tipe').value,
                    nopol: document.getElementById('nopol').value,
                    warna: document.getElementById('warna').value,
                    tahun: document.getElementById('tahun').value,
                    tgl_beli: document.getElementById('tglBeli').value,
                    hrg_beli: document.getElementById('hrgBeli').value,
                    mediator: document.getElementById('mediator').value,
                    feeMediator: document.getElementById('feeMediator').value,
                    pajak: document.getElementById('pajak').value,
                    rekondisi: document.getElementById('rekondisi').value
                });
                $('#KonfirmasiModal').modal('hide');
                
                $('.toast').toast('show');
                $("#formInput")[0].reset();
                $("#formInput").removeClass('was-validated');
                
                
            });
            
            
//            autoSearch
//            Autosearch v1
            $('.form-control.live-search-input').on('keyup', function(){
                var jenis = $(this).attr('id');
                var inputForm = $(this);
                
                if($(this).val().length > 1){
                    $.get('php/liveSearch.php?query='+$(this).val()+'&jenis='+jenis , function(data){
    //                  debugger;
                        $('#'+jenis+'Search').html(data);
                        $('#'+jenis+'Search').show();
                        $('.src-value').on('click', function(){
                                var selected = $(this).html();
                                inputForm.val(selected);
                                $('#'+jenis+'Search').hide();
                                $('#'+jenis+'Search').html("");
                        });
                        $('body').on('click', function(){
                                $('#'+jenis+'Search').hide();
                                $('#'+jenis+'Search').html("");
                        });
                        
                    });
                }else{
                    $('#'+jenis+'Search').html("");
                    $('#'+jenis+'Search').hide();
                }
                
            });
            
            $('.form-control.live-search-input').focusin(function(){
               if($(this).val() > 1){
                   $('#'+$(this).attr('id')+'Search').show();
               }
            });
            
            $('.body').click(function(){
                   $('#'+$(this).attr('id')+'Search').hide();
               
            });
//            
            //end of autosearch
//            Top Scroll button event
            $('#topJumpBtn').each(function(){
                    $(this).click(function(){ 
                        $('html,body').animate({ scrollTop: 0 }, 'slow');
                        return false; 
                    });
                });
//                end of Top Scroll button event
//            ExcelFormButtonEvent
            $('#ExcelBtn').on('click', function(){
                if($(this).css('right')== '0px'){
                    $('#excelForm').show();
                    $(this).animate({ right: '50%' });
                    $('#excelForm').animate({ width: "50%" });
                    $('#excelForm').addClass('border');
                }else{
                    $(this).animate({ right: '0px' });
                    $('#excelForm').animate({ width: '0' }, function(){
                        $('#excelForm').removeClass('border');
                        $('#excelForm').hide();
                    });
                    
                }
                
//                var tataButton = $(this).css('right') == '0px' ? "30%" : "0px";
//                $(this).animate({ right: tataButton });
//                
//               var toggleWidth = $("#excelForm").width() == 0 ? "30%" : "0";
//               $('#excelForm').animate({ width: toggleWidth });
            });
//            end of ExcelFormButtonEvent
            
            //Excel Reader upload
            $('#Form-Excel').submit(function(event){
                if($('#excelInput').val()){
                    event.preventDefault();
                    $(this).ajaxSubmit({
                        target: '#statusUpload',
                        beforeSubmit:function(){
                            $('.progress-bar').width('0%');
                        },
                        uploadProgress: function(event, position, total, percentageComplete){
                            $('.progress-bar').animate({
                                width: percentageComplete + '%'
                            },{
                                duration: 1000
                            });
                        },
                        success: function(){
                            
                        },
                        resetForm: true
                    });
                }
                return false;
            });
            
            
            //end of Excel Reader upload
        });
        //end of jquery
        
        
        //Rubah input ke rupiah
                var uang = document.getElementsByClassName("rupiah");
                for (var i = 0; i < uang.length; i++) { // loop over them
                    uang[i].addEventListener('keyup', function(e){
                            // tambahkan 'Rp.' pada saat form di ketik
                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                            this.value = formatRupiah(this.value, 'Rp. ');
                    });
                  }
                
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
        
        //validator bootstrap
        (function () {
            'use strict'

            window.addEventListener('load', function () {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation')

              // Loop over them and prevent submission
              Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault()
                    event.stopPropagation()
                  }
                  else{
                      event.preventDefault()
                      event.stopPropagation()
                      
                      $('#KonfirmasiModalBody').load("php/getterConfirm.php",{
                          
                          tipe: document.getElementById('tipe').value,
                          nopol: document.getElementById('nopol').value,
                          warna: document.getElementById('warna').value,
                          tahun: document.getElementById('tahun').value,
                          tgl_beli: document.getElementById('tglBeli').value,
                          hrg_beli: document.getElementById('hrgBeli').value,
                          mediator: document.getElementById('mediator').value,
                          feeMediator: document.getElementById('feeMediator').value,
                          pajak: document.getElementById('pajak').value,
                          rekondisi: document.getElementById('rekondisi').value
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