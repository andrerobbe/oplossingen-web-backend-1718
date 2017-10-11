<?php
	function BerekenSom($getal, $getal2){
		return $getal + $getal2;
	}

	function vermenigvuldigen($getal, $getal2){
		return $getal * $getal2;
	}

	function isEven($getal){
		$bool = 'true';
		# 0 = false, maar wel even dus bool = true
		if ($getal % 2 ) {
			$bool = 'false';
		}
		return $bool;
	}

$test1 = berekenSom(2, 5);
$test2 = vermenigvuldigen(2, 5);
$test3 = isEven(2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>functions</title>


	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<p>2+5 = <?php echo $test1 ?></p>
	<p>2*5 = <?php echo $test2 ?></p>
	<p>2 even? : <?php echo $test3 ?></p>
	

</body>
</html>