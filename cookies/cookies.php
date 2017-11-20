<?php
	if( isset($_GET['logout']) ){

		if( $_GET['logout'] ) {
			setcookie('authenticatie', "", time() - 1000 );
			header('location: cookies.php');
		}
	}

	$cookieDuration = 300;
	$myfile = file_get_contents("bestand.txt");
	$fileArray = explode(",",$myfile);
	$usernames = array();
	$passwords = array();
	for ($i=0; $i < count($fileArray) ; $i++) { 
		if ($i % 2 == 0) {
			$usernames[] = $fileArray[$i];
		}
		else{
			$passwords[] = $fileArray[$i];
		}
	}
	var_dump($usernames);
	var_dump($passwords);


	$valid = false;
	$fout = false;
	$counter = 0;

	if ( !isset($_COOKIE['authenticatie'])){
		if (isset($_POST["submit"]) ) {
			for ($j=0; $j < count($usernames) ; $j++) {
				if($_POST["user"] == $usernames[$j] && $_POST["pw"] == $passwords[$j]) {
					if (isset( $_POST['remember']) ) {
						$cookieDuration = 2592000;
					}
					setcookie('authenticatie', true, time() + $cookieDuration );
					$valid = true;
					$counter = $j;
				}
				else {
					$fout = true;
				}
			}
		}
	}
	
	if ( isset($_COOKIE['authenticatie'])){
		$valid = true;
		$username = $usernames[$counter];
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
	} 
	if($fout && !$valid) {
		echo '<p>De gebruikersnaam en/of wachtwoord is fout.</p>';		
	} 
	if(!$valid) { ?>
		<form action="cookies.php" method="post">
		<label for="user">User:</label>
		<input name="user" id="user" type="text"><br>
		<label for="pw">Password:</label>
		<input name="pw" id="pw" type="password"><br><br>
		<input type="checkbox" name="remember" id="remember">
		<label name="" for="remember">Onthoud Mij</label><br>
		<button name="submit">Verzenden</button>
		</form>
	<?php } ?>
</body>
</html>