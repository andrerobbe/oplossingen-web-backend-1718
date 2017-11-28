<?php
	$error_msg = '';

	try {
		$db = new PDO('mysql:host=localhost; dbname=bieren', 'root', '');
		$error_msg = 'Connection to database succesful';


		$queryString = 'SELECT *
								FROM bieren 
								INNER JOIN brouwers
								ON bieren.brouwernr = brouwers.brouwernr
								WHERE bieren.naam LIKE "Du%"
								AND brouwers.brnaam LIKE "%a%"';

		$statement = $db->prepare($queryString);
		$statement->execute();
		$fetchAssoc = array();

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
	<title>query-1</title>

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
	<p><?= $error_msg ?></p>

	<table>
		<thead>
			<tr>
				<?php 
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