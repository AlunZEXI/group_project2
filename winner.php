<?php

	include 'common.php';
	session_handler();

	$score = intval($data['score']);
	$score = $score + 10;

	$gamemode = $data['gamemode'];

?>

<html>

	<body>

		<a>You guessed the word! Yay!</a>
		<a href="new-word.php">Try another word?</a>
		<a href="difficulty.php">Change difficulty?</a>
		<a href="logout.php">Logout</a>

	</body>

</html>