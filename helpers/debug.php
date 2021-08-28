<?php

function dd($var)
{
	http_response_code(500);

	if (is_null($var) || $var === ''){
		var_dump($var);
	} else {
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}

	exit(1);
}