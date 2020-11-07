<?php
include 'common.php';
hangmanHeader();
?>
<!DOCTYPE html>
<html>

<head>
    <title> front page </title>
    <link href="../styles.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <img src="./IMG/LOGO.PNG" style="display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;align-content:center;">

    <h1 style="color:white"> Welcome to our Harry Potter hangman game</h1>
    <div class="front_options"><a href="new_player.php">New Player<br></a></div>
    <div class="front_options"><a href="new_player.php">Returning<br></a></div>

    <br>
    <p>Results and page (C) Copyright AEIOU Inc.</p>
    <br>

</body>

</html>




<?php
hangmanFooter();
?>