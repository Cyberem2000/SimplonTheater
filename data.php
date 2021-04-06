<?php
	$data = trim(file_get_contents('data'));

	$data = explode('*', $data, 2);
	$nbRows = $data[0];

	$data = explode(':', $data[1], 2);
	$nbColumns = $data[0];

	$separ = ';';
	$data = explode($separ, $data[1], $nbRows * $nbColumns);
?>
