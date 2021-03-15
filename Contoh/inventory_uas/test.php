<?php
$test = ["1", "2", "3"];
array_splice($test, 0, 1);
print_r($test);
echo count($test);
?>