<?php
	$money = 100000;
	$interest = 1.08;
	$years = 10;
	$year_counter = 0;

	function moneyGained($money, $interest, $years){
		global $years;
		global $year_counter;
		global $interest;
		global $money;

		if ( $year_counter < $years) {
			++$year_counter;
			$money *= $interest;
			$money = round($money);
			echo 'Na ' . $year_counter . ' heeft hij ' . $money . "<br>";
			moneyGained($money, $interest, $years);
	
		}

		return $money;
	}

moneyGained($money, $interest, $years);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recursive</title>


	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
</head>
<body>
	

</body>
</html>