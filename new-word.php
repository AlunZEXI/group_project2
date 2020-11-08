<?php

	include 'common.php';
	session_handler();

	$data['mistakeCount'] = 0;  // changes based on difficulty
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