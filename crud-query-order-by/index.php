<?php
	$msg = '';

	try {
		$db = new PDO('mysql:host=localhost; dbname=bieren', 'root', '');

		$thead = 'bieren.biernr';
		$order = 'ASC';

		if ( isset($_GET['orderBy']) ) {
			$get = $_GET[ 'orderBy'];
			$getExploded = explode("-", $get );
			
			$thead = $getExploded[0]; //tabelNaam
			$order = $getExploded[1]; //ASC of DESC

			if( $getExploded[1] != 'DESC' ) {
				$order = 'DESC';
			}
			else {
				$order = 'ASC';
			}
		}

		$orderQuery = 'ORDER BY ' . $thead . ' ' . $order ;

		$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
						FROM bieren 
							INNER JOIN brouwers
							ON bieren.brouwernr	= brouwers.brouwernr
							INNER JOIN soorten
							ON bieren.soortnr = soorten.soortnr '
							. $orderQuery;

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
			background:	url('icon-asc.png') no-repeat right;
		}

		.descending a {
			background: url('icon-desc.png') no-repeat right;
		}

		.selected {
			background-color: lightgreen;
		}
	</style>
</head>
<body>
	<a href="../">home</a>
	<a href="<?= $_SERVER['PHP_SELF'] ?>">reset</a>

	<table>
		<thead>
			<?php foreach ($bieren[0] as $key => $value): ?>
				<th class="order <?= ( $order == 'ASC' ) ? 'descending' : 'ascending' ?>">
					<a href="<?= $_SERVER['PHP_SELF'] ?>?orderBy=<?= $key ?>-<?= $order ?>"><?= $key ?></a>
				</th>
			<?php endforeach ?>
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