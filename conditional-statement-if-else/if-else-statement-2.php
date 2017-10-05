<?php
$aantal = '190055555555';
$minuut = $aantal / 60;
$uur = $minuut / 60;
$dag = $uur / 24;
$week = $dag / 7;
$maand = $dag / 31;
$jaar = $dag / 365

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>if-else</title>
</head>
<body>
	<p>In <?php echo $aantal ?> seconden zit:</p>

	<p>Minuten: <?php echo round($minuut, 2) ?></p>
	<p>uren: <?php echo round($uur, 2) ?></p>
	<p>dagen: <?php echo round($dag, 2) ?></p>
	<p>weken: <?php echo round ($week, 2) ?></p>
	<p>maanden (31): <?php echo round($maand, 2) ?></p>
	<p>jaren (365): <?php echo round($jaar, 2) ?></p>

</body>
</html>