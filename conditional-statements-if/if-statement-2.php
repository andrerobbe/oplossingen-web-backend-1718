<?<?php 
$getal = 2;
$dag;

if ( $getal == 1 ){
	$dag = 'maandag';
}
if ( $getal == 2 ){
	$dag = 'dinsdag';
}
if ( $getal == 3 ){
	$dag = 'woensdag';
}
if ( $getal == 4 ){
	$dag = 'donderdag';
}
if ( $getal == 5 ){
	$dag = 'vrijdag';
}
if ( $getal == 6 ){
	$dag = 'zaterdag';
}
if ( $getal == 7 ){
	$dag = 'zondag';
}

$dagUpperCase = strtoupper($dag);
$dagA = strrpos($dagUpperCase, 'A');
$day = substr_replace($dagUpperCase, 'a', $dagA, 1);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php echo $day?></p>	
</body>
</html>