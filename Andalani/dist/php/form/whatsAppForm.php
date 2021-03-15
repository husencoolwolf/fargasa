<?php
$nope = "6285695611430";
$nama = $_POST['nama'];
$kota = $_POST['kota'];
// header("Location: https://api.whatsapp.com/send?phone=$nope&text=Halo");
header("Location: https://api.whatsapp.com/send?phone=$nope&text=Halo%2C%20Saya%20$nama%20dari%20$kota%20ingin%20bertanya%20produk%20Andalani%3F!");

?>