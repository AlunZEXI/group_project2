<?php

	include 'common.php';

	$errors = array (
		1 => 'The username and/or password cannot be blank.',
		2 => 'Incorrect username and/or password.'
	);

	$error = $_GET['err'];

?>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link rel="stylesheet" href="./hangman.css" />
	</head>

	<body>
		<main id="main-holder">

			<h1 id="login-header">AEIOU'S Hangman Login</h1>

				<?php
					if (!$error == '') {
						$error_code = intval($error);
						echo '<div id="login-error-msg-holder">' . $errors[$error_code] . '</div>';
					}
				?>

			<form id=login-form" action="login-submit.php" method="post">

				<label>Username:
					<input type="text" class="login-form-field" id="username-field" name="username" maxlength="16" size=16>
				</label>

				<label>Password:
					<input type="password" class="login-form-field" id="password-field" name="password" maxlength="16" size=16>
				</label>

				<input type="submit" value="Sign up" id="login-form-submit">

			</form>

		</main>

	</body>

</html>