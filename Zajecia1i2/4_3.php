<?php
$a=25;
tabliczka($a);
function tabliczka($wielkosc){
    $a=$wielkosc+1;
    for($i=1; $i<$a;$i++){
        for($o=1;$o<$a;$o++){
            echo $o*$i."\t";
        }
        echo "\n";
    }

}