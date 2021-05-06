<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
session_start();
$conn = new createCon();
$con = $conn->connect();
$id = $_GET["id"];
$data = mysqli_query($con, "SELECT * FROM user where id_user = $id");
$elements = mysqli_fetch_array($data);




function edit($data)
{
    $id      = htmlspecialchars($_POST['id']);
    $nama    = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $email   = htmlspecialchars($_POST['email']);
    $no_hp   = htmlspecialchars($_POST['no_hp']);

    $conn = new createCon();
    $con = $conn->connect();

    $sql = "UPDATE user SET 
     id_user  =   '$id',
     nama = '$nama', 
     username = '$username',
     password = '$password',
     email = '$email',
     no_hp = '$no_hp' 
     WHERE id_user = '$id'";
    mysqli_query($con, $sql) or die(mysqli_error($con));
    return mysqli_affected_rows($con);
}
