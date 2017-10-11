<?php

$dier = Array('geit', 'koe', 'hond', 'kat', 'konijn');
$dier_len = count($dier);
$teZoekenDier = "panda";


$zoogdieren = Array('leeuw', 'varken', 'cavia');
$dieren = array_merge($dier, $zoogdieren);

asort($dieren);

$array_search = in_array($teZoekenDier, $dieren);
if ( $array_search ) {
	$txt = $teZoekenDier . ' zit in de array';
}
else {
	$txt = $teZoekenDier . ' zit NIET in de array';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>array functions 2</title>
</head>
<body>
	<?php var_dump($dieren); ?>
	<p>count is <?php echo $dier_len; ?></p>
	<p><?php echo $txt; ?></p>
</body>
</html>