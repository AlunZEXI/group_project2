<?php

	include 'common.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (preg_match("/^$/", $username) || preg_match("/^$/", $password)) {
		header("Location: signup.php?err=3");
		exit();
	}

	if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
		header('Location: signup.php?err=2');
		exit();
	}

	if (file_exists(get_user_file_location($username))) {
		header('Location: signup.php?err=1');
		exit();
	}

	write_new_account_info($username, $password);

	$data['state'] = 'newgame';
	write_user_data($username, $data);

	session_start();
	$_SESSION['username'] = $username;

	header('Location: difficulty.php');
	exit();

?>