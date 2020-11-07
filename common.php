<?php
//header for page
function hangmanHeader() {
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Harry Potter Hangman</title>
    <link rel="stylesheet" href="hp_hangman.css">
</head>
<body>
<?php
}
//footer for page
function hangmanFooter() {
?>
</body>
</html>
<?php
}

function userExists($username): bool{
    $file = 'users.txt';
    $current = file_get_contents($file);
    $users = explode("\n", $current);
    foreach($users as $user) {
        if(strcmp($username, $user) == 0){
            return true;
        }
    }
    return false;
}
//print out hangman image based on how many mistakes the user makes
function hangman($mistakes) {
    $gameimage = array("hagrid/hagrid0.png", "hagrid/hagrid1.png", "hagrid/hagrid2.png",
    "hagrid/hagrid3.png", "hagrid/hagrid4.png", "hagrid/hagrid5.png", "hagrid/gameover.png");
?>
<div class = "gamebox">
<img src=<?php print($gameimage[$mistakes]) ?>>

</div>
<?php       
}
function guess($word, $guess){
    $pos = strpos($word, $guess);
    return $pos === true;
}

function printHint($hints){
        print($hints[1]);
}

function guess_letter($username, $guess) {
	$data = read_user_data($username);

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
		file_put_contents($file_location, $output_string);
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