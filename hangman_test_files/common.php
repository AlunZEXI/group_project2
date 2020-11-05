<?php
//header for page
function hangmanHeader() {
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Harry Potter Hangman</title>
</head>
<body>
<?php
}
//footer for page
function hangmanFooter() {
?>
</body>
</html>
<?php
}

function userExists($username): bool{
    $file = 'users.txt';
    $current = file_get_contents($file);
    $users = explode("\n", $current);
    foreach($users as $user) {
        if(strcmp($username, $user) == 0){
            return true;
        }
    }
    return false;
}



?>