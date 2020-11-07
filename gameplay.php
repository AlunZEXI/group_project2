<?php

	include 'common.php';

	$errors = array (
		1 => 'You have already used all three hints.'
	);

	$error = $_GET['err'];

	if (!$error == '') {
		$error_code = intval($error);
		echo '<a id="error">' . $errors[$error_code] . '</a>';
	}

	session_start();
	$username = $_SESSION['username'];

	$mistakes = get_mistake_count($username);
	hangman($mistakes);

?>

<html>

	<body>

		<form action="gameplay-next.php" method="POST">
			Guess a letter: <input name="guess" type="text" maxlength="1" size="3" />
			<input type="submit" name="next_button" value="Guess" />
			<br>
			Click for Hint: <input type="submit" name="next_button" value="Hint" />
		</form>

	</body>

</html>