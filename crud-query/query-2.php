<?php
	$error_msg = '';
	$geselecteerdeBrouwer = '';
	$show = false;

	try {
		$db = new PDO('mysql:host=localhost; dbname=bieren', 'root', '');
		$error_msg = 'Connection to database succesful';

		if ( isset($_GET['brouwernr']) ){
			$show = true;
			$queryString = 'SELECT bieren.naam
							FROM bieren 
							WHERE bieren.brouwernr = :brouwernr';

			$statement = $db->prepare($queryString);
			$statement->bindParam( ':brouwernr', $_GET[ 'brouwernr' ] );
		}
		else{
			$show = false;
			$queryString = 'SELECT brnaam, brouwernr
							FROM brouwers';

			$statement = $db->prepare($queryString);
		}
		
		$statement->execute();

		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	}
	catch (PDOException $e){
		$error_msg = 'Connection to database failed: ' . $e->getMessage();

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
	<a href="query-2.php">reset</a>
	<p><?= $error_msg ?></p>
	<br><br><br>

	<?php if (!$show): ?> <!-- als GET NIET geset is -->
		<form action="query-2.php" method="GET">
			<p>Selecteer een merk</p>
			<select name="brouwernr">
				<?php foreach ($row as $key => $brouwer): ?>
					<option value="<?= $brouwer['brouwernr'] ?>"><?= $brouwer['brnaam'] ?></option>
				<?php endforeach ?>
			</select>
			<button type="submit">Bieren van brouwerij</button>
		</form>
	<?php endif ?>
	
	<?php if ($show): ?> <!-- als GET geset is -->
		<form action="query-2.php" method="GET">
			<p>Geselecteerde merk</p>
			<select><option value="<?= $_GET['brouwernr'] ?>"><?= $_GET['brouwernr'] ?><?php ?></option>
			</select>
			<button type="submit">Zoek nieuwe brouwerij</button>
		</form>
	<?php endif ?>

	<table>
		<thead>
			<tr>
				<?php if($show) { echo '<th>Aantal</th>'; }
					foreach($row[0] as $key3 => $bier) {
						echo "<th>". $key3  . "</th>";
					}
				?>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($row as $key => $val) {	
				echo "<tr>";
					if ($show){ echo "<td>" . $key . "</td>"; }
					foreach($val as $key2) {
						echo "<td>". $key2 ."</td>";
					}
				echo "</tr>";
			} ?>
		</tbody>
		<tfoot>
		</tfoot>
	</table>
</body>
</html>