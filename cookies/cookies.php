<?php
	#jan,test

	if( isset($_GET['logout']) ){

		if( $_GET['logout'] ) {
			#delete cookie
			setcookie('authenticatie', "", time() - 1000 );
			header('location: cookies.php');
		}
	}


	$cookieDuration = 3;
	$myfile = file_get_contents("bestand.txt");
	$fileArray = explode(",",$myfile);
	$valid = false;
	$fout = false;


	if ( !isset($_COOKIE['authenticatie'])){
		if (isset($_POST["submit"]) ) {
			if($_POST["user"] == $fileArray[0] && $_POST["pw"] == $fileArray[1]) {
				$valid = true;
				setcookie('authenticatie', true, time() + $cookieDuration );

				$username = ( isset($_COOKIE['authenticatie']) ) ? $_POST['user'] : '';
			}
			else {
				$fout = true;
			}
		}
	}
	
	if ( isset($_COOKIE['authenticatie'])){
		$valid = true;
		$username = ( isset($_COOKIE['authenticatie']) ) ? $fileArray[0] : '';
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
	<?php if($valid) { ?>
		<?php if( isset($_COOKIE['authenticatie']) ) {
			echo '<h1>Hallo ' . $username . '!</h1>';
		}
		else {
			echo '<p>U bent ingelogd.</p>';
		}
		echo '<a href="cookies.php?logout=1">Uitloggen</a>';
	} ?>

	<?php if($fout) {
		echo '<p>De gebruikersnaam en/of wachtwoord is fout.</p>';		
	} ?>

	<?php if(!$valid): ?>
		<form action="cookies.php" method="post">
		<label for="user">User:</label>
		<input name="user" id="user" type="text"><br>
		<label for="pw">Password:</label>
		<input name="pw" id="pw" type="password"><br><br>
		<button name="submit">Verzenden</button>
		</form>
	<?php endif; ?>

</body>
</html>