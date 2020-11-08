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

	// BELOW: USER DATA FILE FUNCTIONS

	function get_user_file_location($username) {
		return 'users/' . $username . '.txt';
	}

	function write_user_data($username, $data) {
		$output_string = 'password:' . read_user_data($username)['password'];
		foreach ($data as $key => $value) {
			$output_string = $output_string . ',' . $key . ':' . $value;
		}
		file_put_contents(get_user_file_location($username), $output_string);
	}

	function read_user_data($username): array {
		$file_contents = file_get_contents(get_user_file_location($username));
		$array = explode(',', $file_contents);
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
		foreach ($array as $pos => $bool) {
			if ($bool) $output = $output + pow(2, $pos);
		}
		return $output;
	}

?>