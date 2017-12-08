<?php
	session_start();


	$email 		=	'';
	$password 	=	'';

	if ( isset($_SESSION[ 'registration' ]) ){
		$email 		=	$_SESSION[ 'registration' ]['email'];
		$password 	=	$_SESSION[ 'registration' ]['password'];
	}

	if ( isset($_GET['session']) ){
		if ( $_GET['session']  == 'destroy' ){
			session_destroy( );
			header( 'location:registratie.php' );
		}
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
	<a href="registratie.php?session=destroy">Destroy sessie</a>

	<h1>Register</h1>
	<form method="POST" action="registratie-process.php">
		<ul>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?= $email ?>">
			</li>			
			<li>
				<label for="password">Paswoord</label>
				<input type="text" name="password" id="password" value="<?= $password ?>">
				
				<input type="submit" name="generate-password" value="Generate Password">
			</li>		
			<li>
				<input type="submit" name="submit" value="Register">
			</li>
		</ul>
	</form>

</body>
</html>