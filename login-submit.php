<?php

	include 'common.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (preg_match("/^$/", $username) || preg_match("/^$/", $password)) {
		header("Location: login.php?err=1");
		exit();
	}

	if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
		header('Location: login.php?err=2');
		exit();
	}

	if (check_password($username, $password)) {

		session_start();
		$_SESSION['username'] = $username;

		header('Location: resume.php');
		exit();

	} else {

		header('Location: login.php?err=2');
		exit();

	}

?>