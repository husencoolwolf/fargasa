<?php
	include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';
	$conn = new createCon();
	$con = $conn->connect();


	$tipe = $_GET["tipe"];
	$output = "";
	$data = mysqli_query($con ,"SELECT DISTINCT year(tgl_beli) as tahun FROM pembelian");
	if ($tipe=="filterTahun") {
		$output.="<option>SEMUA TAHUN</option>\n";

	}elseif ($tipe=="filterGrafik") {
		# code...
	}
	
	while($row = mysqli_fetch_array($data)) {
	    $output.="<option>".$row['tahun']."</option>\n";
	}

	echo $output;
?>