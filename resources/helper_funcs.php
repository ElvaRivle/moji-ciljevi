<?php
function dnd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function sanitize($dirty) {
	return htmlentities($dirty, ENT_QUOTES, 'UTF-8'); 
}

function clean_POST() {
	$cleanArray = [];
	foreach($_POST as $key => $value) {
		$cleanArray[$key] = sanitize($value);
	}
	return $cleanArray;
}
?>