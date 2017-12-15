<?php
	session_start();
	$loginPage = 'login.php';

	if ( isset($_COOKIE['login']) ) {
		$emailArray			= explode(',', $_COOKIE['login']);
		$email 				= $emailArray[0];
		$hashedEmailCookie	= $emailArray[1];

		try{
			$db					= new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', '' );
			$userData			= 'SELECT * FROM users WHERE email = "' . $email . '"';

			$selectStatement = $db->prepare($userData);
			$selectStatement->execute();
			$userData = $selectStatement->fetch();

			#check if cookie is correct
			$hashedEmailNew = hash( 'sha512', $email ) . $userData['salt'];
			if (  $hashedEmailNew ==  $hashedEmailCookie ) {
				#show dashboard;
			}
			else{	
				setcookie('login', "", time() - 1 );
				header( 'location: ' . $loginPage );
			}
		}
		catch(PDOException $e){
			echo 'Connection to db failed: ' . $e->getMessage();
		}
	}
	else {
		header( 'location: ' . $loginPage );
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

	<h1>Dashboard</h1>

	<a href="logout.php">uitloggen</a>	

</body>
</html>