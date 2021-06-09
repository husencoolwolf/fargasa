<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
$id = $_POST['id'];

$data = mysqli_query($con, "SELECT * FROM user where id_user='" . $id . "'");
//$output = array();
//while ($row = mysqli_fetch_array($data)) {
//  /*0*/
//  array_push($output, $row['id_User']);
//  /*1*/
//  array_push($output, $row['nama']);
//  /*2*/
//  array_push($output, $row['username']);
//  /*3*/
//  array_push($output, $row['password']);
//  /*4*/
//  array_push($output, $row['email']);
//  /*5*/
//  array_push($output, $row['mo_hp']);
//  /*6*/
//  array_push($output, $row['privilege']);
//  /*7*/
//}
$output = mysqli_fetch_array($data);

echo '<ul class="list-group mb-3">
        

        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0"> <b>' . $output["nama"] . '</b></h6>
            <small class="text-muted">Nama User</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output["username"] . '</h6>
            <small class="text-muted">Username User</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">' . $output["password"] . '</h6>
            <small class="text-muted">Password User</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">' . $output["alamat"] . '</h6>
            <small class="text-muted">Alamat User</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">' . $output["email"] . '</h6>
            <small class="text-muted">E-Mail User</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">' . $output["no_hp"] . '</h6>
            <small class="text-muted">Nomor Telepon/HP User</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">' .  strtoupper($output["privilege"]) . '</h6>
            <small class="text-muted">Jenis Akun User</small>
          </div>
          
        </li>
        
      </ul>';
