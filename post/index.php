<?php
	$username = "test";
	$password = "123";

	$msg = '';
	$login = false;
	$form = true;


	if( isset($_POST['submit']) ){
		if( $_POST['user'] == $username && $_POST['password'] == $password ){
			$msg="Welkom " . $username;
			$form = false;
			$login = true;
		}
		else{
			$msg="Mislukt, probeer opnieuw";
			$login = true;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post</title>


	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<nav><a href="../">Home</a></nav>
	<nav><a href="/post">reset</a></nav>
	<?php if( !$login ) {
		echo '<h1>Inloggen</h1>';
	}
	else{
		echo '<h2>' . $msg . '</h2>';
	} ?>

	<?php if( $form ) { ?>
		<form action="index.php" method="post">
			<p><label for="user">Gebruikersnaam:</label></p>
			<p><input type="text" name="user" id="user"></p>
			<p><label for="password">Wachtwoord:</label></p>
			<p><input type="password" name="password" id="password"></p>
			<button type="submit" name="submit">Submit</button>
		</form>
	<?php }?>
</body>
</html>