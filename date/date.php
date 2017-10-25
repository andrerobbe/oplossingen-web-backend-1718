<?php
	setlocale( 'LC_ALL', 'nld_nld' );
    $time = mktime("22","35","25","01","21","1904");
    $time_fix = strftime('%d %B %Y, %H:%M:%S %p', $time);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Date</title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<?php echo $time_fix ?>

</body>
</html>