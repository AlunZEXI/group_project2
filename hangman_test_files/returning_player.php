<?php
include 'common.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Project 2 Login</title>
    <link rel="stylesheet" href="../login-page.css">
</head>
<body>
        <main id="main-holder">
                <h1 id="login-header">AEIOU'S Hangman Login</h1>

                <div id="login-error-msg-holder">
                <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
                </div>

                <form id="login-form" action= "gamemode.php"
                        method="get">
                <input type="text" name="username" id="username-field" class="login-form-field" placeholder="Username" maxlength="12">
                <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password">
                <input type="submit" value="Login" id="login-form-submit">
                </form>
        </main>
</body>
</html>