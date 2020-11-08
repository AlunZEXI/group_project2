<?php

	include 'common.php';

?>

<table>
    <tr>
        <th>Endless</th>
        <th>Easy</th>
        <th>Normal</th>
        <th>Hard</th>
    </tr>
    <tr>
        <td><?php printBoard('scores/endless.txt') ?></td >
        <td><?php printBoard('scores/easy.txt') ?></td>
        <td><?php printBoard('scores/normal.txt') ?></td>
        <td><?php printBoard('scores/hard.txt') ?></td>
    </tr>
</table>


<?php

//takes in name of score file e.g. 'score/endless_scores.txt'
function printBoard($filename){

    //gets content of file
    $current = file_get_contents($filename);
    //makes an array of each line, e.g. username,score
    $scores = explode("\n", $current);
    $scorelist_length = count($scores);
    //initialize associative array
    $scorelist = array('test' => 0);

    foreach($scores as $score) {
        //array with individual username and high score as elements
        $uScore = explode(",", $score);
        //create assosciative array username => score
        $scorelist[$uScore[0]] = $uScore[1];
    }

    //use arsort to sort score values numerically
    arsort($scorelist);
    //print top 5, username: score, or less if the file is not that long
    $count = 0;
    foreach($scorelist as $key => $value){
        if($count < $scorelist_length || $count < 5){
            $uScore = explode(",", $scorelist[$count]);
            print $count+1 . ". " . $key . ": " . $value . "<br>"; //e.g. 1. bringo: 45

        }else{
            break;
        }
        $count++;
    }
    /*for($x = 0; $x < $scorelist_length || $x < 5; $x++){
        $uScore = explode(",", $scorelist[$x]);
        print $x+1 . "." . $uScore[0] . ": " . $uScore[1] . "\n\n"; //e.g. 1. bringobongo: 45
    
    }*/
}
?>