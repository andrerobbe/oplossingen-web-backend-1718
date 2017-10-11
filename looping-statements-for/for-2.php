<?php

$rij = 11;
$kolom = 11;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>for loop</title>
	<link rel='stylesheet' href="http://web-backend.local/css/global.css">
	<link rel='stylesheet' href="http://web-backend.local/css/facade.css">
	<link rel='stylesheet' href="http://web-backend.local/css/directory.css">

	<style>
		.oneven { background-color: green; }
	</style>
</head>
<body>
	<table>
		<?php for ( $i=0;$i<$rij;++$i ){ ?>
			<tr>
				<?php for ( $j=0; $j<$kolom;++$j ){ ?>
					<?php $result = $i * $j ?>
					<td class="<?php ( $result % 2 ) ? print 'oneven' : print 'even'; ?>"><?php echo $result ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>

</body>
</html>