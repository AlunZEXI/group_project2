<?php

	include 'common.php';
	
	session_start();
	$username = $_SESSION['username'];
	$data = read_user_data($username);

?>

<html>

	<body>
		You lost! :(

		<a href="difficulty.php">Start a new game?</a>
		<a href="leaderboards.php">Look at Leaderboards?</a>
		<a href="logout.php">Logout</a>
	</body>

</html>