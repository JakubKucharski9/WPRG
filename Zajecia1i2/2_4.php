<?php
$pesel='02921700000';
function data($pesel){
    $d=$pesel[4].$pesel[5];
    $m=$pesel[2].$pesel[3];
    if($m>80){
        $m=$m-80;
    }
    elseif($m>60){
        $m=$m-60;
    }
    elseif($m>40){
        $m=$m-40;
    }
    elseif($m>20){
        $m=$m-20;
    }
    else $m;
    $r=$pesel[0].$pesel[1];
    if($m<10){
        echo $d.'.'.'0'.$m.'.'.$r;
    }
    else echo $d.'.'.$m.'.'.$r;
}
data($pesel);

