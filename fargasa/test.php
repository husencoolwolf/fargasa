<?php
$i=0;
$data=0;
$max = 17;
while ($data <= $max) {
	if ($i==0) {
		echo "<hr>";
		echo $data." col ";
		$data++;
		$i++;
	}else if($i==3 || $data ==$max){
		echo $data." col ";
		echo "<hr>";
		$data++;
		$i=0;
	}else{
		echo $data." col ";
		$data++;
		$i++;
	}
	// echo "<hr>";
	// echo $i." col";
	// echo "<hr>";
	// $i++;
}

?>