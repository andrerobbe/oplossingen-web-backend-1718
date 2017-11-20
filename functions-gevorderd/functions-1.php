<?php
	$md5 = 'd1fa402db91a7a93c4f414b8278ce073';
	$md5_array = str_split($md5);

	function procent_md5_default($search){
		$counter = 0 ;
		global $md5_array;

		for ( $i=0; $i < count($md5_array); $i++) { 
			if ( $md5_array[$i] == $search ) {
				$counter++;
			}
		}

		return ($counter/count($md5_array))*100;
	}

	function procent_md5_array($search, $array){
		$counter = 0;
		global $md5_array;

		for ( $i=0; $i < count($array); $i++) { 
			if ( $array[$i] == $search ) {
				$counter++;
			}
		}
		return ($counter/count($md5_array))*100;
	}

	function procent_md5_string($search, $string){
		$_array = str_split($string);
		global $md5_array;
		$counter = 0;

		for ( $i=0; $i < count($_array); $i++) { 
			if ( $_array[$i] == $search ) {
				$counter++;
			}
		}
		return ($counter/count($md5_array))*100;
	}


	$callback = 'procent_md5_default';
	$callback_array = 'procent_md5_array';
	$callback_string = 'procent_md5_string';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>functions advanced</title>


	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<p>Functie 1: De needle 2 komt <?php echo $callback(2) ?>% voor in de hash key <?=$md5 ?></p>

	<p>Functie 2: De needle 8 komt <?php echo $callback_array(8, $md5_array) ?>% voor in de hash key <?=$md5 ?></p>

	<p>Functie 3: De needle a komt <?php echo $callback_string("a", $md5) ?>% voor in de hash key <?=$md5 ?></p>
	

</body>
</html>