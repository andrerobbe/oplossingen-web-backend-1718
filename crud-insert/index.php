<?php
	$msg = '';

	if ( isset($_POST[ 'submit' ] ) ) {
		try {
			$db = new PDO('mysql:host=localhost; dbname=bieren', 'root', '');

			$brouwerInsert	=	'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
									VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet )';

			$statement = $db->prepare( $brouwerInsert );

			$statement->bindValue( ':brnaam', $_POST[ 'brnaam' ] );
			$statement->bindValue( ':adres', $_POST[ 'adres' ] );
			$statement->bindValue( ':postcode', $_POST[ 'postcode' ] );
			$statement->bindValue( ':gemeente', $_POST[ 'gemeente' ] );
			$statement->bindValue( ':omzet', $_POST[ 'omzet' ] );

			$isAdded = $statement->execute();

			if ( $isAdded ) {
				$insertId	= $db->lastInsertId();
				$msg	= 'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $insertId . '.';
			}
			else {
				$msg	= 'Er ging iets mis met het toevoegen, probeer opnieuw';
			}
		
		}
		catch (PDOException $e){
			$msg = 'Connection to database failed: ' . $e->getMessage();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $_SERVER['PHP_SELF'] ?></title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
	<style>
	</style>
</head>
<body>
	<a href="../">home</a>
	<p><?php echo $msg ?></p>

	<h1>Voeg een brouwer toe</h1>
	<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
		<label for="brnaam">Brouwernaam</label>
		<input type="text" name="brnaam" id="brnaam">

		<label for="adres">Adres</label>
		<input type="text" name="adres" id="adress">

		<label for="postcode">Postcode</label>
		<input type="text" name="postcode" id="postcode">

		<label for="gemeente">Gemeente</label>
		<input type="text" name="gemeente" id="gemeente">

		<label for="omzet">Omzet</label>
		<input type="text" name="omzet" id="omzet">
		<br>
		<input type="submit" value="Voeg toe" name="submit">
	</form>
</body>
</html>