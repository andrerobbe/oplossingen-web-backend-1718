<?php
	
	$articles = array(
            array (
            	"title" => "Dit is het 1e artikel",
				"txt" => "Dit is de paragraaf van het eerste artikel",
				"tags" => "tag 1"),

			array (
				"title" => "Artikel #2",
				"txt" => "Hier staat wat anders",
				"tags" => "tag 1" )
	);

	include 'view/header-partial.html';
	include 'view/body-partial.html';
	include 'view/footer-partial.html';
?>