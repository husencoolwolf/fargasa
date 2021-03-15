<?php

class createCon  {
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $db = 'fargasa';
    var $myconn;

    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            header('Location: /500.php?url='.$_SERVER['REQUEST_URI']);
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
                $_SESSION['user_id'] = $hasil['user_id'];
                $_SESSION['nama'] = $hasil['nama'];
                $_SESSION['username'] = $hasil['username'];
                $_SESSION['privilege'] = $hasil['privilege'];
                return "0";
                       }
               }
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
    
    function chartMaker(){
        $jml_transaksi= array();
        $outChart='';
        $data = mysqli_query($this->connect() ,"SELECT (SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='1') as januari, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='2') as februari, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='3') as maret, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='4') as april, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='5') as mei, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='6') as juni, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='7') as juli, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='8') as agustus, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='9') as september, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='10') as oktober, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='11') as november, "
                . "(SELECT COUNT(nopol) FROM pembelian WHERE month(tgl_beli)='12') as desember ");
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
                    $outChart .= "{Bulan:'Januari', Transaksi:'". $row['januari'] ."'},"
                            . "{Bulan:'Februari', Transaksi:'". $row['februari'] ."'},"
                            . "{Bulan:'Maret', Transaksi:'". $row['maret'] ."'},"
                            . "{Bulan:'April', Transaksi:'". $row['april'] ."'},"
                            . "{Bulan:'Mei', Transaksi:'". $row['mei'] ."'},"
                            . "{Bulan:'Juni', Transaksi:'". $row['juni'] ."'},"
                            . "{Bulan:'Juli', Transaksi:'". $row['juli'] ."'},"
                            . "{Bulan:'Agustus', Transaksi:'". $row['agustus'] ."'},"
                            . "{Bulan:'September', Transaksi:'". $row['september'] ."'},"
                            . "{Bulan:'Oktober', Transaksi:'". $row['oktober'] ."'},"
                            . "{Bulan:'November', Transaksi:'". $row['november'] ."'},"
                            . "{Bulan:'Desember', Transaksi:'". $row['desember'] ."'}";
                    
                }
                return array($outChart, max($jml_transaksi));
               }
           }
        
    }

    
    function ChartTotalPembelianBulanan(){
        $total= array();
        $outChart='';
        $data = mysqli_query($this->connect() ,"SELECT(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='1') as januari,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='2') as februari,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='3') as maret,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='4') as april,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='5') as mei,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='6') as juni,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='7') as juli,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='8') as agustus,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='9') as september,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='10') as oktober,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='11') as november,"
                . "(SELECT (SUM(fee_mediator)+SUM(rekondisi)+SUM(hrg_beli)) from pembelian where month(tgl_beli)='12') as desember");
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