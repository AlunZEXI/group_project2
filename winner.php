<?php

	include 'common.php';
	session_handler();

	$gamemode = $data['gamemode'];
	$score = intval($data['score']);
	$state = $data['state'];
	if ($state == 'winner') {  // only update score if someone just finished their game
		$score = $score + 10;
		submit_score($gamemode, $username, $score);
	}

	$new_data['gamemode'] = $gamemode;
	$new_data['score'] = $score;
	$new_data['state'] = 'continue';
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
		<h1>You guessed the word! Yay!</h1>
		<h1>Your current score is <?=$score ?>!</h1>

		<div class="guessbox">
			
			<a href="new-word.php">Try another word?</a> <br>
			<a href="difficulty.php">Change difficulty?</a> <br>
			<a href="logout.php">Logout</a> <br>
		</div>

	</body>

</html>