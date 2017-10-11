<?php 
	$i = 0;
	$max = 100;
	$getallen = array();

	while ( $i <= $max ){
		$getallen[] = $i;
		++$i;
	}
	$getallenRij = implode(', ', $getallen);


	$j = 0;
	$maxj = 100;
	$getallen2 = array();

	while ( $j <= $maxj ){
		if ( $j % 3 &&  $j > 40 &&  $j < 80 ) {
			$getallen2[] = $j;
		}		
		++$j;
	}
	$getallenRij_2 = implode(', ', $getallen2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>while</title>
</head>
<body>
	<?php echo $getallenRij ?>
	<br>
	<?php echo $getallenRij_2 ?>

	
</body>
</html>