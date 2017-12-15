<?php
	session_start();

	setcookie('login', "", time() - 1 );
	$_SESSION['msg'] = "You're logged out.";
	header( 'location: login.php' );
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
	

</body>
</html>