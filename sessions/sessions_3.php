<?php
	session_start();

	#POST gegevens in variablen steken.
	$_SESSION['registrationData']['2']['straat'] = $_POST['straat'];
	$_SESSION['registrationData']['2']['nummer'] = $_POST['nummer'];
	$_SESSION['registrationData']['2']['gemeente'] = $_POST['gemeente'];
	$_SESSION['registrationData']['2']['postcode'] = $_POST['postcode'];

	$registrationData = $_SESSION['registrationData'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions_3</title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<a href="sessions_1.php?session=destroy">Destroy sessie</a>
	<h2>Overzicht</h2>

	<ul>
	<?php foreach( $registrationData as $Key => $Array ) {
			foreach( $Array as $data => $value ) {
				echo '<li>' . $data . ': '. $value;
				echo '<br><a href="sessions_' . $Key . '.php?focus=' . $data . '">wijzig</a>';
				echo '</li>';
			}
		} ?>
	</ul>

</body>
</html>