<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/dist/php/idGenerator.php';
class createCon  {
    var $host = 'localhost';
    var $user = 'root';
    var $pass = 'fargasanafz';
    var $db = 'fargasa';
    var $myconn;

    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            header('Location: /fargasa/500.php?url='.$_SERVER['REQUEST_URI']);
        } else {
            $this->myconn = $con;
//            echo 'Connection established!';
            
        }
        return $this->myconn;
    }
    
    function verified_login($username, $pass){
        $cekuser = mysqli_query($this->connect() ,"SELECT * FROM user WHERE username = '$username'");
        if(!$cekuser){
               die ("Data User Kosong" . mysqli_error($this->connect()));
        }else{
               $hasil = mysqli_fetch_array($cekuser);
                if(mysqli_num_rows($cekuser) == 0) {
                        return 'Kami tidak mengenali username ini!';
                } else {
                if($pass <> $hasil['password']) {
                       return 'Password Anda Salah!';

                } else {
                $_SESSION['id_user'] = $hasil['id_user'];
                $_SESSION['nama'] = $hasil['nama'];
                $_SESSION['username'] = $hasil['username'];
                $_SESSION['privilege'] = $hasil['privilege'];
                return "0";
                       }
               }
           }
    }

    function checkUsername($username){
        $cekuser = mysqli_query($this->connect() ,"SELECT username FROM user WHERE username = '$username'");
        if(mysqli_num_rows($cekuser) > 0){
               return "false";
        }else{
               return "true";
           }
    }
    
    function checkEmail($email){
        $cekemail = mysqli_query($this->connect() ,"SELECT email FROM user WHERE email = '$email'");
        if(mysqli_num_rows($cekemail) > 0){
               return "false";
        }else{
               return "true";
           }
    }
    
    function inputPelanggan($dataArray){
        $id = createId(8);

        //cek id
              $id = $this->checkId($this->connect(),$id);  
        //

        
        $nama = $dataArray['nama'];
        $username = $dataArray['username'];
        $password = $dataArray['password'];
        $alamat = $dataArray['alamat'];
        $email = $dataArray['email'];
        $nope = $dataArray['nope'];
        $query = "INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `alamat` , `email`, `no_hp`, `privilege`) "
                . "VALUES ('$id', "
                . "'$nama', "
                . "'$username', "
                . "'$password', "
                . "'$alamat', "
                . "'$email', "
                . "'$nope', "
                . "'pelanggan');";
        $input	= mysqli_query($this->connect(),$query);
            if ($input) {
                //Jika Sukses
                //input user
                return "0";
            }else {
                return mysqli_error($this->connect());

            }
        

    }
    
    function intToRupiah($angka){

	
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 

    }
    
    function rupiahToInt($angka){
        $angka = str_replace("Rp. ", "", $angka);
        $angka = str_replace(".", "", $angka);
        return $angka;
    }
    
    function chartMaker($tahun){
        $jml_transaksi= array();
        $outChart='';
        $data = mysqli_query($this->connect() ,"SELECT (SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='1' AND year(tgl_beli)='$tahun') as januari, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='2' AND year(tgl_beli)='$tahun') as februari, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='3' AND year(tgl_beli)='$tahun') as maret, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='4' AND year(tgl_beli)='$tahun') as april, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='5' AND year(tgl_beli)='$tahun') as mei, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='6' AND year(tgl_beli)='$tahun') as juni, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='7' AND year(tgl_beli)='$tahun') as juli, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='8' AND year(tgl_beli)='$tahun') as agustus, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='9' AND year(tgl_beli)='$tahun') as september, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='10' AND year(tgl_beli)='$tahun') as oktober, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='11' AND year(tgl_beli)='$tahun') as november, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='12' AND year(tgl_beli)='$tahun') as desember ");
        if(!$data){
               die ("Data User Kosong" . mysqli_error($this->connect()));
        }else{
               
                if(mysqli_num_rows($data) == 0) {
                        return 'Kami tidak mengenali username ini!';
                } else {
                while($row = mysqli_fetch_array($data)) {
                    $jml_transaksi= array((int)$row['januari'],(int)$row['februari'],
                            (int)$row['maret'],(int)$row['april'],(int)$row['mei'],
                            (int)$row['juni'],(int)$row['juli'],(int)$row['agustus'],
                            (int)$row['september'],(int)$row['oktober'],(int)$row['november'],
                            (int)$row['desember']);
                    $outChart .= $row['januari'] .","
                            . $row['februari'] .","
                            . $row['maret'] .","
                            . $row['april'] .","
                            . $row['mei'] .","
                            . $row['juni'] .","
                            . $row['juli'] .","
                            . $row['agustus'] .","
                            . $row['september'] .","
                            . $row['oktober'] .","
                            . $row['november'] .","
                            . $row['desember'] ."";
                    
                }
                return array($outChart, max($jml_transaksi));
               }
           }
        
    }

    
    function ChartTotalPembelianBulanan($tahun){
        $total= array();
        $outChart='';
        $data = mysqli_query($this->connect() ,"SELECT(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='1' AND year(tgl_beli)='$tahun') as januari,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='2' AND year(tgl_beli)='$tahun') as februari,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='3' AND year(tgl_beli)='$tahun') as maret,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='4' AND year(tgl_beli)='$tahun') as april,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='5' AND year(tgl_beli)='$tahun') as mei,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='6' AND year(tgl_beli)='$tahun') as juni,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='7' AND year(tgl_beli)='$tahun') as juli,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='8' AND year(tgl_beli)='$tahun') as agustus,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='9' AND year(tgl_beli)='$tahun') as september,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='10' AND year(tgl_beli)='$tahun') as oktober,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='11' AND year(tgl_beli)='$tahun') as november,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='12' AND year(tgl_beli)='$tahun') as desember");
        if(!$data){
               die ("Data User Kosong euy" . mysqli_error($this->connect()));
        }else{
               
                if(mysqli_num_rows($data) == 0) {
                        return 'Kami tidak mengenali username ini!';
                } else {
                while($row = mysqli_fetch_array($data)) {
                    $total= array((int)$row['januari'],(int)$row['februari'],
                            (int)$row['maret'],(int)$row['april'],(int)$row['mei'],
                            (int)$row['juni'],(int)$row['juli'],(int)$row['agustus'],
                            (int)$row['september'],(int)$row['oktober'],(int)$row['november'],
                            (int)$row['desember']);
                    $outChart .= "{Bulan:'2020-01', TtlPembelian:'". $this->NullCounter($row['januari']) ."'},"
                            . "{Bulan:'2020-02', TtlPembelian:'". $this->NullCounter($row['februari']) ."'},"
                            . "{Bulan:'2020-03', TtlPembelian:'". $this->NullCounter($row['maret']) ."'},"
                            . "{Bulan:'2020-04', TtlPembelian:'". $this->NullCounter($row['april']) ."'},"
                            . "{Bulan:'2020-05', TtlPembelian:'". $this->NullCounter($row['mei']) ."'},"
                            . "{Bulan:'2020-06', TtlPembelian:'". $this->NullCounter($row['juni']) ."'},"
                            . "{Bulan:'2020-07', TtlPembelian:'". $this->NullCounter($row['juli']) ."'},"
                            . "{Bulan:'2020-08', TtlPembelian:'". $this->NullCounter($row['agustus']) ."'},"
                            . "{Bulan:'2020-09', TtlPembelian:'". $this->NullCounter($row['september']) ."'},"
                            . "{Bulan:'2020-10', TtlPembelian:'". $this->NullCounter($row['oktober']) ."'},"
                            . "{Bulan:'2020-11', TtlPembelian:'". $this->NullCounter($row['november']) ."'},"
                            . "{Bulan:'2020-12', TtlPembelian:'". $this->NullCounter($row['desember']) ."'}";
                    
                }
                return array($outChart, max($total));
               }
           }
    }
    
    function checkId($con,$id2){
            $cekuser = mysqli_query($con ,"SELECT id_user FROM user WHERE id_user = '$id2'");
                if(mysqli_num_rows($cekuser) == 0){
                    return $id2;
                }else{
                    $id2 = createId(8);
                    $this->checkId($con,$id2);
                   }
        }
    
        
        
    function checkUserBooking($idMobil, $idPelanggan){
        $queryCheck = "SELECT stok.id_stok, stok.id_pembelian, stok.nopol, stok.tipe, book.id_booking, book.id_pembelian, book.id_pelanggan, book.booking_mulai FROM stok INNER JOIN book ON stok.id_pembelian=book.id_pembelian WHERE (book.booking_mulai >= now() - INTERVAL 24 HOUR) AND (book.id_pelanggan='$idPelanggan')";
        
        $cekUser = mysqli_query($this->connect(), $queryCheck);
        if (mysqli_num_rows($cekUser)==0) {
            # pelanggan blm pernah booking mobil apapun 24 jam ini
            #maka input ke table book
            $idInsert = createId(8);

            //cek id
            $idInsert = $this->checkId($this->connect(),$idInsert);  
            //
            $queryInsert ="INSERT INTO `book` (`id_booking`, `id_pembelian`, `id_pelanggan`, `booking_mulai`) 
            VALUES ('$idInsert', '$idMobil', '$idPelanggan', current_timestamp())";
            $input  = mysqli_query($this->connect(),$queryInsert);
            if ($input) {
                //Jika Sukses
                //input user
                
                $dataWaktu = mysqli_query($this->connect(), "SELECT b.id_pembelian, current_timestamp() as sekarang, current_timestamp() + INTERVAL 24 HOUR as booking_stop, p.tipe, p.tahun, p.gambar, p.hrg_jual, b.id_booking from book b INNER JOIN pembelian p ON b.id_pembelian=p.id_pembelian where id_booking=$idInsert;");
                $fetch = mysqli_fetch_array($dataWaktu);
                return array(1, $fetch["booking_stop"], $fetch["sekarang"], $fetch["id_pembelian"], $fetch["tipe"], $fetch["tahun"], $fetch["gambar"], $fetch["hrg_jual"], $fetch["id_booking"]);
            }else {
                return mysqli_error($this->connect());

            }
            
        }else{
            #pelanggan sudah pernah booking mobil dalam 24 jam ini.
            return 0;
        }
    }
    
    function dateToMonth($intBulan){
        switch($intBulan){
            case '1' :
                return 'Januari';
                break;
            case '2':
                return 'Februari';
                break;
            case '3':
                return 'Maret';
                break;
            case '4':
                return 'April';
                break;
            case '5':
                return 'Mei';
                break;
            case '6':
                return 'Juni';
                break;
            case '7':
                return 'Juli';
                break;
            case '8':
                return 'Agustus';
                break;
            case '9':
                return 'September';
                break;
            case '10':
                return 'Oktober';
                break;
            case '11':
                return 'November';
                break;
            case '12':
                return 'Desember';
                break;
            default :
                return 'dateToMonth is error!';
                
        }
        
    }

    function tahunGetter(){
    $data = mysqli_query($this->connect() ,"SELECT DISTINCT year(tgl_beli) as tahun FROM pembelian");
    $output =   array();
    while($row = mysqli_fetch_array($data)) {
        array_push($output, $row['tahun']);
    }

        return $output;
    }
    
    function editPembelianGetter($id){
        $data = mysqli_query($this->connect() ,"SELECT * FROM pembelian where id_pembelian='".$id."'");
    $output =   array();
    while($row = mysqli_fetch_array($data)) {
        array_push($output, $row['id_pembelian']);
        array_push($output, $row['tipe']);
        array_push($output, $row['nopol']);
        array_push($output, $row['warna']);
        array_push($output, $row['tahun']);
        array_push($output, $row['jarak_tempuh']);
        array_push($output, $row['jenis_bbm']);
        array_push($output, $row['mediator']);
        array_push($output, $row['tgl_beli']);
        array_push($output, $row['hrg_beli']);
        array_push($output, $row['hrg_jual']);
        array_push($output, $row['fee_mediator']);
        array_push($output, $row['pajak']);
        array_push($output, $row['rekondisi']);
        array_push($output, $row['status']);
        array_push($output, $row['gambar']);
    }

        return json_encode($output) ;
        
    }
    
    function NullCounter($x){
        if($x==NULL or $x==""){
            return '0';
        }else{
            return $x;
        }
    }
    
    function close() {
        mysqli_close($myconn);
        echo 'Connection closed!';
    }

}

?>