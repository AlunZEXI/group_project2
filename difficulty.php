<?php

	include 'common.php';
	session_handler();

	$errors = array (
		1 => 'You must select a difficulty.'
	);

	$error = $_GET['err'];

	if (!$error == '') {
		$error_code = intval($error);
		echo '<a id="error">' . $errors[$error_code] . '</a>';
	}
	
?>

<html>

	<head>
		<title>Gamemode</title>
		<link rel="stylesheet" href="hangman.css" />
	</head>
	<body class="difficulty">
	<form action="difficulty-submit.php" method="POST">

		Welcome <?php print $username . "!";?>
		<br>

		This session is for <?php print $username?>

		<br>

		Choose game mode:
		<select name="gamemode">
			<option value="" hidden selected></option>
			<option value="endless">Endless</option>
			<option value="easy">Easy</option>
			<option value="normal">Normal</option>
			<option value="hard">Hard</option>
		</select>
		<br>
		<input type="submit" value="Start Game">
</body>
</html>