<?php
	$msg = '';

	try {
		$db = new PDO('mysql:host=localhost; dbname=bieren', 'root', '');

		$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
						FROM bieren 
							INNER JOIN brouwers
							ON bieren.brouwernr	= brouwers.brouwernr
							INNER JOIN soorten
							ON bieren.soortnr = soorten.soortnr ';

		$statement = $db->prepare( $query );
		$statement->execute();

		$bieren = $statement->fetchAll(PDO::FETCH_ASSOC);
	
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
		.order a {
			padding-right:20px;
		}

		.ascending a {
			background:	no-repeat url('icon-asc.png') right ;
		}

		.descending a {
			background:	no-repeat url('icon-desc.png') right;
		}

		.selected {
			background-color	:	lightgreen;
		}
	</style>
</head>
<body>
	<a href="../">home</a>
	<a href="<?= $_SERVER['PHP_SELF'] ?>">reset</a>

	<table>
		<thead>
			<?php foreach ($bieren[0] as $key => $value) {
				echo '<th class="order ' . /*( $order == "ASC" && $orderColumn == $bierenFieldnames[ $key ] ) ? "descending" : "ascending" . ( $orderColumn == $bierenFieldnames[ $key ] ) ? "selected" : "" .*/ '"><a href="' . $_SERVER["PHP_SELF"] . '?orderBy=' . $key . '">' . $key . '</a></th>';
			} ?>
		</thead>
		<tbody>
			<?php foreach ($bieren as $keys => $bier) {
				echo '<tr>';
				foreach ($bier as $key2 => $value2) {
					echo '<td>' . $value2 . '</td>';
				}
				echo '</tr>';
			} ?>
		</tbody>
		<tfoot>
		</tfoot>
	</table>
	

</body>
</html>