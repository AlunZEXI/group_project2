<?php

	include 'common.php';
	session_handler();

	$button_clicked = $_POST['next_button'];

	if ($button_clicked == 'Guess') {  // making a guess

		$guess = $_POST['guess'];
		$guess = strtolower($guess);  // capitalization does not matter

		if (preg_match("/^$/", $guess)) {  // guessed nothing (blank input)
			header("Location: gameplay.php?err=3");
			exit();
		}

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
			
			// this is when their guess is right
			// probably needs to do nothing here tho

		} else {
			$mistake_count = intval($data['mistakeCount']);

			if ($mistake_count == 5) {
				$gamemode = $data['gamemode'];
				if ($gamemode != 'endless') {  // if on endless mode do not end the game
					header('Location: loser.php');
					exit();
				}
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