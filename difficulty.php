<?php

	include 'common.php';
	session_handler();
	
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
			<option value="" disabled selected></option>
			<option value="endless">Endless</option>
			<option value="easy">Easy</option>
			<option value="normal">Normal</option>
			<option value="hard">Hard</option>
		</select>
		<br>
		<input type="submit" value="Start Game">
</body>
</html>