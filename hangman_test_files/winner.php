<?php
include 'common.php';
session_start();
hangmanHeader();
?>

You guessed the word! Yay!
<br>
<a href="difficulty.php">Try another word?</a>
<a href ="logout.php">Logout</a>




<?php
//get gamemode of user
//get score of user
//store in appropriate score file
hangmanFooter();
?>