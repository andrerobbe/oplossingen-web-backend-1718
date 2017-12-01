<?php
	$msg = '';

	if ( isset($_POST[ 'submit' ] ) ) {
		try {
			$db = new PDO('mysql:host=localhost; dbname=bieren', 'root', '');

			$brouwerSelect	=	'SELECT * FROM brouwers';

			$statement = $db->prepare( $brouwerDelete );
		
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

	<table>
		
	</table>

</body>
</html>