<?php
include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();

//versi lama
if (isset($_GET['query'])) {
	$query = "SELECT DISTINCT nama from user where nama LIKE '%".trim($_GET["query"])."%'";
	$data = mysqli_query($con , $query);
	// $result = 
	$output = '';

	while($row = mysqli_fetch_array($data)) {
		$output .= '
                    <a class="src-value list-group-item list-group-item-action " id="hasil">'.$row['nama'].'</a>
		';
	}
//        <div class="list-group-item list-group-item-action">
	echo $output;

}


?>