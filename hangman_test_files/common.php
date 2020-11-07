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
function hangman($mistakes){
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

function wordList(): array{
    $file = 'words.txt';
    $current = file_get_contents($file);
    $wordlist = explode("\n", $current);
    return $wordlist;
}

function pickWord($wordlist): array{
    $listlen = count($wordlist);
    $word_and_hints = explode(",",$wordlist[rand(0,$listlen-1)]);
    return $word_and_hints;
}

function hints($word_and_hints){
    $hints = $word_and_hints;
    unset($hints[0]);
    return $hints;
}

function printHint($hints){
        print($hints[1]);
}

function guessedWord($word): array{
    $length = strlen($word);
    $fillin = array_fill(0, $length, "_");
    return $fillin;
}

function inputGuess($guess, $word, $guessedWord){
    $wordArr = str_split($word);
    for($x = 0; $x < count($wordArr); $x++){
        if(strcmp($guess, $wordArr[$x])==0){
            $guessedWord[$x] = $guess;
        }
    }
    return $guessedWord;
}

function winner($guessedWord, $word): bool{
    $gluedWord = implode($guessedWord);
    if(strcmp($gluedWord, $word) == 0){
        return true;
    }
    return false;
}

function recordScore($username, $score, $gamemode){
    $filename = 'scores/' . $gamemode . '.txt';
    $current = file_get_contents($filename);
    $userscore = $username . "," . $score;
    $current += '\n' . $userscore . '\n';
    file_put_contents($filename, $current);

}


?>