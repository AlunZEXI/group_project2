<?php

	$alphabet = array (
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
		'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
	);

	function hangman($mistakes) {

    	$gameimage = array("hagrid/hagrid0.png", "hagrid/hagrid1.png", "hagrid/hagrid2.png",
    	"hagrid/hagrid3.png", "hagrid/hagrid4.png", "hagrid/hagrid5.png", "hagrid/gameover.png");
		?>
		<div class = "gamebox">
			<img src=<?php print($gameimage[$mistakes]) ?>>
		</div>
		<?php       

	}

	function guess_letter($username, $guess): bool {

		$data = read_user_data($username);
		$word = $data['word'];
		$pos = strpos($word, $guess);
		if ($pos !== false) {
			return true;
		} else {
			return false;
		}

	}

	function generate_word_and_hints(): array {
		
		$file_contents = file_get_contents('words.txt');
		$word_list = explode(PHP_EOL, $file_contents);
		$length = count($word_list);
		$chosen_string = $word_list[rand(0, $length - 1)];
		$word_and_hints = explode(',', $chosen_string);
		return $word_and_hints;

	}

	// BELOW: LEADERBOAD FUNCTIONS

	function get_gamemode_file_location($gamemode): string {

		$leaderboard_files = array (
			'endless' => 'scores/endless.txt',
			'easy' => 'scores/easy.txt',
			'normal' => 'scores/normal.txt',
			'hard' => 'scores/hard.txt'
		);

		return $leaderboard_files[$gamemode];

	}

	function read_leaderboard($gamemode): array {

		$file_location = get_gamemode_file_location($gamemode);
		if (file_exists($file_location)) {

			$file_contents = file_get_contents($file_location);
			$scores = explode(PHP_EOL, $file_contents);

			foreach ($scores as $score) {
        		$score = explode(":", $score);
        		$score_list[$score[0]] = $score[1];
			}

			arsort($score_list);  // sores values numerically

			return $score_list;

		} else {
			
			return [];
		}
		
	}

	function write_leaderboard($gamemode, $array) {

		$output_string = "";
		
		foreach ($array as $key => $value) {
			$output_string = $output_string . PHP_EOL . $key . ':' . $value;
		}

		$file_location = get_gamemode_file_location($gamemode);
		file_put_contents($file_location, $output_string);

	}

	function submit_score($gamemode, $username, $score) {

		$leaderboard = read_leaderboard($gamemode);

		$last_key = array_key_last($leaderboard);
		if ($leaderboard[$last_key] < $score) {
			$leaderboard[$username] = $score;
			arsort($leaderboard);
			$last_key = array_key_last($leaderboard);
			unset($leaderboard[$last_key]);
			write_leaderboard($gamemode, $leaderboard);
		}
		

	}

	// BELOW: SESSION HANDLING FUNCTIONS

	function session_handler() {
		global $username, $data;
		session_save_path("session");
		session_start();
		$username = $_SESSION['username'];
		$data = read_user_data($username);

	}

	// BELOW: PASSWORD FILE FUNCTIONS

	function check_password($username, $password): bool {

		$file_contents = file_get_contents('passwords.txt');
		$raw_text = explode(PHP_EOL, $file_contents);

		foreach ($raw_text as $line) {

			$split = explode(':', $line);
			if ($split[0] == $username) {

				if ($split[1] == $password) {
					return true;
				} else {
					return false;
				}

			}

		}

		return false;

	}

	function write_new_account_info($username, $password) {

		$save_to_file = PHP_EOL . $username . ':' . $password;
		file_put_contents('passwords.txt', $save_to_file, FILE_APPEND);

	}

	// BELOW: USER DATA FILE FUNCTIONS

	function get_user_file_location($username) {
		return 'users/' . $username . '.txt';
	}

	function write_user_data($username, $data) {
		
		$output_string = "";
		
		foreach ($data as $key => $value) {
			if ($key != '') $output_string = $output_string . PHP_EOL . $key . ':' . $value;
		}

		file_put_contents(get_user_file_location($username), $output_string);

	}

	function read_user_data($username): array {

		$file_contents = file_get_contents(get_user_file_location($username));
		$array = explode(PHP_EOL, $file_contents);

		foreach ($array as $item) {
			$split = explode(':', $item);
			$output[$split[0]] = $split[1];
		}

		return $output;

	}

	// BELOW: INTEGER - BOOLEAN ARRAY IMPLEMENTATION

	function int_to_bool_array($number): array {

		$output = array();
		$factor = intval(log($number, 2) + 1);

		while ($factor >= 1) {
			if ($number - pow(2, $factor - 1) >= 0) {
				$number = $number - pow(2, $factor - 1);
				$output[$factor - 1] = true;
			} else {
				$output[$factor - 1] = false;
			}
			$factor = $factor - 1;
		}

		return $output;

	}

	function bool_array_to_int($array): int {

		$output = 0;

		foreach ($array as $pos => $bool) {
			if ($bool) $output = $output + pow(2, $pos);
		}

		return $output;

	}

?>