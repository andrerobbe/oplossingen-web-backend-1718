<?php 
	session_start();



	$registrationPage	= 'registratie.php';
	$dashboardPage		= 'dashboard.php';
	$loginPage			= 'login.php';


	$email		=	$_POST[ 'email' ];
	$password	=	$_POST[ 'password' ];
	$_SESSION[ 'email' ]	=	$email;
	$_SESSION[ 'password' ]	=	$password;


	try{
		$db					= new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', '' );
		$userData			= 'SELECT * FROM users WHERE email = (:email)';

		$selectStatement = $db->prepare($userData);
		$selectStatement->bindValue( ':email', $email );
		$selectStatement->execute();
		$userData = $selectStatement->fetch();

		if ( $userData ) {
			#check if password is correct
			$salt 	=	$userData['salt'];
			if ( hash( 'sha512', $password . $salt ) == $userData['hashed_password'] ) {
				$cookieDuration			= time() + 2592000; #30 days
				$cookieEmail			= $email . ',' . hash( 'sha512', $email ) . $salt;
				setcookie('login', $cookieEmail, $cookieDuration );
				header( 'location: ' . $dashboardPage );
			}
			else{
				$_SESSION['error'] = "wrong password";
				header( 'location: ' . $loginPage );
			}
		}
		else{
			$_SESSION['error'] = "Dit account bestaat niet!";
			header( 'location: ' . $loginPage );
		}
	}
	catch(PDOException $e){
		$_SESSION[ 'error' ][ 'db' ] = 'Connection to db failed: ' . $e->getMessage();
	}
 ?>