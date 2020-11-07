<?php
include 'common.php';
$username = $_GET["username"];
if(userExists($username) == false){
    header('Location: login_error.php');
}
session_start();

$_SESSION["username"] = $username;
hangmanHeader();

?>

<form action= "gameplay.php"
        method="get"> 

Welcome <?php print $username . "!"; ?>
<br>

This session is for <?php print $_SESSION["username"]; ?>

<br>

Choose game mode: 
<select name="gamemode">
					<option value = "Endless">Endless</option>
					<option value = "Easy">Easy</option>
                    <option value = "Normal">Normal</option>
                    <option value = "Hard">Hard</option>
        </select>
<br>
<input type="submit" value="Start Game"> 


<?php


hangmanFooter();
?>