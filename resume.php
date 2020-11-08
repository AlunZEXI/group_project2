<?php

	include 'common.php';
	session_handler();

	// check for errors in user's data

	if ($data['state'] == 'newgame') {
		header('Location: difficulty.php');
		exit();
	} else {
		header('Location: gameplay.php');
		exit();
	}

?>