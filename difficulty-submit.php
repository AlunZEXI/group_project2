<?php

	include 'common.php';

	session_start();
	$username = $_SESSION['username'];
	$data = read_user_data($username);

	// check for errors in user's data

	$data['gamemode'] = $_POST['gamemode'];
	$data['mistakeCount'] = 0;
	$data['score'] = 0;
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