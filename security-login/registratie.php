<?php
	session_start();


	$email 		=	'';
	$password 	=	'';
	$emailError	=	'';
	$pwError	=	'';
	$dbError	=	'';

	if ( isset($_SESSION[ 'registration' ]) ){
		$email 		=	$_SESSION[ 'registration' ]['email'];
		$password 	=	$_SESSION[ 'registration' ]['password'];

		if (isset($_SESSION[ 'error' ][ 'email' ]) ){
			$emailError 		=	$_SESSION[ 'error' ][ 'email' ];
			unset($_SESSION[ 'error' ][ 'email' ]);
		}
		if (isset($_SESSION[ 'error' ][ 'password' ]) ){
			$pwError 		=	$_SESSION[ 'error' ][ 'password' ];
			unset($_SESSION[ 'error' ][ 'password' ]);
		}
		if (isset($_SESSION[ 'error' ][ 'db' ]) ){
			$dbError 		=	$_SESSION[ 'error' ][ 'db' ];
			unset($_SESSION[ 'error' ][ 'db' ]);
		}
	}


	#reset session
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
	<style>
		.error {
			border-color: red;
		}
	</style>
</head>
<body>
	<a href="../">home</a>
	<a href="registratie.php?session=destroy">Destroy session</a>

	<h1>Register</h1>
	<form method="POST" action="registratie-process.php">
		<?php if ($emailError != ''): ?>
			<p><?= $emailError ?></p>
		<?php endif ?>
		<?php if ($pwError != ''): ?>
			<p><?= $pwError ?></p>
		<?php endif ?>
		<?php if ( isset( $_SESSION[ 'register' ] ) ) {
			echo '<p>' . $_SESSION[ 'register' ] . '</p>';
		}?>
		<ul>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?= $email ?>" class="<?= ( $emailError != '' ) ? 'error' : ''?>">
			</li>			
			<li>
				<label for="password">Paswoord</label>
				<input type="<?= ( $password != '' ) ? 'text' : 'password' ?>" name="password" id="password" value="<?= $password ?>" class="<?= ( $pwError != '' ) ? 'error' : ''?>">
				
				<input type="submit" name="generate-password" value="Generate Password">
			</li>		
			<li>
				<input type="submit" name="submit" value="Register">
			</li>
		</ul>
	</form>

</body>
</html>