<?php
	include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';
    include $_SERVER['DOCUMENT_ROOT'].'/dist/php/idGenerator.php';

    $conn = new createCon();
    $con = $conn->connect();
    session_start();
    $idMobil = $_GET['id'];
    $outData = array();
    $query = "SELECT * FROM ";


?>