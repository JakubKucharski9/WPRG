<?php
$a=101;
echo lp($a);
function lp($a){
    $i=0;
    $d=0;
    for ($f=2;$f<sqrt($a);$f++){
        if($a%$f==0){
            $d++;
        }
        $i++;

    }
    echo "Iteracji: ".$i."\n";
    if($d!=0){
        return "Liczba ".$a." nie jest liczbą pierwszą";
    }
    else return "Liczba ".$a." jest liczbą pierwszą";

}