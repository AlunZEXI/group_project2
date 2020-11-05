<?php
include 'common.php';

$gamemode = $_GET["gamemode"];
$refresh = false;
$penalty = 6;

//decides whether or not the hangman refreshes
switch($gamemode){
    case "Endless":
        $refresh = true;
    case "Easy":
        $refresh = true;
}



hangmanHeader();
?>




<?php
hangmanFooter();
?>