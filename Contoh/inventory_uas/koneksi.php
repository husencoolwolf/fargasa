<?php
$sambung = mysqli_connect ( "localhost","root","" )
or die ( " Koneksi Gagal " );
if ($sambung) {
mysqli_select_db($sambung ,"inventory_uas") or die (" Database gagal dibuka" . mysqli_error());
}
?>