<?php

	include 'common.php';

	$endless_leaderboard = read_leaderboard('endless');
	$endless_keys = array_keys($endless_leaderboard);
	$endless_values = array_values($endless_leaderboard);

	$easy_leaderboard = read_leaderboard('easy');
	$easy_keys = array_keys($easy_leaderboard);
	$easy_values = array_values($easy_leaderboard);

	$normal_leaderboard = read_leaderboard('normal');
	$normal_keys = array_keys($normal_leaderboard);
	$normal_values = array_values($normal_leaderboard);

	$hard_leaderboard = read_leaderboard('hard');
	$hard_keys = array_keys($hard_leaderboard);
	$hard_values = array_values($hard_leaderboard);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link rel="stylesheet" href="./hangman.css" />
	</head>

	<body class="login-body">
		<div class="leaderboard">
		<table>
    		<tr>
        		<th colspan=2>Endless</th>
        		<th colspan=2>Easy</th>
        		<th colspan=2>Normal</th>
        		<th colspan=2>Hard</th>
    		</tr>
    		<tr>
				<td> <?=$endless_keys[0] ?> </td>
				<td> <?=$endless_values[0] ?> </td>
				<td> <?=$easy_keys[0] ?> </td>
				<td> <?=$easy_values[0] ?> </td>
				<td> <?=$normal_keys[0] ?> </td>
				<td> <?=$normal_values[0] ?> </td>
				<td> <?=$hard_keys[0] ?> </td>
				<td> <?=$hard_values[0] ?> </td>
			</tr>
			<tr>
				<td> <?=$endless_keys[1] ?> </td>
				<td> <?=$endless_values[1] ?> </td>
				<td> <?=$easy_keys[1] ?> </td>
				<td> <?=$easy_values[1] ?> </td>
				<td> <?=$normal_keys[1] ?> </td>
				<td> <?=$normal_values[1] ?> </td>
				<td> <?=$hard_keys[1] ?> </td>
				<td> <?=$hard_values[1] ?> </td>
			</tr>
			<tr>
				<td> <?=$endless_keys[2] ?> </td>
				<td> <?=$endless_values[2] ?> </td>
				<td> <?=$easy_keys[2] ?> </td>
				<td> <?=$easy_values[2] ?> </td>
				<td> <?=$normal_keys[2] ?> </td>
				<td> <?=$normal_values[2] ?> </td>
				<td> <?=$hard_keys[2] ?> </td>
				<td> <?=$hard_values[2] ?> </td>
			</tr>
			<tr>
				<td> <?=$endless_keys[3] ?> </td>
				<td> <?=$endless_values[3] ?> </td>
				<td> <?=$easy_keys[3] ?> </td>
				<td> <?=$easy_values[3] ?> </td>
				<td> <?=$normal_keys[3] ?> </td>
				<td> <?=$normal_values[3] ?> </td>
				<td> <?=$hard_keys[3] ?> </td>
				<td> <?=$hard_values[3] ?> </td>
			</tr>
			<tr>
				<td> <?=$endless_keys[4] ?> </td>
				<td> <?=$endless_values[4] ?> </td>
				<td> <?=$easy_keys[4] ?> </td>
				<td> <?=$easy_values[4] ?> </td>
				<td> <?=$normal_keys[4] ?> </td>
				<td> <?=$normal_values[4] ?> </td>
				<td> <?=$hard_keys[4] ?> </td>
				<td> <?=$hard_values[4] ?> </td>
			</tr>
		</table>
		</div>
		<div class="guessbox">
			<a href="index.php">Back to Main Page</a> <br>
		</div>
	</body>

</html>
