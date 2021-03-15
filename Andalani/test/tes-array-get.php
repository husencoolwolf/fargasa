<!DOCTYPE html>
<html>
<body>

<?php
$array1 = array("Volvo", "BMW", "Toyota");
$array2 = array("Volvo", "BMW", "Toyota");
$data1="textdata";

$urlPortion= '&array1='.urlencode(serialize($array1)).
             '&array2='.urlencode(serialize($array2)).
             '&data1='.urlencode(serialize($data1));
//Full URL:
$fullUrl='tes-array-get-tujuan.php?somevariable=tes'.$urlPortion;

echo ("Full nya : ".$fullUrl);
?>
<a href="<?php echo($fullUrl)?>">TES SINI</a>
</body>
</html>
