<?php

	include 'common.php';

	session_start();
	$username = $_SESSION['username'];
	$data = read_user_data($username);

	// check for errors in user's data

	if ($data['state'] == 'newgame') {
		header('Location: difficulty.php');
		exit();
	} else {
		header('Location: gameplay.php');
		exit();
	}

?>