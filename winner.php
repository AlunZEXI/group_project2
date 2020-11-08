<?php

	include 'common.php';

	session_start();
	$username = $_SESSION['username'];
	$data = read_user_data($username);

?>

<html>

	<body>

		<a>You guessed the word! Yay!</a>
		<a href="new-word.php">Try another word?</a>
		<a href="difficulty.php">Change difficulty?</a>
		<a href="logout.php">Logout</a>

	</body>

</html>