<?php
include 'common.php';

//start session
session_start();
//set gameplay variables
$username = $_SESSION["username"];
$gamemode = $_SESSION["gamemode"];
$word = $_SESSION["word"];
$guess = $_POST["guess"];

if(!guess($guess, $word)){
    ++$_SESSION["mistakes"];
}

$mistakes = $_SESSION["mistakes"];
//print header
hangmanHeader();

?>
<br>
This session is for <?php print $_SESSION["username"]; ?>
<br>
<?php hangman($mistakes); ?>

<form action="gameplay_next.php"
        method="post">    
        Guess a letter: <input name="guess" type = "text" maxlength="1" size="3"/>
        <input type="submit" value="Guess"/>
</form>

<?php
hangmanFooter();
?>