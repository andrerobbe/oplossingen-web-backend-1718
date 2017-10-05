<?php
$getal = 33;
$start = 'Het getal ' . $getal . ' ligt tussen ';
$string = '';

if ( $getal > 0 && $getal < 10) {
	$string = "0 en 10";
}
elseif ( $getal >= 10 && $getal < 20) {
	$string = "10 en 20";
}
elseif ( $getal >= 20 && $getal < 30) {
	$string = "20 en 30";
}
elseif ( $getal >= 30 && $getal < 40) {
	$string = "30 en 40";
}
elseif ( $getal >= 40 && $getal < 50) {
	$string = "40 en 50";
}
elseif ( $getal >= 50 && $getal < 60) {
	$string = "50 en 60";
}
elseif ( $getal >= 60 && $getal < 70) {
	$string = "60 en 70";
}
elseif ( $getal >= 70 && $getal < 80) {
	$string = "70 en 80";
}
elseif ( $getal >= 80 && $getal < 90) {
	$string = "80 en 90";
}
elseif ( $getal >= 90 && $getal < 100) {
	$string = "90 en 100";
}

$zin = $start . $string;
$zin_reverse = strrev($zin);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>if-else</title>
</head>
<body>
	<p><?php echo $zin ?></p>
	<p><?php echo $zin_reverse ?></p>
	
</body>
</html>