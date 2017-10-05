<?php
$jaartal = '1900';
$schrikkeljaar = 'nee';

if ( $jaartal%4 == 0  ) {
	$schrikkeljaar = 'ja';

	if ( $jaartal%100 == 0 ) {
		$schrikkeljaar = 'nee';
		if ( $jaartal%400 == 0 ) {
			$schrikkeljaar = 'ja';
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>if-else</title>
</head>
<body>
	<p>Is <?php echo $jaartal ?> een schrikkeljaar: <?php echo $schrikkeljaar ?></p>
	
</body>
</html>