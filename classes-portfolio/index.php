<?php

	spl_autoload_register( function($class_name){
		include 'classes/' . $class_name . '.php';
	});

	$body = "body.partial.html";
	if ( isset( $_GET["page"] ) ){
		$body = $_GET["page"] . '.html';
	}

	$html = new HTMLBuilder('header.partial.html', $body, 'footer.partial.html');
?>