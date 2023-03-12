<?php
$a=25;

echo vforeach(tab($a));
function tab($a){
    $tablica=array();
    for($c=0;$c<$a;$c++){
        $tablica[]=rand(1,100);
    }
    return $tablica;
}
function vfor($t){
    $max=0;
    $d=count($t);
    for($i=0;$i<$d;$i++){
        if($t[$i]>$max){
            $max=$t[$i];
        }
    }
    return $max;
}
function vwhile($t){
    $max=0;
    $d=count($t)-1;
    while ($d>=0){
        if($t[$d]>$max){
            $max=$t[$d];
        }
        $d--;
    }
    return $max;
}
function vdo_while($t){
    $max=0;
    $d=count($t)-1;
    do {
        if($t[$d]>$max){
            $max=$t[$d];
        }
        $d--;
    }while($d>=0);
    return $max;
}
function vforeach($t){
    $max=0;
    foreach ($t as $e){
        if($e>$max){
            $max=$e;
        }
    }
    return $max;
}