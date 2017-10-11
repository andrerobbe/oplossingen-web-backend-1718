<?php 
	$getallen = Array(8, 7, 8, 3, 2, 1, 2, 4);
	$result = array_unique($getallen);
	asort($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>array functions 3</title>
</head>
<body>
	<?php var_dump($result); ?>
	
</body>
</html>