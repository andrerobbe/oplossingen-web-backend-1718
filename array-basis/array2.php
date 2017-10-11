<?php
$cijferArray = array(1, 2, 3, 4, 5);

$result[] = $cijferArray[0] * $cijferArray[0];
$result[] = $cijferArray[1] * $cijferArray[1];
$result[] = $cijferArray[2] * $cijferArray[2];
$result[] = $cijferArray[3] * $cijferArray[3];
$result[] = $cijferArray[4] * $cijferArray[4];

$array2 = array(5, 4, 3, 2, 1);
$tel[] = $cijferArray[0] + $array2[0];
$tel[] = $cijferArray[1] + $array2[1];
$tel[] = $cijferArray[2] + $array2[2];
$tel[] = $cijferArray[3] + $array2[3];
$tel[] = $cijferArray[4] + $array2[4];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>array basis 2</title>
</head>
<body>  
	<?php var_dump($result) ?>
   <?php var_dump($cijferArray) ?>

   <p>
	<?php
		if ($result[0] %2 != 0){
		    echo 'result[0]=' . $result[0];
		}
		if ($result[1] %2 != 0){
		    echo 'result[1]=' . $result[1];
		}
		if ($result[2] %2 != 0){
		    echo 'result[2]=' . $result[2];
		}
		if ($result[3] %2 != 0){
		    echo 'result[3]=' . $result[3];
		}
		if ($result[4] %2 != 0){
		    echo 'result[4]=' . $result[4];
		}
	?>
   </p>
   
    <p>optelling 1: <?= $tel[0] ?></p>
    <p>optelling 2: <?= $tel[1] ?></p>
    <p>optelling 3: <?= $tel[2] ?></p>
    <p>optelling 4: <?= $tel[3] ?></p>
    <p>optelling 5: <?= $tel[4] ?></p>
</body>
</html>