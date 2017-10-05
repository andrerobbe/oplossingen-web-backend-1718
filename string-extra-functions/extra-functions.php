<?<?php 
$fruit = "kokosnoot";
$char = strlen($fruit);
$pos = strpos($fruit, 'o');


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php echo $fruit ?> bevat <?php echo $char ?> karakters</p>
	<p>O staat op positie <?php echo $pos ?>
	
</body>
</html>