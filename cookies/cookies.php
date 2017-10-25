<?php
	#jan,test

	if( isset($_GET['logout']) ){

		if($_GET['logout'] == '1'){
			setcookie('username', "", time() - 1000 ); 
			setcookie('password', "", time() - 1000 );
			header('location: cookies.php');
		}
	}

	$cookieDuration = 360;
	$myfile = file_get_contents("bestand.txt");
	$fileArray = explode(",",$myfile);
	$valid = true;
	$fout = false;

	if( isset($_POST['onthouden']) == 'onthouden' ){
		$cookieDuration = 2592000; #30dagen
	}

	if (isset($_POST["user"]) ) {
		if($_POST["user"] == $fileArray[0] && $_POST["pw"] == $fileArray[1]) {

		$valid = false;
		setcookie('username', $fileArray[0], time() + $cookieDuration );
		setcookie('password', $fileArray[1], time() + $cookieDuration );

		$loggedIn = ( isset($_COOKIE['username']) ) ? 'Hallo ' . $_POST['user'] . ', fijn dat je er weer bent' : '';
		}
		else {
			$fout = true;
		}
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cookies</title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<?php if(!$valid): ?>
		<?php if( isset($_COOKIE['username']) ): ?>
			<h1><?php echo $loggedIn ?></h1>
		<?php else: ?>
			<p>U bent ingelogd.</p>
		<?php endif ?>
		<a href="cookies.php?logout=1">Uitloggen</a>
	<?php endif; ?>

	<?php if($fout): ?>
		<p>De gebruikersnaam en/of wachtwoord is fout.</p>
	<?php endif; ?>

	<?php if($valid): ?>
		<form action="cookies.php" method="post">
		<label for="user">User:</label>
		<input name="user" id="user" type="text"><br>
		<label for="pw">Password:</label>
		<input name="pw" id="pw" type="password"><br><br>
		<button>Verzenden</button>
		</form>
	<?php endif; ?>

</body>
</html>