<?php
	session_start();

	$email = (isset($_SESSION['registrationData']['deel1']['email'])) ? $_SESSION['registrationData']['deel1']['email'] : '';
	$nickname =	(isset($_SESSION['registrationData']['deel1']['nickname'])) ? $_SESSION['registrationData']['deel1']['nickname'] : '';

	if ( isset($_GET['session']) ){
		if ( $_GET['session']  == 'destroy' ){
			session_destroy( );
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions</title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<a href="sessions_1.php?session=destroy">Destroy sessie</a>
	<h2>Deel 1: registratie</h2>
	<form action="sessions_2.php" method="post">
		<label id="email">Email</label>
		<input for="email" type="email" name="email" value="<?= $email ?>" ><br>
		<label id="nickname">Nickname</label>
		<input for="nickname" type="text" name="nickname" value="<?= $nickname ?>"><br>
		<button type="submit">Volgende</button>
	</form>
	

</body>
</html>