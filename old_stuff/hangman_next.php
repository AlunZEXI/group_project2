<!DOCTYPE html>
<html>
<head>
<title> front page </title>
<link href="styles.css" type="text/css" rel="stylesheet" />
</head>

<body>
<img src="./IMG/LOGO.PNG" style="display: block;margin-left: auto;margin-right: auto;width: 50%;align-content:center;">
<p style="color:white">Dig Your Own Story. </p>

<div class="guessbox">
<?php 
$guess = $_GET["guess"];
$file_answer = fopen("guess.txt","r");
$lineg = fgets($file_guess);
$name = substr($lineg, 0, strpos($lineg,","));
$lineg = substr($lineg,strpos($lineg,",")+1);
$word = substr($lineg, 0, strpos($lineg,","));
$lineg = substr($lineg,strpos($lineg,",")+1);
$correct = $lineg;

$fileu = fopen("users.txt","r");
while(! feof($fileu)){
    $line = fgets($fileu);
    $nn = substr($line, 0, strpos($line,","));
    if($nn == $name){
        $line = substr($line,strpos($line,",")+1);

        $password = substr($line, 0, strpos($line,","));
        $line = substr($line,strpos($line,",")+1);

        $fresh = substr($line, 0, strpos($line,","));
        $line = substr($line,strpos($line,",")+1);

        $failsure = $line;
    }
}
if($correct == $guess){ 
    //$failsure = $failsure + 1;
    ?>
    <h1>Congradulation! <h1>
    <p>You won last round (<?php print $failsure." "?>failure left)</p>
    <p><a href="">Go next round</a> </p>
    <?php 
}
else{ 
    $failsure = $failsure - 1;
    if ($failsure > 0){
        $info = $name.",".$password.",".$fresh.",".$failsure."\n";
        $target = "users.txt";
        file_put_contents($target,$info,FILE_APPEND);
    ?>
    <h1>Sadly <h1>
    <p>You lost last round (<?php print $failsure." "?>failure left)</p>
    <p><a href="">Go next round</a> </p>
    <?php
    } 
}
?>
</div>

<p>Thank you for playing our game! </p>
<br>
<p>Results and page (C) Copyright AEIOU Inc.</p>
<a href="https://codd.cs.gsu.edu/~zguo6/HW/HW3/index.html"><img src = "arrow.jpg" style="widows: 25px; height:25px;">Back to front page </a>
<br>

<a href="https://www.w3schools.com/html/default.asp"><img src = "W3C1.jpg" style="width:50px; height:50px;"> </a>
<a href="https://www.w3schools.com/css/default.asp"><img src = "W3C2.png" style="width:50px; height:50px;"> </a>
</body>

</html>