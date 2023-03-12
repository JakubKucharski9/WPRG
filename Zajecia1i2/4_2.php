<?php
$a=15;
$w=wynik($a);
foreach ($w as $wx){
    echo $wx." ";
}

function wynik($a)
{
    $tab=array();
    for($i=0;$i<$a;$i++){
        $tab[] = rand(1, 6);

    }
    return $tab;
}

