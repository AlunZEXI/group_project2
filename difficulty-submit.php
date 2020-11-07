<?php

	include 'common.php';

	session_start();
	$username = $_SESSION['username'];

	$file_contents = file_get_contents($file_location);
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