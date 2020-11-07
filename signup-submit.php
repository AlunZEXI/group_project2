<?php

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

	$file_location = 'users/' . $username . '.txt';

	if (file_exists($file_location)) {
		header('Location: signup.php?err=1');
		exit();
	}

	file_put_contents($file_location, $password);

?>