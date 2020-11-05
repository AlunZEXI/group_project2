<?php
include 'common.php';
hangmanHeader();
?>


<form action= "gamemode.php"
        method="get">

Returning user: <br>
Username: <input name="username" type = "text" maxlength="12" size="12"/>
<input type="submit" value="Start New Game"/>
</form>


<?php
hangmanFooter();
?>