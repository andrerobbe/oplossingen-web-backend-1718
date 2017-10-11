<?php

$rij = 10;
$kolom = 10;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>for loop</title>
	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">

</head>
<body>
	<table>
		<?php for ( $i=0;$i<$rij;++$i ){ ?>
			<tr>
				<?php for ( $j=0; $j<$kolom;++$j ){ ?>
					<td>kolom</td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>

</body>
</html>