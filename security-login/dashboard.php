<?php
	session_start();
	$loginPage = 'login.php';

	if ( isset($_COOKIE['login']) ) {
		echo 'true';
	}
	else {
		echo 'false';
		#header( 'location: ' . $loginPage);
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $_SERVER['PHP_SELF'] ?></title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<a href="../">home</a>
	<a href="registratie.php?session=destroy">Destroy session</a>

	<?php if ( isset( $_SESSION[ 'register' ] ) ) {
		echo '<p>' . $_SESSION[ 'register' ] . '</p>';
	}?>
	

</body>
</html>