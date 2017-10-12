<?php 
$boodschappen[] = 'brood';
$boodschappen[] = 'melk';
$boodschappen[] = 'banaan';
$boodschappen[] = 'vlees';
$boodschappen[] = 'frisdrank';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>while 2</title>
</head>
<body>
	<ul>
		<?php $i = 0; ?>
		<?php while ( $i < count($boodschappen) ) { ?>
				<li><?php echo $boodschappen[$i]; ?></li>
				<?php ++$i; ?>
		<?php } ?>
	</ul>
	
</body>
</html>