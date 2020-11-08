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

	<body>

		<a>You guessed the word! Yay!</a>
		<a>Your current score is <?=$score ?>! </a>
		<a href="new-word.php">Try another word?</a>
		<a href="difficulty.php">Change difficulty?</a>
		<a href="logout.php">Logout</a>

	</body>

</html>