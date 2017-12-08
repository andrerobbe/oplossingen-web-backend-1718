<?php 
	session_start();

	$registrationPage	= 'registratie.php';

	if ( isset($_POST['generate-password']) ){
		$passwordStr = generatePassword(12);

		$_SESSION[ 'registration' ][ 'email' ]		= 	$_POST[ 'email' ];
		$_SESSION[ 'registration' ][ 'password' ]	= 	$passwordStr;
		header( 'location:' . $registrationPage );
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
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<a href="../">home</a>
	<a href="registratie.php">reset</a>
 
 </body>
 </html>