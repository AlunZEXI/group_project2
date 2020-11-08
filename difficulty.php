<?php

	include 'common.php';

	session_start();
	$username = $_SESSION['username'];
	
?>

<html>

	<head>
		<title>Gamemode</title>
		<link rel="stylesheet" href="hangman.css" />
	</head>

	<form action="difficulty-submit.php" method="POST">

		Welcome <?php print $username . "!";?>
		<br>

		This session is for <?php print $username?>

		<br>

		Choose game mode:
		<select name="gamemode">
			<option value="Endless">Endless</option>
			<option value="Easy">Easy</option>
			<option value="Normal">Normal</option>
			<option value="Hard">Hard</option>
		</select>
		<br>
		<input type="submit" value="Start Game">

</html>