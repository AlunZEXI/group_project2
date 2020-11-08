<?php 
session_save_path("session");
session_start();

session_unset(); 
session_destroy(); ?>

<html>
    <head>
        <title> Thanks for playing! </title>

    </head>
    <body>
        Thanks for playing! 
        <br>
        <a href="index.php">Return to login page?</a>
    </body>
</html>