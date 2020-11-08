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
//get the user id from the last page, getting the failure left for that user
$name = $_GET["name"];
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

        $falsure = $line;
      
    }
}
?>
<?php 
if($fresh == "true"){
    $file_words = fopen("words.txt","r");
    $word = fgets($file_words);
    $missing = rand(0,strlen($word)-1);
    $headw = substr($word, 0, $missing);
    $bottomw = substr($word, $missing+1, strlen($word));
    $correct = substr($word, $missing, $missing+1);
    $target = "guess.txt";
    $store = $name.",".$word.",".$missing.",".$correct."\n"; 
    file_put_contents($target,$store,FILE_APPEND);
    print "<p>".$headw."</p>";
?>
<form action="hangman_next.php" method="get">
    
    <input type="text" name="charmissing" maxlength="1" size="2" style="clear: both;" required>
    <?php 
    print "<p>".$bottomw."\n</p>";
    ?>
    <p>
    <input type="submit" value="Check ">
    </p>

</form>

</div>
<?php 
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