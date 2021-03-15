<?php
require_once dirname(__DIR__,1).'/koneksi.php';
if (isset($_SESSION['username']) && $_SESSION['privilege']== 'costumer') {
	include dirname(__DIR__,1).'/fragment/sidebar-user.php';
}elseif (isset($_SESSION['username']) && $_SESSION['privilege']== 'admin') {
	include dirname(__DIR__,1).'/fragment/sidebar-admin.php';
}else{
	include dirname(__DIR__,1).'/fragment/sidebar-guest.php';
}
//dirname(__DIR__,1) untuk ambil directory path sidebar-control. lalu angka 1 untuk mundur 1 folder. lalu di tambal path tambahan