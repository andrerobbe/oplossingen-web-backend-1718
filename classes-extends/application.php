<?php
	spl_autoload_register(function ($class_name) {
    	include "classes/". $class_name . '.php';
	});

	$hond = new Animal('Hond', 'M', 90);
	$kat = new Animal('Kat', 'M', 100);
	$cavia = new Animal('Cavia', 'F', 25);

	$lion1 = new Lion("Simba", "M", 150, "congo leeuw");
	$lion2 = new Lion("Scar", "M", 150, "kenia leeuw");

	$zebra1 = new Zebra("Zeke", "M", 115, "Quagga");
	$zebra2 = new Zebra("Zana", "F", 110, "Selous");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>

	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">
	<style>
	div {
		display: flex;
		margin-bottom: 100px;
	}
	section{
		margin: 30px 100px 0 0;
	}
</style>
</head>
<body>
	<a href="../">home</a>
	
	<div>
		<p>Animal class</p>
		<section>
			<?php
				echo "<p>name = " . $hond->getName() . "</p>";
				echo "<p>gender = " . $hond->getGender() . "</p>";
				echo "<p>health = " . $hond->getHealth() . "</p>";
				echo "<p>special move = " . $hond->doSpecialMove() . "</p>";
			?>
		</section>
		<section>
			<?php
				echo "<p>name = " . $kat->getName() . "</p>";
				echo "<p>gender = " . $kat->getGender() . "</p>";
				echo "<p>health = " . $kat->getHealth() . "</p>";
				echo "<p>special move = " . $kat->doSpecialMove() . "</p>";
			?>
		</section>
		<section>
			<?php
				echo "<p>name = " . $cavia->getName() . "</p>";
				echo "<p>gender = " . $cavia->getGender() . "</p>";
				echo "<p>health = " . $cavia->getHealth() . "</p>";
				echo "<p>special move = " . $cavia->doSpecialMove() . "</p>";

				$cavia->changeHealth(8);
				echo "<p>health changed -> " . $cavia->getHealth() . "</p>";
			?>
		</section>
	</div>


	<div>
		<p>Lion class SpecialMove</p>
		<section>
			<?php echo "<p>name is " . $lion1->getName() . " (soort is " . $lion1->getSpecies() . ") en special move is: " . $lion1->doSpecialMove() . "</p>";
				echo "<p>name is " . $lion2->getName() . " (soort is " . $lion2->getSpecies() . ") en special move is: " . $lion2->doSpecialMove() . "</p>";
			?>
		</section>			
	</div>

	<div>
		<p>Zebra class SpecialMove</p>
		<section>
			<?php echo "<p>name is " . $zebra1->getName() . " (soort is " . $zebra1->getSpecies() . ") en special move is: " . $zebra1->doSpecialMove() . "</p>";
				echo "<p>name is " . $zebra2->getName() . " (soort is " . $zebra2->getSpecies() . ") en special move is: " . $zebra2->doSpecialMove() . "</p>";
			?>
		</section>			
	</div>

</body>
</html>