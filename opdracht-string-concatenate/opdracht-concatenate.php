<?php
$voornaam = 'Maurits';
$achternaam = "Robbe"; 

$volledigeNaam = $voornaam . " " . $achternaam;
$nameLenght = strlen($volledigeNaam);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht concatenate</title>
</head>
<body>
	<p>Naam: <?php echo $volledigeNaam ?></p>
	<p>Aantal karakters:<?php echo $nameLenght ?></p>

	
</body>
</html>