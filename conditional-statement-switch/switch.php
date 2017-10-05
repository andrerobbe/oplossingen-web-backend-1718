<?php
$getal = 3;
$string = '';

switch ($getal) { 
	case 1:
		$string = 'maandag';
		break;
	case 2:
		$string = 'dinsdag';
		break;
	case 3:
		$string = 'woensdag';
		break;
	case 4:
		$string = 'donderdag';
		break;
	case 5:
		$string = 'vrijdag';
		break;
	case 6:
		$string = 'zaterdag';
		break;
	case 7:
		$string = 'zondag';
		break;

	default:
		$string = "geen geldig getal";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>if-else</title>
</head>
<body>
	<p><?php echo $getal ?> is <?php echo $string ?></p>
	
</body>
</html>