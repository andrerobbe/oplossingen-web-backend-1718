<?php
	session_start();

	if ( isset($_COOKIE['login']) ) {
		header('location: dashboard.php');
	}
	else{
		if (isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		if (isset($_SESSION['error'])){
			$msg = $_SESSION['error'];
			unset($_SESSION['error']);
		}

		$email 		=	'';
		$password 	=	'';
		$emailError	=	'';
		$pwError	=	'';
		$dbError	=	'';

		if ( isset($_SESSION[ 'registration' ]) ){
			$email 		=	$_SESSION[ 'registration' ]['email'];
			$password 	=	$_SESSION[ 'registration' ]['password'];
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
	<a href="registratie.php?session=destroy">Destroy session</a>

	<h1>Login</h1>

	<?php if (isset($msg)){
		echo '<p>' . $msg . '</p>'; 
	} ?>

	<form method="POST" action="login-process.php">
		<ul>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?= $email ?>" class="<?= ( $emailError != '' ) ? 'error' : ''?>" required>
			</li>			
			<li>
				<label for="password">Paswoord</label>
				<input type="<?= ( $password != '' ) ? 'text' : 'password' ?>" name="password" id="password" value="<?= $password ?>" class="<?= ( $pwError != '' ) ? 'error' : ''?>" required>
			</li>		
			<li>
				<input type="submit" name="submit" value="Login">
			</li>
		</ul>
	</form>
	<p>Nog geen account? Maak er eentje aan op <a href="registratie.php">deze pagina</a>

	

</body>
</html>