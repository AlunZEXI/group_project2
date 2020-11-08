<?php

	include 'common.php';
	session_handler();
	
	// easy and endless modes completely reset your mistake count when you win a round
	// normal mode subtracts one from your mistake count when you when a round
	// hard mode does nothing to your mistake count when you win a round
	$gamemode = $data['gamemode'];
	if ($gamemode == 'endless' || $gamemode == 'easy') {
		$data['mistakeCount'] = 0;
	} else if ($gamemode == 'normal') {
		$mistake_count = intval($data['mistakeCount']);
		$data['mistakeCount'] = strval($mistake_count - 1);
	}

	$data['state'] = 'running';
	$data['hintCount'] = 0;
	$data['lettersGuessed'] = 0;

	$new_word_and_hints = generate_word_and_hints();
	$data['word'] = $new_word_and_hints[0];
	$data['hint1'] = $new_word_and_hints[1];
	$data['hint2'] = $new_word_and_hints[2];
	$data['hint3'] = $new_word_and_hints[3];

	write_user_data($username, $data);

	header('Location: gameplay.php');
	exit();

?>