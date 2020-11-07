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
function guess($guess, $word){
    $pos = strpos($word, $guess);
    return $pos === true;
}

?>