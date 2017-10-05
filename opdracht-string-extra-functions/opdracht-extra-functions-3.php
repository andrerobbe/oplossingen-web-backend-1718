<?<?php 
$letter = 'e';
$cijfer = 3;
$langsteWoord = 'zandzeepsodemineralenwatersteenstralen';
$replaced = str_replace($letter, $cijfer, $langsteWoord)
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php echo $replaced?></p>	
</body>
</html>