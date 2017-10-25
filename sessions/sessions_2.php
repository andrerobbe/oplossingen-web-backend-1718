<?php
	session_start();

	#POST gegevens in variable stoppen
	$_SESSION['registrationData']['1']['email'] = $_POST['email'];
	$_SESSION['registrationData']['1']['nickname'] = $_POST['nickname'];

	#deel 1
	$registrationData['1'] = $_SESSION['registrationData']['1'];

	#variable indien al ingevuld (wijziging aanbrengen)
	$straat = (isset( $_SESSION['registrationData']['2']['straat'])) ? $_SESSION['registrationData']['2']['straat'] : '';
	$nummer = (isset( $_SESSION['registrationData']['2']['nummer'])) ? $_SESSION['registrationData']['2']['nummer'] : '';
	$gemeente = (isset( $_SESSION['registrationData']['2']['gemeente'])) ? $_SESSION['registrationData']['2']['gemeente'] : '';
	$postcode = (isset( $_SESSION['registrationData']['2']['postcode'])) ? $_SESSION['registrationData']['2']['postcode'] : '';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions_2</title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	<a href="sessions_1.php?session=destroy">Destroy sessie</a>
	<ul>
		<?php foreach( $registrationData['1'] as $data => $value ){
			echo '<li>' . $data . ': ' . $value . '</li>';
		} ?>
	</ul>

	<h2>Deel 2: adres</h2>

	<form action="sessions_3.php" method="POST">
		<label id="straat">Straat</label>
		<input for="straat" type="text" name="straat" placeholder="vul straat in ..." value="<?= $straat ?>" ><br>
		<label id="nummer">Nummer</label>
		<input for="nummer" type="number" name="nummer" placeholder="vul nummer in ..." value="<?= $nummer ?>"><br>
		<label id="gemeente">Gemeente</label>
		<input for="gemeente" type="text" name="gemeente" placeholder="vul gemeente in ..." value="<?= $gemeente ?>"><br>
		<label id="postcode">Postcode</label>
		<input for="postcode" type="number" name="postcode" placeholder="vul postcode in ..." value="<?= $postcode ?>"><br>

		<button type="submit">Volgende</button>
	</form>
	

</body>
</html>