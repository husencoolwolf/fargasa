<?php
if (isset($_SESSION['username']) && $_SESSION['privilege']== 'costumer') {
	include dirname(__DIR__,1).'/fragment/header/header-user.php';
}elseif (isset($_SESSION['username']) && $_SESSION['privilege']== 'admin') {
	include dirname(__DIR__,1).'/fragment/header/header-admin.php';
}else{
	include dirname(__DIR__,1).'/fragment/header/header-guest.php';
}
?>