<?php
	$msg = '';

	try {
		$db = new PDO('mysql:host=localhost; dbname=bieren', 'root', '');

		if ( isset($_POST['delete']) ){
			$brouwerDelete	=	'DELETE FROM brouwers WHERE brouwernr = :brouwernr';

			$deleteStatement = $db->prepare( $brouwerDelete );
			$deleteStatement->bindValue( ':brouwernr', $_POST['delete'] );
			
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
	</style>
</head>
<body>
	<a href="../">home</a>
	<a href="<?= $_SERVER['PHP_SELF'] ?>">reset</a>
	<p><?php echo $msg ?></p>
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
			<?php 
			foreach ($brouwers as $brouwerKey => $brouwerValues) {
				echo "<tr>";
					echo "<td>" . $brouwerKey . "</td>";
					foreach ($brouwerValues as $keyBrouwerVal) {
						echo "<td>" . $keyBrouwerVal . "</td>";
					} ?>					
					<td>
						<button type="submit" name="delete" value="<?= $brouwerValues['brouwernr'] ?>">
							<img src="icon-delete.png" alt="Delete button">
						</button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
		<tfoot>

		</tfoot>		
	</table>

</body>
</html>