<?php

include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
$id = $_POST['id'];

$data = mysqli_query($con, "SELECT * FROM pembelian where id_user='" . $id . "'");
$output =   array();
while ($row = mysqli_fetch_array($data)) {
    /*0*/
    array_push($output, $row['id_User']);
    /*1*/
    array_push($output, $row['nama']);
    /*2*/
    array_push($output, $row['username']);
    /*3*/
    array_push($output, $row['password']);
    /*4*/
    array_push($output, $row['email']);
    /*5*/
    array_push($output, $row['mo_hp']);
    /*6*/
    array_push($output, $row['privilege']);
    /*7*/
}

echo (json_encode($output));
