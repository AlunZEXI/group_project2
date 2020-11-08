<?php

	include 'common.php';

	session_save_path("session");
	session_start();
	$username = $_SESSION["username"];
	$data = read_user_data($username);

	$button_clicked = $_POST['next_button'];

	if ($button_clicked == 'Guess') {  // guessing a letter

		$guess = $_POST['guess'];
		$guess = strtolower($guess);

		$guessed_int = $data['lettersGuessed'];
		$guessed_array = int_to_bool_array($guessed_int);

		$char_pos = array_search($guess, $alphabet);

		if ($guessed_array[$char_pos]) {
			header('Location: gameplay.php?err=2');
			exit();
		} else {
			$guessed_array[$char_pos] = true;
			$data['lettersGuessed'] = bool_array_to_int($guessed_array);
		}

		if (guess_letter($username, $guess)) {
			
			// TODO probably needs to do nothing tho

		} else {
			$mistake_count = intval($data['mistakeCount']);

			if ($mistake_count == 5) {
				header('Location: loser.php');
				exit();
			}

			$data['mistakeCount'] = strval($mistake_count + 1);
		}
		
	} else if ($button_clicked == 'Hint') {  // wanting a hint

		$hint_count = intval($data['hintCount']);

		if ($hint_count < 3) {
			$data['hintCount'] = strval($hint_count + 1);
		} else {
			header('Location: gameplay.php?err=1');
			exit();
		}

	}

	write_user_data($username, $data);
	header('Location: gameplay.php');
	exit();

?>