<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';
// $pageName = "pembelian";
// $subPageName = "adminInputPembelian";
$conn = new createCon();
$con = $conn->connect();
session_start();
$_SESSION['page'] = "pembelian";
$_SESSION['subPage'] = "adminInputPembelian";
if(!isset($_SESSION['username']) && $_SESSION['privilege']<>'admin'){
    ?>
    <script language="JavaScript">
        alert('Session Telah Habis!!\nAnda harus login untuk mengakses halaman ini!!');
        document.location.href='/fargasa/index.php?action=login';
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
    <link rel="icon" type="image/png" href="/fargasa/assets/Fargasa Logo Circle.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fargasa/dist/font-awesome-4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">

    <title>Input Pembelian</title>
  </head>
  <body>
      <div class="bg-white border-dark" id="excelForm">
          <div class="d-flex text-center justify-content-center">
            <div class="p-4">
              <a href="/fargasa/assets/MULTI INPUT PEMBELIAN TEMPLATE.xls" target="_blank"><button class="btn btn-info"><h5>Download Template untuk melakukan Multi Input <i class="fa fa-download" aria-hidden="true"></i></h5></button></a>
            </div>
          </div>
          <div class="d-flex text-center align-items-center justify-content-center" id="ExcelDivBox">
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
      <!-- navbar -->
      <?php include_once $_SERVER['DOCUMENT_ROOT']."/fargasa/sites/misc/navbar/adminNavbar.php";?>
      
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
                    <div class="row justify-content-center shadow py-3 my-4">
                        <div>
                            <img width="100" height="100" class="img-fluid border border-dark mb-4" src="/fargasa/assets/gambar/default.png" id="imgThumbnailPreview">
                        </div>
                        <input class="form-control" type="file" accept="image/*" name="gambar" id="gambar" onchange="previewImage('gambar','imgThumbnailPreview')" data-url="">
                        <label class="mb-4" for="gambar">Upload Gambar</label>

                    </div>
                        
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
                    <label for="tglBeli" class="font-weight-bold">Tanggal Beli<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tglBeli" placeholder="" required>
                  </div>
                        
                  <div class="mb-3">
                    <label for="hrgBeli" class="font-weight-bold">Harga Beli<span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah" id="hrgBeli" placeholder="Harga Beli" required>
                  </div>
                  
                  <div class="mb-3">
                    <label for="hrgJual" class="font-weight-bold">Harga Jual<span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah" id="hrgJual" placeholder="Harga Jual" required>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="mediator" class="font-weight-bold live-search-input">Mediator (Optional)</label>
                        <input type="text" class="form-control live-search-input" id="mediator" placeholder="Mediator Beli">
                        <div class="list-group liveSearch" id="mediatorSearch"></div>
                      <div class="invalid-feedback">
                        Mediator wajib di isi!.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="feeMediator" class="font-weight-bold">Fee Mediator (Optional)</label>
                        <input type="text" class="form-control rupiah" id="feeMediator" placeholder="Fee Mediator">
                      <div class="invalid-feedback">
                        Fee Mediator Error!.
                      </div>
                    </div>
                  </div>
                    
                  <div class="mb-3">
                    <label for="pajak" class="font-weight-bold">Pajak (Optional)</label>
                    <input type="text" class="form-control rupiah" id="pajak" placeholder="Bulan Pajak">
                    <div class="invalid-feedback">
                      Pajak perlu di isi.
                    </div>
                  </div>
                    
                    
                  <div class="mb-5">
                    <label for="rekondisi" class="font-weight-bold">Rekondisi (Optional)</label>
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
    
    <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
    <script src="/fargasa/dist/js/bootstrap.js"></script>
    <script src="/fargasa/dist/js/jquery.form.js"></script>
    <script>
        $(document).ready(function(){
            $("#myBtn").click(function(){
              $('.toast').toast('show');
            });
            $('#statInputMsg').click(function(){
                $(this).toast('hide');
            });
            
            $('#submitDB').on('click', function(){
                var fd = new FormData();
                var files = $('#gambar')[0].files;
                if(files.length > 0 ){
                    fd.append('gambar',files[0]);
                }
                fd.append('tipe',$('#tipe').val());
                fd.append('nopol',$('#nopol').val());
                fd.append('warna',$('#warna').val());
                fd.append('tahun',$('#tahun').val());
                fd.append('jarak_tempuh',$('#jarakTempuh').val());
                fd.append('jenis_bbm',$('#jenisBbm').val());
                fd.append('tgl_beli',$('#tglBeli').val());
                fd.append('hrg_beli',$('#hrgBeli').val());
                fd.append('hrg_jual',$('#hrgJual').val());
                fd.append('mediator',$('#mediator').val());
                fd.append('feeMediator',$('#feeMediator').val());
                fd.append('pajak',$('#pajak').val());
                fd.append('rekondisi',$('#rekondisi').val());
                
                $.ajax({
                    url: './php/SubmitterData.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('.toast').html(response);
                        $('#KonfirmasiModal').modal('hide');
                
                        $('.toast').toast('show');
                        $("#formInput")[0].reset();
                        $("#formInput").removeClass('was-validated');
                       
                       
                    },
                 });
//                $('#statInputMsg').load("php/SubmitterData.php",{
//                    
//                    tipe: document.getElementById('tipe').value,
//                    nopol: document.getElementById('nopol').value,
//                    warna: document.getElementById('warna').value,
//                    tahun: document.getElementById('tahun').value,
//                    tgl_beli: document.getElementById('tglBeli').value,
//                    hrg_beli: document.getElementById('hrgBeli').value,
//                    mediator: document.getElementById('mediator').value,
//                    feeMediator: document.getElementById('feeMediator').value,
//                    pajak: document.getElementById('pajak').value,
//                    rekondisi: document.getElementById('rekondisi').value
//                });
                
                
                
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
            
            $('#gambar').change( function(event) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
//                $("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));

                $(this).data('url',tmppath);
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
        
        function gambarToUrl(sumber){
            
        }
        
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

//                      console.log(document.getElementById('gambar').value);
                      $('#KonfirmasiModalBody').load("php/getterConfirm.php",{
                          tipe: document.getElementById('tipe').value,
                          nopol: document.getElementById('nopol').value,
                          warna: document.getElementById('warna').value,
                          tahun: document.getElementById('tahun').value,
                          jarak_tempuh: document.getElementById('jarakTempuh').value,
                          jenis_bbm: document.getElementById('jenisBbm').value,
                          tgl_beli: document.getElementById('tglBeli').value,
                          hrg_beli: document.getElementById('hrgBeli').value,
                          hrg_jual: document.getElementById('hrgJual').value,
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