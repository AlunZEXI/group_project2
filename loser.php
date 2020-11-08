<?php

	include 'common.php';
	session_handler();

	$new_data['state'] = 'newgame';
	write_user_data($username, $new_data);

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link rel="stylesheet" href="./hangman.css" />
	</head>

	<body class="gameplay">

		<?php
			hangman(6);
		?>
				<h1>You lost! :(</h1>
		<div class="guessbox">
			<a href="difficulty.php">Start a new game?</a> <br>
			<a href="leaderboards.php">Look at Leaderboards?</a> <br>
			<a href="logout.php">Logout</a> <br>
		</div>
	</body>

</html>