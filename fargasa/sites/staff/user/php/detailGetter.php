<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
$id = $_POST['id'];

$data = mysqli_query($con, "SELECT * FROM user where id_user='" . $id . "'");
$output = array();
while ($row = mysqli_fetch_array($data)) {
  /*0*/
  array_push($output, $row['id_user']);
  /*1*/
  array_push($output, $row['nama']);
  /*2*/
  array_push($output, $row['username']);
  /*3*/
  array_push($output, $row['password']);
  /*4*/
  array_push($output, $row['email']);
  /*5*/
  array_push($output, $row['no_hp']);
  /*6*/
  array_push($output, $row['alamat']);
  /*7*/
}

echo '<ul class="list-group mb-3">
        

        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0"> <b>' . $output[1] . '</b></h6>
            <small class="text-muted">Nama Pelanggan</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output[4] . '</h6>
            <small class="text-muted">E-Mail</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output[5] . '</h6>
            <small class="text-muted">Nomor Telepon/HP</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex bg-light">
          <div>
            <h6 class="my-0">' . $output[6] . '</h6>
            <small>Alamat Pelanggan</small>
          </div>
          
        </li>
        
      </ul>';
