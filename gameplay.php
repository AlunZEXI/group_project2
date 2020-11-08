<?php

	include 'common.php';
	session_handler();

	$errors = array (
		1 => 'You have already used all three hints.',
		2 => 'You have already guessed that letter.',
		3 => 'You cannot guess nothing.'
	);

	$error = $_GET['err'];

	if (!$error == '') {
		$error_code = intval($error);
		echo '<a id="error">' . $errors[$error_code] . '</a>';
	}

	$guessed_int = $data['lettersGuessed'];
	$guessed_array = int_to_bool_array($guessed_int);

	$word = $data['word'];
	$word_split = str_split($word);

	$word_length = count($word_split);
	$shown_letters = array_fill(0, $word_length, '_');

	for ($a = 0; $a < $word_length; $a++) {
		$char_pos = array_search($word_split[$a], $alphabet);
		if ($guessed_array[$char_pos]) {
			$shown_letters[$a] = $word_split[$a];
		}
	}

	if (array_search('_', $shown_letters) === false) {
		$data['state'] = 'winner';
		write_user_data($username, $data);
		header('Location: winner.php');
		exit();
	}

	$hint_count = $data['hintCount'];

	$mistake_count = intval($data['mistakeCount']);
	hangman($mistake_count);

	echo '<br />';

	if ($hint_count != 0) {
		echo $data['hint1'] . '<br />';
	}

	if ($hint_count >= 2) {
		echo $data['hint2'] . '<br />';
	}

	if ($hint_count == 3) {
		echo $data['hint3'] . '<br />';
	}

?>

<html>

	<head>
		<title> Team AEIOU: Hangman </title>
		<link rel="stylesheet" href="hangman.css">
	</head>

	<body>

		<table>
			<tr>

				<?php
				
					for ($a = 0; $a < $word_length; $a++) {
						echo '<th>' . $shown_letters[$a] . '</th>';
					}

				?>

			</tr>
		</table>

		<form action="gameplay-next.php" method="POST">
			Guess a letter: <input name="guess" type="text" maxlength="1" size="3" />
			<input type="submit" name="next_button" value="Guess" />
			<br>
			Click for Hint: <input type="submit" name="next_button" value="Hint" />
		</form>

	</body>

</html>