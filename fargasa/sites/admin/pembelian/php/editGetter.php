<?php

    include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    $id = $_POST['id'];
    
    $data = mysqli_query($con ,"SELECT * FROM pembelian where id_pembelian='".$id."'");
    $output =   array();
    while($row = mysqli_fetch_array($data)) {
/*0*/        array_push($output, $row['id_pembelian']);
/*1*/        array_push($output, $row['tipe']);
/*2*/        array_push($output, $row['nopol']);
/*3*/        array_push($output, $row['warna']);
/*4*/        array_push($output, $row['tahun']);
/*5*/        array_push($output, $row['jarak_tempuh']);
/*6*/        array_push($output, $row['jenis_bbm']);
/*7*/        array_push($output, $row['mediator']);
/*8*/        array_push($output, $row['tgl_beli']);
/*9*/        array_push($output, $conn->intToRupiah($row['hrg_beli']));
/*10*/       array_push($output, $conn->intToRupiah($row['hrg_jual']));
/*11*/       array_push($output, $conn->intToRupiah($row['fee_mediator']));
/*12*/       array_push($output, $conn->intToRupiah($row['pajak']));
/*13*/       array_push($output, $conn->intToRupiah($row['rekondisi']));
/*14*/       array_push($output, $row['status']);
/*15*/       array_push($output, $row['gambar']);
    }

        echo (json_encode($output)) ;
?>