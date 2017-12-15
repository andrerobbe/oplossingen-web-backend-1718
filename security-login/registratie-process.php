<?php 
	session_start();

	$registrationPage	= 'registratie.php';
	$dashboardPage		= 'dashboard.php';

	if ( isset($_POST['generate-password']) ){
		$passwordStr = generatePassword(12);

		$_SESSION[ 'registration' ][ 'email' ]		= 	$_POST[ 'email' ];
		$_SESSION[ 'registration' ][ 'password' ]	= 	$passwordStr;
		header( 'location:' . $registrationPage );
	}
	elseif ( isset($_POST['submit']) ) {

		$email		=	$_POST[ 'email' ];
		$password	=	$_POST[ 'password' ];

		$_SESSION[ 'registration' ][ 'email' ]		=	$email;
		$_SESSION[ 'registration' ][ 'password' ]	=	$password;


		#Email validation
		$validEmail = filter_var( $email, FILTER_VALIDATE_EMAIL );
		if ( !$validEmail ) {
			$_SESSION[ 'error' ][ 'email' ] = "Not a valid email"; 
			header('location: ' . $registrationPage );
		}

		#password validation
		if ( strlen($password) < 4 ) {
			$_SESSION[ 'error' ][ 'password' ] = "Not a valid password"; 
			header('location: ' . $registrationPage );
		}

		#check if mail is already in DB, if not create user
		else{
			try{
				$db					= new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', '' );
				$userData			= 'SELECT * FROM users WHERE email = (:email)';

				$selectStatement = $db->prepare($userData);
				$selectStatement->bindValue( ':email', $email );
				$selectStatement->execute();
				$userDB = $selectStatement->fetch();

				if ( $email == $userDB['email'] ) {
					$_SESSION[ 'error' ][ 'email' ] = "email is already in use!";
					header('location: ' . $registrationPage );
				} 
				else { #create user
					$salt 			=	uniqid(mt_rand(), true);
					$saltedPw		=	$password . $salt;
					$hashedPw 		= 	hash( 'sha512', $saltedPw );

					$userInsert 	= 	"INSERT INTO users (email, salt, hashed_password, last_login_time) VALUES (:email, :salt, :hashed_password, NOW() )";

					$insertStatement = $db->prepare( $userInsert );
					$insertStatement->bindValue( ':email', $email );
					$insertStatement->bindValue( ':salt', $salt );
					$insertStatement->bindValue( ':hashed_password', $hashedPw );
					$isAdded = $insertStatement->execute();

					if ( $isAdded ) {
						$_SESSION[ 'register' ] = "User Created Successfully.";

						$cookieDuration			= time() + 2592000; #30 days
						$cookieEmail			= $email . ',' . hash( 'sha512', $email ) . $salt;
						setcookie('login', $cookieEmail, $cookieDuration );
						header('location: ' . $dashboardPage);						
					}
					else {
						$_SESSION[ 'register' ] = "User Registration Failed";
						var_dump($insertStatement->errorInfo());
						header('location: ' . $registrationPage);
					}
				}
			}
			catch(PDOException $e){
				$_SESSION[ 'error' ][ 'db' ] = 'Connection to db failed: ' . $e->getMessage();
			}
		}
	}


	function generatePassword($length) {
		$lowerCase 		= 	true;
		$upperCase 		= 	true;
		$numbers 		=	true;
		$specialChar	=	false;

		$passwordChars = [];
		$passwordStr = '';

		if ($lowerCase){
			$passwordChars[0] = range('a', 'z');
		}

		if ($upperCase){
			$passwordChars[1] = range('A', 'Z');
		}

		if ($numbers){
			$passwordChars[2] = range('0', '9');
		}

		if ($specialChar){
			$passwordChars[3] = array('!','@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '?');
		}


		$charCounter 		= 	0;
		$arraysEnabled 		= 	count($passwordChars);

		while ($charCounter < $length) {
			$rndArrayNumber 	= rand(0, ($arraysEnabled-1) );
			#$rndArray 			= $passwordChars[$rndArrayNumber];

			$passwordStr		.= $passwordChars[ $rndArrayNumber ][ mt_rand( 0, count( $passwordChars[ $rndArrayNumber ] ) - 1) ]; # mt_rand more random than array_rand()
			$charCounter++;
		}
		return $passwordStr;
	}
 ?>