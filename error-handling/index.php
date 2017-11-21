<?php
	
	session_start();

	$isValidCode = false;

	try{
		if ( isset($_POST["submit"]) ){
			if ( isset($_POST["code"]) ){
				if ( strlen($_POST["code"]) == 8 ){
					$isValidCode = true;
				}
				else{
					throw new Exception( "Code length error" );
				}
			}
			else{
				throw new Exception( "Submit error" );
			}
		}
	}
	catch (Exception $e) {
		$messageCode = $e->getMessage();
		$createMssage = false;
		$message = [];
		switch ($messageCode) {
			case "Submit error":
				$message['txt'] = "Het code veld bestaat niet meer!";
				$message['type'] = "ERROR";
				break;
			case "Code length error":
				$message['txt'] = "De kortingscode heeft de foute lengte";
				$message['type'] = "ERROR";
				$createMessage = true;
				break;
		}

        if ( $createMessage ){
        	createMessage($message);
        }

        logToFile($message);
	}


	$message = getMessage();

	function getMessage(){
		$message = false;

		if ( isset( $_SESSION[ 'message' ] ) ) {
			$message = $_SESSION[ 'message' ];
			unset( $_SESSION[ 'message' ] );
		}
		return $message;
	}

	function createMessage($message){
		$_SESSION['message'] = $message;
	}

	function logToFile($message){
		$file = "log.txt";
		$date = "[" . date( "H:i:s d/m/Y" ) . "]";
		$ip = $_SERVER['REMOTE_ADDR'];
		$type = " Type: [" . $message['type'] . "]";
		$text = $message['txt'];

		#$errorLine = file_get_contents($file);
		$errorLine = $date . $ip . $type . $text . "\n\r\n\r";
		# .=  adds line to current file instead of overwriting, or use FILE_APPEND in file_put_contents
		file_put_contents($file, $errorLine, FILE_APPEND);
	}


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
		.success, .error{
			border: 1px solid;
			margin: 10px 0px;
			padding:15px 10px 15px 50px;
			background-repeat: no-repeat;
			background-position: 10px center;
		}
		.error {
			color: #D8000C;
			background-color: #FFBABA;
		}
		.success {
			color: #4F8A10;
			background-color: #DFF2BF;
		}
	</style>
</head>
<body>
	<a href="../">home</a>
	<a href="/error-handling">reset</a>
	<?php if($isValidCode): ?>
		<p class="success">Uw kortingscode werd goedgekeurd</p>
	<?php endif ?>
    
	<?php if( !$isValidCode ): ?>
	<h1>Geef uw kortingscode op!</h1>
		<?php if ( isset( $createMessage) ) :?>
		<p class="error">De kortingscode is niet juist</p>
		<?php endif ?>
		<form action="index.php" method="post">
			<label for="code">U kortingscode:</label><br>
			<input type="text" name="code" id="code"><br>
			<button type="submit" name="submit">Verzenden</button>
		</form>
	<?php endif ?>
</body>
</html>