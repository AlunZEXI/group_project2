<?php

	include 'common.php';
	session_handler();

	$errors = array (
		1 => 'You have already used all three hints.',
		2 => 'You have already guessed that letter.',
		3 => 'You cannot guess nothing.'
	);

	$error = $_GET['err'];

	

	$guessed_int = $data['lettersGuessed'];
	$guessed_array = int_to_bool_array($guessed_int);

	$word = $data['word'];
	$word_split = str_split($word);

	$word_length = count($word_split);
	$shown_letters = array_fill(0, $word_length, '_');

	for ($a = 0; $a < $word_length; $a++) {
		if ($word_split[$a] == '-') {
			$shown_letters[$a] = '-';
		} else {
			$char_pos = array_search($word_split[$a], $alphabet);
			if ($guessed_array[$char_pos]) {
				$shown_letters[$a] = $word_split[$a];
			}
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
	

?>
<!DOCTYPE html>
<html>

	<head>
		<title> Team AEIOU: Hangman </title>
		<link rel="stylesheet" href="hangman.css">
	</head>

	<body class="gameplay">
		<?php
			hangman($mistake_count);

			echo '<br />';
		
			
		?>
	<div class="guessbox">
		<?php
		
			if ($hint_count != 0) {
				echo 'Hint: ' . $data['hint1'] . ', ';
			}
		
			if ($hint_count >= 2) {
				echo $data['hint2'] . ', ';
			}
		
			if ($hint_count == 3) {
				echo $data['hint3'] . '<br />';
			}

		?>
		<table>
			<tr>

				<?php
				
					for ($a = 0; $a < $word_length; $a++) {
						if ($shown_letters[$a] == '-') {
							echo '<th class="word-space"></th>';
						} else if ($shown_letters[$a] == '-') {
							echo '<th class="word-unknown"></th>';
						} else {
							echo '<th class="word-letter">' . $shown_letters[$a] . '</th>';
						}
					}

				?>

			</tr>
		</table>
		
		<form action="gameplay-next.php" method="POST">
			Guess a letter: <input name="guess" type="text" maxlength="1" size="3" />
			<input type="submit" name="next_button" value="Guess" class="guess-and-hint" />
			Click for Hint: <input type="submit" name="next_button" value="Hint" class="guess-and-hint" />
			<br>
			<a href="logout.php">Logout</a>
		</form>
		<?php
			if (!$error == '') {
				$error_code = intval($error);
				echo '<a id="error">' . $errors[$error_code] . '</a>';
			}
		?>
		</div>

	</body>

</html>