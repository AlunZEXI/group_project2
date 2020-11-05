<?php
include 'common.php';
hangmanHeader();
$username = $_POST["username"];
?>

Welcome <?php print $username . "!" ?>
<br>
<a href="returning_player.php">Sign in to start a new game!</a>

<?php
//could create individual user txt file here
$file = 'users.txt';
$current = file_get_contents($file);
//add new user to list of users
$current .= "\n" . $username;
file_put_contents($file, $current);

hangmanFooter();
?>