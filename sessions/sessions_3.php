<?php
	session_start();

	if ( isset($_POST['submit']) ){
		$_SESSION['registrationData']['deel2']['straat'] = $_POST['straat'];
		$_SESSION['registrationData']['deel2']['nummer'] = $_POST['nummer'];
		$_SESSION['registrationData']['deel2']['gemeente'] = $_POST['gemeente'];
		$_SESSION['registrationData']['deel2']['postcode'] = $_POST['postcode'];
	}

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
		<?php foreach( $registrationData as $Key => $Array ):  ?>
			<?php foreach( $deelArray as $data => $value ):  ?>
				<li>
					<?= $data ?>: <?= $value ?>
					<p><a href="sessions_<?= $Key ?>.php?focus=<?= $data ?>">wijzig</a></p>
				</li>
			<?php endforeach ?>
		<?php endforeach ?>
	</ul>

</body>
</html>