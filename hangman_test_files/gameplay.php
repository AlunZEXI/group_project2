<?php
include 'common.php';

//retrieve gamemode from form
$gamemode = $_GET["gamemode"];
$refresh = false;
$mistakes = 0;
$score = 0;

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
$_SESSION["word"] = "blank"; //make array of words from text file.
$_SESSION["mistakes"] = $mistakes;
//print header
hangmanHeader();

?>
<br>
This session is for <?php print $_SESSION["username"]; ?>
<br>
<?php
hangman($mistakes);
?>

<form action="gameplay_next.php"
        method="post">    
        Guess a letter: <input name="guess" type = "text" maxlength="1" size="3"/>
        <input type="submit" value="Guess"/>
</form>

<?php
hangmanFooter();
?>