<?php
	$msg 				= '';
	$showConfirmation 	= false;
	$idToDelete 		= false;

	try {
		$db = new PDO('mysql:host=localhost; dbname=bieren', 'root', '');

		if ( isset($_POST['delete']) ){
			$showConfirmation	= true;
			$idToDelete 		= $_POST['delete'];
		}

		if ( isset($_POST['confirmed']) ){
			$brouwerDelete	=	'DELETE FROM brouwers WHERE brouwernr = :brouwernr';

			$deleteStatement = $db->prepare( $brouwerDelete );
			$deleteStatement->bindValue( ':brouwernr', $_POST['confirmed'] );
			
			$isDeleted = $deleteStatement->execute();

			if ( $isDeleted ){
				$msg = 'Brouwerij succesvol verwijderd';
			}
			else{
				$msg = 'Brouwerij is NIET verwijderd! ' . $deleteStatement->errorInfo()[2];
			}
		}

		$brouwerSelect	=	'SELECT * FROM brouwers';

		$statement = $db->prepare( $brouwerSelect );
		$statement->execute();

		$brouwers = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	}
	catch (PDOException $e){
		$msg = 'Connection to database failed: ' . $e->getMessage();
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
		tbody tr:nth-child(2n + 1), thead{
			background-color: #CACACA;
		}
		.confirm-form{
			background-color: #E66363;
			color: white;
			width: 150px;
			padding: 10px;
		}
		.confirmation{
			background-color: #E66363 !important;
			color: white;
		}
		button img {
			width: 15px;
			height: 15px;
		}
	</style>
</head>
<body>
	<a href="../">home</a>
	<a href="<?= $_SERVER['PHP_SELF'] ?>">reset</a>
	<p><?php echo $msg ?></p>
	
	<?php if ($showConfirmation): ?>
		<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" class="confirm-form">
			<p>Weet je het zeker?</p>
			<button type="submit" name="confirmed" value="<?= $idToDelete ?>">Ja</button>
			<button type="submit">Nee</button>
		</form>
	<?php endif ?>

	<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
	<table>
		<thead>
			<tr>
				<th>#</th>
				<?php 
				foreach ($brouwers[0] as $brouwerKey => $brouwerValues) {
					echo "<th>" . $brouwerKey . "</th>";
				} ?>
				<th> </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($brouwers as $brouwerKey => $brouwerValues): ?>
				<tr class="<?= ( $brouwerValues['brouwernr'] === $idToDelete ) ? 'confirmation' : ''?>">
					<td><?= $brouwerKey ?></td>
					<?php foreach ($brouwerValues as $keyBrouwerVal) {
						echo "<td>" . $keyBrouwerVal . "</td>";
					} ?>
					<td>
						<button type="submit" name="delete" value="<?= $brouwerValues['brouwernr'] ?>">
							<img src="icon-delete.png" alt="Delete button">
						</button>
					</td>
					<td>
						<button type="submit" name="edit" value="<?= $brouwerValues['brouwernr'] ?>">
							<img src="icon-edit.png" alt="Edit button">
						</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
		</tfoot>		
	</table>

</body>
</html>