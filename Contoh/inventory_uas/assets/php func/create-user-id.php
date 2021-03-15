<?php
function createId(){
$digit = '';
	for($i=0; $i<6;$i++){
		$digit = $digit . rand(0,9);
	}
	return $digit;
	}
?>