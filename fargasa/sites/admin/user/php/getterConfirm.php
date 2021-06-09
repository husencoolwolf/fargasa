<?php
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$nope = $_POST['nope'];
$privilege = $_POST['privilege'];

echo '<ul class="list-group mb-3">
        

        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$nama .'</h6>
            <small class="text-muted">Nama User</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$username .'</h6>
            <small class="text-muted">Username</small>
          </div>
        </li>
        <li class="list-group-item list-group-item-action d-flex lh-condensed">
          <div>
            <h6 class="my-0">'.$password .'</h6>
            <small class="text-muted">Password</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex ">
          <div>
            <h6 class="my-0">'.$alamat .'</h6>
            <small class="text-muted">Alamat</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex ">
          <div>
            <h6 class="my-0">'.$email .'</h6>
            <small>Email</small>
          </div>
          
        </li>
        <li class="list-group-item list-group-item-action d-flex bg-light">
          <div>
            <h6 class="my-0">'.$nope .'</h6>
            <small>Nomer Telepon/HP</small>
          </div>
          
        </li>
        
        <li class="list-group-item list-group-item-action d-flex">
          <div>
            <h6 class="my-0">'.$privilege .'</h6>
            <small>Privilege</small>
          <div>
        </li>
        
      </ul>';

?>