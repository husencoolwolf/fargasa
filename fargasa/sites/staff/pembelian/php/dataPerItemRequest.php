<?php
	include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    $idMobil = $_GET['id'];
    $outData = array();
    $query = "SELECT * FROM ";
    $i=0;
    




?>