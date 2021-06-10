<?php

    include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    $id = $_POST['id'];
    $query = "SELECT j.id_penjualan, b.tipe, b.nopol, b.warna, b.tahun, j.sales, j.mediator,j.tgl_jual, j.hrg_jual, j.fee_mediator, j.fee_sales, j.leas, j.tenor, j.refund FROM penjualan j INNER JOIN pembelian b ON j.id_pembelian=b.id_pembelian where id_penjualan='".$id."'";
    $data = mysqli_query($con ,$query);
    $output =   array();
//    echo($query);
    while($row = mysqli_fetch_array($data)) {
/*0*/        array_push($output, $row['id_penjualan']);
/*1*/        array_push($output, $row['tipe']);
/*2*/        array_push($output, $row['nopol']);
/*3*/        array_push($output, $row['warna']);
/*4*/        array_push($output, $row['tahun']);
/*5*/        array_push($output, $conn->intToRupiah($row['hrg_jual']));
/*6*/        array_push($output, $row['sales']);
/*7*/        array_push($output, $row['mediator']);
/*8*/        array_push($output, $row['tgl_jual']);
/*9*/        array_push($output, $conn->intToRupiah($row['fee_mediator']));
/*10*/       array_push($output, $conn->intToRupiah($row['fee_sales']));
/*11*/        array_push($output, $row['leas']);
/*12*/        array_push($output, $row['tenor']);
/*13*/       array_push($output, $conn->intToRupiah($row['refund']));
///*14*/       array_push($output, $row['status']);
///*15*/       array_push($output, $row['gambar']);
    }

        echo (json_encode($output)) ;
?>