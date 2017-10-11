<?php

$dier = Array('geit', 'koe', 'hond', 'kat', 'konijn');
$dier_len = count($dier);


$teZoekenDier = "panda";


$array_search = in_array($teZoekenDier, $dier);
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
	<title>array functions 1</title>
</head>
<body>
	<?php var_dump($dier); ?>
	<p>count is <?php echo $dier_len; ?></p>
	<p><?php echo $txt; ?></p>
</body>
</html>