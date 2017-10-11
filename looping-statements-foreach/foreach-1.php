<?php
	$text = file_get_contents("text-file.txt");
	$textchars = str_split($text);
	arsort($textchars);
	$reversed = array_reverse($textchars);
	
	$Chars = array();
	foreach( $reversed as $letter ) {
		if ( isset ( $Chars [ $letter ] ) ) {
			$Chars[$letter]++;
		}
		else {
			$Chars[$letter]=1;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>foreach</title>


	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>

	<p>uniek: <?php echo count(array_unique($reversed)) ?></p>
	<?php var_dump ($Chars); ?>
	

</body>
</html>