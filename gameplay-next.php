<?php

	include 'common.php';

	session_start();
	$username = $_SESSION["username"];
	$data = read_user_data($username);

	$button_clicked = $_POST['next_button'];
	if ($button_clicked == 'Guess') {

    	//$pos = strpos($word, $guess);
    	if (guess($word, $guess) === false) {
        	++$_SESSION["mistakes"];
		}
		
	} else if ($button_clicked == 'Hint') {

		$hintCount = intval($data['hintCount']);

		if ($hintCount < 3) {
			$data['hintCount'] = $hintCount + 1;
			write_user_data($username, $data);
		} else {
			header('Location: gameplay.php?err=1');
			exit();
		}

	}

	header('Location: gameplay.php');
	exit();

?>