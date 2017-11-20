<?php
	spl_autoload_register(function ($class_name) {
    	include "classes/". $class_name . '.php';
	});

	$x = 150;
    $y = 100;

     $PercentObj = new Percent($x,$y);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
	<style>
 		td{
 			border: 1px solid black;
            margin: 0;
            padding: 5px 20px;
 		}
 	</style>
</head>
<body>
	<a href="http://oplossingen2.web-backend.local">home</a>
	


	<p>Hoeveel procent is <?= $x ?> van <?= $y ?></p>
    <table>
        <tbody>
            <tr><td>Absoluut</td><td><?= $PercentObj->absolute ?></td></tr>
            <tr><td>Relatief</td><td><?= $PercentObj->relative ?></td></tr>
            <tr><td>Geheel getal</td><td><?= $PercentObj->hundred ?>%</td></tr>
            <tr><td>Nominaal</td><td><?= $PercentObj->nominal ?></td></tr>
        </tbody>
    </table>
</body>
</html>