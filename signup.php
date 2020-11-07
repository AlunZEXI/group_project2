<?php

	include 'common.php';

	$errors = array (
		1 => 'That username is already taken.',
		2 => 'You cannot have special characters in your username.',
		3 => 'Your username and/or password cannot be blank.'
	);

	$error = $_GET['err'];

	if (!$error == '') {
		$error_code = intval($error);
		echo '<a id="error">' . $errors[$error_code] . '</a>';
	}

?>

<html>

	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="hangman.css" />
	</head>

	<body>

		<form action="signup-submit.php" method="post">

			<fieldset>

				<label>Username:
					<input type="text" name="username" size=16>
				</label>

				<label>Password:
					<input type="password" name="password" size=16>
				</label>

				<input type="submit" value="Sign up">

			</fieldset>

		</form>

	</body>

</html>