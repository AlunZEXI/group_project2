<?php
include 'common.php';

//retrieve gamemode from form
$gamemode = $_GET["gamemode"];
$refresh = false;
$mistakes = 0;
$score = 0;
$wordlist = wordList();
$wordArr = pickWord($wordlist);
$word = $wordArr[0];
$hints = hints($wordArr);
$guessedWord = guessedWord($word);

//decides whether or not the hangman refreshes
switch($gamemode){
    case "Endless":
        $refresh = true;
    case "Easy":
        $refresh = true;
}

//start session
session_start();
//set gameplay variables
$_SESSION["gamemode"] = $gamemode;
$_SESSION["score"] = $score;
$_SESSION["word"] = $word; //make array of words from text file.
$_SESSION["guessedword"] = $guessedWord;
$_SESSION["hints"] = $hints;
$_SESSION["wordlist"] = $wordlist;
$_SESSION["mistakes"] = $mistakes;
$_SESSION["numhints"] = 1;
//print header
hangmanHeader();

?>
<br>
This session is for <?php print $_SESSION["username"]; print "  word=" . $word; ?>
<br>
<?php
hangman($mistakes);
?>

<form action="gameplay_next.php"
        method="post">    
        Guess a letter: <input name="guess" type = "text" maxlength="1" size="3"/>
        <input type="submit" name="next_button" value="Guess"/>
        <br>
        Click for Hint: <input type="submit" name="next_button" value="Hint"/>
</form>

<?php
hangmanFooter();
?>