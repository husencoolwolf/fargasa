<?php
	include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';
	$conn = new createCon();
	$con = $conn->connect();

	$data = mysqli_query($con ,"SELECT DISTINCT year(tgl_beli) as tahun FROM pembelian");
	$output = "<option>SEMUA TAHUN</option>\n";
	while($row = mysqli_fetch_array($data)) {
	    $output.="<option>".$row['tahun']."</option>\n";
	}

	echo $output;
?>