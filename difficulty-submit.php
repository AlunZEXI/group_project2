<?php

	include 'common.php';
	session_handler();

	$new_data['gamemode'] = $_POST['gamemode'];

	if (preg_match("/^$/", $new_data['gamemode'])) {
		header("Location: difficulty.php?err=1");
		exit();
	}

	$new_data['state'] = 'running';
	$new_data['mistakeCount'] = 0;
	$new_data['score'] = 0;
	$new_data['hintCount'] = 0;
	$new_data['lettersGuessed'] = 0;

	$new_word_and_hints = generate_word_and_hints();
	$new_data['word'] = $new_word_and_hints[0];
	$new_data['hint1'] = $new_word_and_hints[1];
	$new_data['hint2'] = $new_word_and_hints[2];
	$new_data['hint3'] = $new_word_and_hints[3];

	write_user_data($username, $new_data);

	header('Location: gameplay.php');
	exit();

?>