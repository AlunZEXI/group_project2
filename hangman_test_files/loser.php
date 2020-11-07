<?php
include 'common.php';
session_start();
hangmanHeader();
?>

You lost! :(

<a href="difficulty.php">Start a new game?</a>
<a href="leaderboards.php">Look at Leaderboards?</a>
<a href ="logout.php">Logout</a>

<?php
hangmanFooter();
?>