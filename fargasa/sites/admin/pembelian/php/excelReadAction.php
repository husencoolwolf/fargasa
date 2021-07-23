<?php
    include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/fargasa/dist/php/excel_reader2.php';
    $target = $_SERVER['DOCUMENT_ROOT']."/fargasa/assets/excel cache/".basename($_FILES['fileExcel']['name']);
    move_uploaded_file($_FILES['fileExcel']['tmp_name'], $target);
    
    //permission
    $data = new Spreadsheet_Excel_Reader($target, false);
    
    $baris = $data->rowcount($sheet_index=0);
    $entry_success = 0;
    $entry_fail = 0;
    for($i = 2 ; $i<=$baris ; $i++){
        $nama = $_SESSION['nama'];
        $id = createId(8);

        //cek id
        $id = checkId($con,$id);  

        $tipe = $data->val($i, 2);
        $warna = $data->val($i, 3);
        $tahun = $data->val($i, 4);
        $nopol = $data->val($i, 5);
        $jarak_tempuh = $data->val($i, 6);
        $jenis_bbm = $data->val($i, 7);
        $mediator = $data->val($i, 8);
        $tgl_beli = $data->val($i, 9);
        $hrg_beli = $data->val($i, 10);
        $feeMediator = $data->val($i, 11);
        $pajak = $data->val($i, 12);
        $rekondisi = $data->val($i, 13);
        $hrg_jual = $data->val($i, 14);
        
        
        
        if($nopol !="" && $tipe != ""){
            $query = "INSERT INTO `pembelian` (`id_pembelian`, `nopol`, `tipe`, `warna`, `tahun`, `jarak_tempuh`, `jenis_bbm`, `mediator`, `tgl_beli`, `hrg_beli`, `hrg_jual` , `fee_mediator`, `pajak`, `rekondisi`, `status`, `author`, `gambar`, `id_pelanggan`) 
    VALUES ('".$id ."', "
        . "'".$nopol."', "
        . "'".$tipe."', "
        . "'".$warna."', "
        . "'".$tahun."', "
        . "'".$jarak_tempuh."', "
        . "'".$jenis_bbm."', "
        . "'".$mediator."', "
        . "STR_TO_DATE('$tgl_beli', '%m/%d/%Y'), "
        . "'".$hrg_beli."', "
        . "'".$hrg_jual."', "
        . "'".$feeMediator."', "
        . "'".$pajak."', "
        . "'".$rekondisi."', "
        . "'siap', "
        . "'".$nama."', "
        . "'default.png', "
        . "NULL);";
            $input = mysqli_query($con, $query);
            if($input){
                $entry_success++;
            }else{
                $entry_fail++;
            }
            
//            STR_TO_DATE('$tgl_beli', '%m/%d/%Y')
        }        
    }
    
    unlink($target);
    if($entry_success==$baris-1 && $entry_fail==0){
        echo '<div class="alert alert-success text-center">
                  '.$entry_success.' Entry telah berhasil dimasukkan.<br>
                  '.$entry_fail.' Entry Gagal Dimasukkan
                </div>';
    }else{
        echo '<div class="alert alert-danger text-center">
                  '.$entry_success.' Entry telah berhasil dimasukkan.<br>
                  '.$entry_fail.' Entry Gagal Dimasukkan
                </div>';
    }
?>

<?php
function checkId($con,$id2){
    $cekuser = mysqli_query($con ,"SELECT id_pembelian FROM pembelian WHERE id_pembelian = '$id2'");
        if(mysqli_num_rows($cekuser)==0){
            return $id2;
        }else{
            $id2 = createId($con,$id2);
            checkId($con,$id2);
           }
}
?>

