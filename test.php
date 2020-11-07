<?php

	include 'common.php';

	$test_array = [true, true, false, true, false, false, true];

	$output = bool_array_to_int($test_array);
	print_r(int_to_bool_array($output));

?>