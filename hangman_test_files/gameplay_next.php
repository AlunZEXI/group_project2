<?php
include 'common.php';

//start session
session_start();
//set gameplay variables
$username = $_SESSION["username"];
$gamemode = $_SESSION["gamemode"];
$word = $_SESSION["word"];
$guess = $_POST["guess"];
$hints = $_SESSION["hints"];
$hint = "";
$numhints = $_SESSION["numhints"];


if($_POST['next_button'] == 'Guess'){
    //$pos = strpos($word, $guess);
    if(guess($word, $guess) === false){
        ++$_SESSION["mistakes"];
    }
}
if($_POST['next_button'] == 'Hint'){
    if($numhints > 3){
        $hint = "No more hints left";
    }else{
        $hint = $hints[$numhints];
        $_SESSION["numhints"]++;
    }

}
$mistakes = $_SESSION["mistakes"];
//print header
hangmanHeader();

?>
<br>
This session is for <?php print $_SESSION["username"];  print "  word=" . $word;  ?>
<br>
<?php hangman($mistakes); ?>

<form action="gameplay_next.php"
        method="post">    
        Guess a letter: <input name="guess" type = "text" maxlength="1" size="3"/>
        <input type="submit"  name="next_button" value="Guess"/>
        <br>
        Click for Hint: <input type="submit" name="next_button" value="Hint"/> <?php print($hint); ?>
</form>

<?php
hangmanFooter();
?>