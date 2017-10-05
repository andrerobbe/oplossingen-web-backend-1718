<?<?php 
$fruit = "ananas";
$posA = strrpos($fruit, 'a');
$fruitCapital = strtoupper($fruit);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php echo $fruit ?></p>
   <p><?= $posA ?></p>
   <p><?= $fruitCapital ?></p>

	
</body>
</html>